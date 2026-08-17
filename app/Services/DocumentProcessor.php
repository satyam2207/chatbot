<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DocumentChunk;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;

class DocumentProcessor
{
    private const CHUNK_SIZE = 1500;
    private const CHUNK_OVERLAP = 200;

   public function process(Document $document): int
{
    $document->update([
        'processing_status' => 'processing',
        'processing_error' => null,
        'processed_at' => null,
    ]);

    try {
        $text = $this->extractText($document);

        if (trim($text) === '') {
            $document->update([
                'processing_status' => 'failed',
                'chunk_count' => 0,
                'processing_error' => 'No readable text was found in the document.',
            ]);

            return 0;
        }

        $text = $this->cleanText($text);

        $chunks = $this->splitIntoChunks($text);

        $document->chunks()->delete();

        foreach ($chunks as $index => $chunk) {
            DocumentChunk::create([
                'document_id' => $document->id,
                'chunk_index' => $index,
                'content' => $chunk,
                'token_count' => $this->estimateTokens($chunk),
                'metadata' => [
                    'source' => $document->file_name,
                    'category' => $document->category,
                ],
            ]);
        }

        $document->update([
            'processing_status' => 'processed',
            'chunk_count' => count($chunks),
            'processing_error' => null,
            'processed_at' => now(),
        ]);

        return count($chunks);

    } catch (\Throwable $exception) {
        report($exception);

        $document->update([
            'processing_status' => 'failed',
            'chunk_count' => 0,
            'processing_error' => $exception->getMessage(),
            'processed_at' => null,
        ]);

        return 0;
    }
}

    private function extractText(Document $document): string
    {
        $path = Storage::disk('public')->path($document->file_path);

        if (! file_exists($path)) {
            throw new \RuntimeException('Document file not found.');
        }

        return match ($document->file_type) {
            'text/plain' => file_get_contents($path),

            default => $this->extractWithAvailableParser($path),
        };
    }

   private function extractWithAvailableParser(string $path): string
{
    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    if ($extension === 'txt') {
        return file_get_contents($path);
    }

    if ($extension === 'pdf') {
        $parser = new Parser();

        $pdf = $parser->parseFile($path);

        return $pdf->getText();
    }

    if ($extension === 'docx') {
        return $this->extractDocxText($path);
    }

    throw new \RuntimeException(
        "Text extraction for .$extension files is not configured yet."
    );
}

private function extractDocxText(string $path): string
{
    $zip = new \ZipArchive();

    if ($zip->open($path) !== true) {
        throw new \RuntimeException('Unable to open DOCX file.');
    }

    $xml = $zip->getFromName('word/document.xml');

    $zip->close();

    if ($xml === false) {
        throw new \RuntimeException(
            'DOCX document.xml file could not be read.'
        );
    }

    $xml = str_replace(
        ['</w:p>', '</w:tr>', '</w:br>'],
        ["\n", "\n", "\n"],
        $xml
    );

    $text = strip_tags($xml);

    return html_entity_decode(
        $text,
        ENT_QUOTES | ENT_XML1,
        'UTF-8'
    );
}
    private function cleanText(string $text): string
    {
        $text = str_replace("\r\n", "\n", $text);
        $text = str_replace("\r", "\n", $text);

        $text = preg_replace('/[ \t]+/', ' ', $text);
        $text = preg_replace("/\n{3,}/", "\n\n", $text);

        return trim($text);
    }

    private function splitIntoChunks(string $text): array
    {
        $paragraphs = preg_split(
            "/\n\s*\n/",
            $text,
            -1,
            PREG_SPLIT_NO_EMPTY
        );

        $chunks = [];
        $current = '';

        foreach ($paragraphs as $paragraph) {
            $paragraph = trim($paragraph);

            if ($paragraph === '') {
                continue;
            }

            if (
                strlen($current) > 0 &&
                strlen($current) + strlen($paragraph) + 2 > self::CHUNK_SIZE
            ) {
                $chunks[] = trim($current);

                $overlap = substr(
                    $current,
                    max(0, strlen($current) - self::CHUNK_OVERLAP)
                );

                $current = $overlap . "\n\n" . $paragraph;
            } else {
                $current .=
                    ($current === '' ? '' : "\n\n") .
                    $paragraph;
            }
        }

        if (trim($current) !== '') {
            $chunks[] = trim($current);
        }

        return $chunks;
    }

    private function estimateTokens(string $text): int
    {
        return (int) ceil(str_word_count($text) * 1.3);
    }
}