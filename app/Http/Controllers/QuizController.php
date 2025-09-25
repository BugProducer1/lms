<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\QuizResult;
use Illuminate\Http\Request;

use App\Models\Topic;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Choice;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Log;
class QuizController extends Controller
{
    public function submitQuiz(Request $request, $topicId)
    {
        $student = auth()->user();
        $answers = $request->input('answers', []);


        $topic = Topic::with('lessons.questions.choices')->findOrFail($topicId);


        $questions = $topic->lessons->flatMap->questions;
        $totalQuestions = $questions->count();
        $correctAnswersCount = 0;

        foreach ($questions as $question) {
            if (isset($answers[$question->id])) {
                $selectedChoiceId = $answers[$question->id];
                $selectedChoice = $question->choices->firstWhere('id', $selectedChoiceId);


                QuizAttempt::create([
                    'user_id'    => $student->id,
                    'topic_id'   => $topic->id,
                    'question_id'=> $question->id,
                    'choice_id'  => $selectedChoiceId,
                    'is_correct' => $selectedChoice?->is_correct ?? 0,
                ]);

                if ($selectedChoice && $selectedChoice->is_correct) {
                    $correctAnswersCount++;
                }
            }
        }

        $scorePercentage = ($correctAnswersCount / max(1, $totalQuestions)) * 100;
        $passed = $scorePercentage >= 80;

        if ($passed) {
            Log::info("Quiz passed by user {$student->id} for topic {$topic->id}");

            try {
                $topic->topicStatus = 1;
                $topic->save();
                Log::info("Updated current topic {$topic->id} to status 1");
            } catch (\Exception $e) {
                Log::error("Failed to update topic {$topic->id}: " . $e->getMessage());
            }

            $nextTopic = Topic::where('course_id', $topic->course_id)
                            ->where('id', '>', $topic->id)
                            ->orderBy('id')
                            ->first();

            if ($nextTopic) {
                try {
                    $nextTopic->topicStatus = 2;
                    $nextTopic->save();
                    Log::info("Unlocked next topic {$nextTopic->id} with status 2");
                } catch (\Exception $e) {
                    Log::error("Failed to update next topic {$nextTopic->id}: " . $e->getMessage());
                }
            } else {
                Log::warning("No next topic found after topic {$topic->id}");
            }
        }

        return view('student.quizquestion', [
            'scorePercentage' => $scorePercentage,
            'totalQuestions'  => $totalQuestions,
            'passed'          => $passed,
            'user'            => $student
        ]);
    }



}
