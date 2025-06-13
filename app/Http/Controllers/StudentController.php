<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\QuizResult;

class StudentController extends Controller
{
    public function myCourses()
    {
        $student = auth()->user();

        $courses = $student->enrolledCourses()->with('instructor')->get();

        $quizResults = QuizResult::with('course')
            ->where('user_id', $student->id)
            ->latest()
            ->take(5)
            ->get();

        return view('student.dashboard', compact('courses', 'quizResults'));
        }

    public function courseLists()
    {
        $student = auth()->user();

        $courses = $student->enrolledCourses()->with('instructor')->get();

        return view('student.enrolledcourses', compact('courses'));
    }


    public function quizAttemps()
    {
        $student = auth()->user();

        // Get enrolled courses with questions count
        $courses = $student->enrolledCourses()
                    ->with(['instructor'])
                    ->withCount('questions')
                    ->get();

        // Get quiz results for the student indexed by course_id
        $quizResults = QuizResult::where('user_id', $student->id)
                        ->pluck('id', 'course_id'); // just get course_id keys for existence check

        return view('student.quizattemps', compact('courses', 'quizResults'));
    }

    public function quizQuestion($courseId)
    {
        $student = auth()->user();

        // Check if the student is enrolled in the course
        $enrolledCourseIds = $student->enrolledCourses()->pluck('courses.id')->toArray();

        if (!in_array($courseId, $enrolledCourseIds)) {
            abort(403, 'Unauthorized access to this course quiz.');
        }

        $course = Course::with('questions')->findOrFail($courseId);

        return view('student.quizquestion', compact('course'));
    }


}
