<?php

namespace App\Services;

use App\Models\DocumentChunk;
use Illuminate\Support\Collection;

class KnowledgeSearch
{
    /**
     * Search the local college knowledge base.
     */
    public function search(string $query, int $limit = 5): Collection
{
    $query = trim($query);

    if ($query === '') {
        return collect();
    }

    $keywords = $this->extractKeywords($query);

    if (empty($keywords)) {
        return collect();
    }

    $exactQuery = strtolower($query);

    $chunks = DocumentChunk::query()
        ->with('document')
        ->where(function ($builder) use ($keywords, $exactQuery) {

            // Prefer the complete phrase.
            $builder->where(
                'content',
                'like',
                '%' . $exactQuery . '%'
            );

            // Also allow individual keywords.
            foreach ($keywords as $keyword) {
                $builder->orWhere(
                    'content',
                    'like',
                    '%' . $keyword . '%'
                );
            }
        })
        ->get();

    return $chunks
        ->map(function (DocumentChunk $chunk) use ($keywords, $exactQuery) {

            $chunk->search_score = $this->calculateScore(
                $chunk->content,
                $keywords,
                $exactQuery
            );

            return $chunk;
        })
        ->filter(fn ($chunk) => $chunk->search_score > 20)
        ->sortByDesc('search_score')
        ->take($limit)
        ->values();
}

    /**
     * Extract useful words from the user's question.
     */
    private function extractKeywords(string $query): array
    {
        $query = strtolower($query);

        $query = preg_replace(
            '/[^\p{L}\p{N}\s]/u',
            ' ',
            $query
        );

        $words = preg_split(
            '/\s+/',
            trim($query)
        );

        $stopWords = [
            'a',
            'an',
            'the',
            'is',
            'are',
            'am',
            'was',
            'were',
            'what',
            'which',
            'who',
            'where',
            'when',
            'how',
            'why',
            'can',
            'could',
            'would',
            'should',
            'do',
            'does',
            'did',
            'tell',
            'me',
            'about',
            'please',
            'for',
            'of',
            'to',
            'in',
            'on',
            'at',
            'and',
            'or',
            'with',
            'from',
            'my',
            'your',
            'our',
            'this',
            'that',
        ];

        return collect($words)
            ->filter(fn ($word) => strlen($word) >= 3)
            ->reject(fn ($word) => in_array($word, $stopWords))
            ->unique()
            ->values()
            ->all();
    }

    /**
     * Calculate relevance score.
     */
    private function calculateScore(
        string $content,
        array $keywords,
        string $exactQuery
    ): int {
        $content = strtolower($content);

        $score = 0;

        // Strong bonus when the complete search phrase exists.
        if (
            $exactQuery !== '' &&
            str_contains($content, $exactQuery)
        ) {
            $score += 100;
        }

        // Score individual keywords.
        foreach ($keywords as $keyword) {
            $count = substr_count($content, $keyword);

            if ($count > 0) {
                $score += min($count, 5) * 2;
            }

            // Bonus for complete-word matches.
            if (preg_match(
                '/\b' . preg_quote($keyword, '/') . '\b/i',
                $content
            )) {
                $score += 3;
            }
        }

        return $score;
    }
}