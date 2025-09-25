<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\Course;
use App\Models\LearningOutcome;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GeminiAI;
use Illuminate\Support\Str;

class AICourseController extends Controller
{

    public function ask()
    {
        return view('ai.ask');
    }


    public function handle(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
        ]);

        $query = $request->input('query');


        $raw = GeminiAI::generateCourse($query);


        \Log::info("OLLAMA RESPONSE", ['response' => $raw]);


        $data = json_decode($raw, true);

        if (!$data || !isset($data['title'])) {
            return redirect()->back()->with('error', 'Invalid response from AI.');
        }


        $notes = '';

        foreach ($data['topics'] ?? [] as $topicData) {
            foreach ($topicData['lessons'] ?? [] as $lessonData) {
                $lessonTitle = $lessonData['title'] ?? 'Untitled Lesson';
                $lessonDesc = $lessonData['description'] ?? 'No description';
                $notes .= "- {$lessonTitle}<br>{$lessonDesc}<br><br>";
            }
        }

        $course = Course::create([
            'user_id' => Auth::id() ?? 1,
            'Title' => $data['title'],
            'notes' => $notes,
            'Category' => $data['category'] ?? 'General',
            'ShortDescription' => $data['short_description'] ?? '',
            'CourseDescription' => $data['description'] ?? '',
            'CourseVideo' => $data['courseVideo'] ?? null,
            'CourseMedia' => $data['courseMedia'],
        ]);

        foreach ($data['learning_outcomes'] ?? [] as $outcome) {
            LearningOutcome::create([
                'course_id' => $course->id,
                'title' => $outcome,
            ]);
        }


        foreach ($data['topics'] ?? [] as $topicData) {
            $topic = Topic::create([
                'course_id' => $course->id,
                'title' => $topicData['title'],
            ]);

            foreach ($topicData['lessons'] ?? [] as $lessonData) {
               $lesson = Lesson::create([
                    'topic_id' => $topic->id,
                    'title' => $lessonData['title'],
                    'lessonDescription' => $lessonData['description'] ?? '',
                    'lessonVideo' => $this->isValidYoutubeUrl($lessonData['lessonVideo'] ?? '')
                        ? $lessonData['lessonVideo']
                        : 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                ]);
                if($lessonData['quiz']){
                    \Log::warning("Lesson Quiz Found");
                    foreach ($lessonData['quiz'] ?? [] as $final_q) {
                            $question = Question::create([
                                'topic_id' => $lesson->id,
                                'question' => $final_q['module_question'],
                            ]);

                            foreach ($final_q['choices'] ?? [] as $c) {
                                Choice::create([
                                    'question_id' => $question->id,
                                    'choice_text' => $c['text'],
                                    'is_correct' => $c['is_correct'] ? 1 : 0,
                                ]);
                            }
                    }
                }
                else{
                    \Log::warning("Lesson Quiz Not Found");
                }
                // foreach ($lessonData['quiz'] ?? [] as $q) {
                //     // $question = Question::create([
                //     //     'course_id' => $lesson->id,
                //     //     'question' => $q['module_question'],
                //     // ]);

                //     // foreach ($q['choices'] ?? [] as $c) {
                //     //     Choice::create([
                //     //         'question_id' => $question->id,
                //     //         'choice_text' => $c['text'],
                //     //         'is_correct' => $c['is_correct'] ? 1 : 0,
                //     //     ]);
                //     // }
                // }
            }
        }




        // return response()->json(['courseId' => $course->id]);
        // return response()->json('redirect', route('coursedetails/'.$course->id));
        return 1;
    }


    public function view($id)
    {
        $course = Course::with([
            'learningOutcomes',
            'topics.lessons',
            'questions.choices'
        ])->findOrFail($id);

        return view('ai.course', compact('course'));
    }

    private function isValidYoutubeUrl($url)
    {
        return is_string($url) && preg_match('/^https:\/\/(www\.)?youtube\.com\/watch\?v=[\w\-]{11}$/', $url);
    }
}
