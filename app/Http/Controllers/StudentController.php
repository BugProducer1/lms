<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\QuizResult;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function studentProfile(){
        $user = auth()->user();

        return view('student.profile', compact('user'));
    }
    public function myCourses()
    {
        $student = auth()->user();
        $user = auth()->user();


        $courses = Course::with([
            'faqs',
            'learningOutcomes',
            'questions.choices',
            'topics.lessons',
            'enrollments'
        ])->where('user_id', auth()->id())->get();


        $quizResults = QuizResult::with('course')
            ->where('user_id', $student->id)
            ->latest()
            ->take(5)
            ->get();


        $completedCourseIds = QuizResult::where('user_id', $student->id)
            ->pluck('course_id')
            ->unique();

        $completedCoursesCount = $completedCourseIds->count();


        $activeCoursesCount = $courses->whereNotIn('id', $completedCourseIds)->count();

        $completedCourseIds = QuizResult::where('user_id', $student->id)
            ->pluck('course_id')
            ->unique();

        return view('student.dashboard', compact(
            'courses',
            'quizResults',
            'user',
            'completedCoursesCount',
            'activeCoursesCount',
            'completedCourseIds'
        ));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'gender' => 'in:M,F',
            'dob' => 'nullable|date',
            'userPhoto' => 'nullable|string',
            'userID' => 'nullable|string',
        ]);

        $user->name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->userID = $request->userID;

        if ($request->filled('profile_image_base64')) {
            $base64Image = $request->profile_image_base64;


            if (preg_match('/^data:image\/(png|jpeg|jpg);base64,/', $base64Image)) {
                $user->userPhoto = $base64Image;
            } else {
                return back()->withErrors(['profile_image_base64' => 'Invalid image format.']);
            }
        }

        $user->completed_profile = '1';

        $request->user()->save();

        return redirect()->route('student.settings')->with('success', 'Profile updated successfully!');
    }


    public function settings(){
         $user = auth()->user();

         return view('student.settings', compact('user'));
    }

    public function courseLists()
    {
        $student = auth()->user();
        $user = auth()->user();
        $courses = $student->enrolledCourses()->with('instructor')->get();

        $completedCourseIds = QuizResult::where('user_id', $student->id)
            ->pluck('course_id')
            ->unique();

        $completedCoursesCount = $completedCourseIds->count();
        $completedCourses = $courses->whereIn('id', $completedCourseIds)->values();

        $activeCourses = $courses->whereNotIn('id', $completedCourseIds)->values();
        $activeCoursesCount = $activeCourses->count();

        return view('student.enrolledcourses', compact('courses','user','completedCourseIds','completedCoursesCount','activeCoursesCount','activeCourses','completedCourses'));
    }


    public function quizAttemps()
    {
        $student = auth()->user();
        $user = auth()->user();

        $courses = $student->enrolledCourses()
                    ->with(['instructor'])
                    ->withCount('questions')
                    ->get();


        $quizResults = QuizResult::where('user_id', $student->id)
                        ->pluck('id', 'course_id');


        return view('student.quizattemps', compact('courses', 'quizResults', 'user'));
    }

    public function quizQuestion($courseId)
    {
        $student = auth()->user();
        $user = auth()->user();
        // Check if the student is enrolled in the course
        $enrolledCourseIds = $student->enrolledCourses()->pluck('courses.id')->toArray();

        if (!in_array($courseId, $enrolledCourseIds)) {
            abort(403, 'Unauthorized access to this course quiz.');
        }

        $course = Course::with('questions')->findOrFail($courseId);

        return view('student.quizquestion', compact('course','user'));
    }


}
