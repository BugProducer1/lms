<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function myCourses()
    {
        $student = auth()->user();

        $courses = $student->enrolledCourses()->with('instructor')->get();

        return view('student.dashboard', compact('courses'));
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

        $courses = $student->enrolledCourses()
                    ->with(['instructor'])
                    ->withCount('questions')
                    ->get();

        return view('student.quizattemps', compact('courses'));
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
