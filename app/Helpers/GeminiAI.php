<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiAI
{
    public static function generateCourse(string $query): ?string
    {
        $prompt = "Generate a course about {$query} in JSON format. Include:
        - title, category, short_description, description, courseVideo (YouTube link) make sure that link is not broken and its playable in youtube,
        - learning_outcomes (array),
        - topics (with lessons array: title, description, lessonVideo as YouTube link that is related to the lesson description pick the first one will appear),
        - notes (Retrieve each generated lesson and provide an explanation for each one. Use <br> to separate each lesson and its explanation ),
        - a quiz (question, choices with text and is_correct at least 10 questions).
        Only return raw JSON output. Don't explain and Don't stop until all is generated.";

        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            Log::error("Gemini API Key not set in .env file");
            return null;
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}";

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
            $text = preg_replace('/```json|```/i', '', $text);
            $start = strpos($text, '{');
            $end = strrpos($text, '}');
            if ($start !== false && $end !== false) {
                $text = substr($text, $start, $end - $start + 1);
            }

            $courseData = json_decode($text, true);

            if (!$courseData || !isset($courseData['title'])) {
                Log::error("Invalid JSON structure from Gemini", ['text' => $text]);
                return null;
            }

            // Inject DeepAI image or fallback
            $imageUrl = self::generateImageFromDeepAI($courseData['title']);
            $courseData['courseMedia'] = $imageUrl ?? 'https://via.placeholder.com/800x450.png?text=Course+Cover';

            return json_encode($courseData, JSON_PRETTY_PRINT);
        }
        return null;
    }

    public static function generateImageFromDeepAI(string $title): ?string
    {
        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            Log::error("Gemini API Key not set in .env file. Using placeholder.");
            return null;
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-preview-image-generation:generateContent?key={$apiKey}";

        $prompt = "Create a 3D rendered image for a course titled '{$title}'.";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt],
                    ],
                ],
            ],
            'generationConfig' => [
                'responseModalities' => ['TEXT', 'IMAGE']
            ]
        ]);

        if (!$response->successful()) {
            Log::error("Gemini Image API error", [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            return null;
        }

        $json = $response->json();

        $base64 = $json['candidates'][0]['content']['parts'][1]['inlineData']['data'] ?? null;

        if ($base64) {
            // Return raw base64 string with image MIME type
            return 'data:image/png;base64,' . $base64;
        }

        Log::warning("Gemini returned no image", ['response' => $json]);
        return null;
    }


}
