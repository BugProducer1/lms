<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiAI
{
    public static function generateCourse(string $query): ?string
    {
        $prompt = "Generate a course about {$query} in JSON format. Include:
        - title, category, short_description, description, courseVideo (YouTube link),
        - learning_outcomes (array),
        - topics (with lessons array: title, description, lessonVideo as YouTube link that is related to the lesson description pick the first one will appear),
        - a quiz (question, choices with text and is_correct at least 10 questions).
        Only return raw JSON output. Don't explain and Don't stop until all is generated.";

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

    public static function generateImageFromDeepAI(string $title): string
    {
        $apiKey = env('DEEPAI_API_KEY');

        if (!$apiKey) {
            Log::error("DeepAI API Key not set in .env file. Using placeholder.");
            return "https://placehold.co/800x450.png?text=Course+Cover";
        }

        $response = Http::withHeaders([
            'Api-Key' => $apiKey,
        ])->post('https://api.deepai.org/api/text2img', [
            'text' => "Course cover image for: {$title}",
        ]);

        if ($response->successful()) {
            $result = $response->json();
            return $result['output_url'] ?? "https://placehold.co/800x450.png?text=Course+Cover";
        }

        Log::error("DeepAI API Error", [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        // Fallback to placeholder image
        return "https://placehold.co/800x450.png?text=Course+Cover";
    }

}
