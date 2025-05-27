<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function submitQuiz(Request $request, $courseId)
    {
        $student = auth()->user();
        $answers = $request->input('answers');

        $course = Course::with('questions.choices')->findOrFail($courseId);

        $totalQuestions = $course->questions->count();
        $correctAnswersCount = 0;

        foreach ($course->questions as $question) {
            if (isset($answers[$question->id])) {
                $selectedChoiceId = $answers[$question->id];
                $selectedChoice = $question->choices->firstWhere('id', $selectedChoiceId);

                if ($selectedChoice && $selectedChoice->is_correct) {
                    $correctAnswersCount++;
                }
            }
        }

        $scorePercentage = ($correctAnswersCount / $totalQuestions) * 100;
        $passScore = 80;
        $passed = $scorePercentage >= $passScore;


        QuizResult::create([
            'user_id' => $student->id,
            'course_id' => $courseId,
            'result' => round($scorePercentage),
            'score' => round($scorePercentage),
            'passed' => $passed,
        ]);

        return view('student.quizquestion', [
            'scorePercentage' => $scorePercentage,
            'totalQuestions' => $totalQuestions,
            'passed' => $passed
        ]);
    }


}
