<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiAI
{
    public static function generateCourse(string $query): ?string
    {
        $prompt = "Generate a course about {$query} in JSON format. Include:
        - title, category, short_description, description, courseVideo (YouTube link), courseMedia (base64 image string) make sure it is a valid image,
        - learning_outcomes (array),
        - topics (with lessons array: title, description, lessonVideo as YouTube link),
        - a quiz (question, choices with text and is_correct at least 10 questions).
        Only return raw JSON output. Don't explain.";

        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            Log::error("Gemini API Key not set in .env file");
            return null;
        }


        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key={$apiKey}";

        $response = Http::timeout(900)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post($url, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt],
                        ],
                    ],
                ],
            ]);

        if (!$response->successful()) {
            Log::error("Gemini API Error", ['response' => $response->body()]);
            return null;
        }

        $json = $response->json();

        $text = $json['candidates'][0]['content']['parts'][0]['text'] ?? null;

        if ($text) {
            // Strip markdown and extract valid JSON
            $text = preg_replace('/```json|```/i', '', $text);

            $start = strpos($text, '{');
            $end = strrpos($text, '}');
            if ($start !== false && $end !== false) {
                $text = substr($text, $start, $end - $start + 1);
            }

            return trim($text);
        }

        return null;
    }
}
