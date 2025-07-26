<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class OllamaAI
{
    public static function generateCourse(string $query): ?string
    {
        $response = Http::timeout(600)->retry(2, 2000)->post(config('ollama.url') . '/api/generate', [
            'model' => env('OLLAMA_MODEL', 'gemma3'),
            'prompt' => "Generate a course about {$query} in JSON format. Include: title, category, short_description, description, courseVideo (YouTube link), courseMedia (base64 image string). Also include learning_outcomes (array), topics (with lessons array: title, description, lessonVideo as YouTube link), and a quiz (question, choices with text and is_correct alteast 10 questions). Only return raw JSON output.",
            'stream' => false,
        ]);

        if ($response->successful()) {
            $raw = $response->json()['response'] ?? null;


            $cleaned = preg_replace('/^```json|```$/m', '', trim($raw));
            $cleaned = trim($cleaned);

            return $cleaned;
        }

        return null;
    }
}
