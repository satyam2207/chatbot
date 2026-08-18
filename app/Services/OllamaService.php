<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class OllamaService
{
    private string $baseUrl = 'http://127.0.0.1:11434';

    private string $model = 'qwen3:8b';

    public function generate(string $question, string $context = ''): string
    {
        $prompt = <<<PROMPT
You are a helpful College AI Assistant.

Answer the student's question using the provided college document context.

Rules:
- Use the document context when it contains relevant information.
- Do not invent college-specific facts.
- If the context does not contain the answer, clearly say that the information was not found in the uploaded college documents.
- Give a clear and simple answer.
- Do not mention internal processing, chunks, embeddings, or RAG.

COLLEGE DOCUMENT CONTEXT:
{$context}

STUDENT QUESTION:
{$question}

ANSWER:
PROMPT;

        $response = Http::timeout(120)
            ->post($this->baseUrl . '/api/generate', [
                'model' => $this->model,
                'prompt' => $prompt,
                'stream' => false,
            ]);

        if ($response->failed()) {
            throw new RuntimeException(
                'Ollama request failed: ' . $response->body()
            );
        }

        return trim($response->json('response', ''));
    }
}