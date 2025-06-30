<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Course;
use App\Models\Faq;
use App\Models\LearningOutcome;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Topic;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$user = Auth::user();

class CourseController extends Controller
{
    public function store(Request $request)
    {
        // Validate inputs first
        $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'Category' => 'nullable|string',
            'ShortDescription' => 'nullable|string',
            'CourseDescription' => 'nullable|string',
            'CourseMedia' => 'nullable|string',
            'video_file' => 'sometimes|file|mimes:mp4,mov,avi,wmv|max:51200',
            'intro_video' => 'sometimes|string',
            'learning_outcome' => 'nullable|array',
            'learning_outcome.*' => 'nullable|string',
            'questions' => 'nullable|array',
            'questions.*.question' => 'required|string',
            'questions.*.choices' => 'required|array',
            'questions.*.correct' => 'nullable|array',
        ]);

        $validated['user_id'] = Auth::id();

        if ($request->hasFile('video_file')) {
            $path = $request->file('video_file')->store('course_videos', 'public');
            $validated['CourseVideo'] = $path;
        } else {
            $validated['CourseVideo'] = $request->input('intro_video');
        }

        unset($validated['intro_video']);

        try {
            // Save the course first
            $course = Course::create($validated);

            // Save the learning outcomes if provided
            if ($request->has('learning_outcome')) {
                foreach ($request->input('learning_outcome') as $outcome) {
                    if ($outcome) { // prevent empty strings from being saved
                        LearningOutcome::create([
                            'course_id' => $course->id,
                            'title' => $outcome,
                        ]);
                    }
                }
            }

            if ($request->has('question') && $request->has('answer')) {
                $questions = $request->input('question');
                $answers = $request->input('answer');

                foreach ($questions as $index => $q) {
                    $a = $answers[$index] ?? null;
                    if ($q && $a) {
                        Faq::create([
                            'course_id' => $course->id,
                            'question' => $q,
                            'answer' => $a,
                        ]);
                    }
                }
            }

            if ($request->has('topics')) {
                foreach ($request->input('topics') as $topicData) {
                    // Save each topic
                    $topic = Topic::create([
                        'course_id' => $course->id,
                        'title' => $topicData['title'],
                    ]);

                    // Save lessons under the topic
                    if (!empty($topicData['lessons'])) {
                        // Check if all three arrays exist and have equal length
                        $lessonTitles = $topicData['lessons'];
                        $lessonVideos = $topicData['lessonVideo'] ?? [];
                        $lessonDescriptions = $topicData['lessonDescription'] ?? [];

                        $lessonCount = count($lessonTitles);

                        for ($i = 0; $i < $lessonCount; $i++) {
                            // Make sure the lesson title is not empty
                            if (!empty($lessonTitles[$i])) {
                                Lesson::create([
                                    'topic_id' => $topic->id,
                                    'title' => $lessonTitles[$i],
                                    'lessonVideo' => $lessonVideos[$i] ?? null,
                                    'lessonDescription' => $lessonDescriptions[$i] ?? null,
                                ]);
                            }
                        }
                    }
                }
            }

            if ($request->has('questions')) {
                foreach ($request->input('questions') as $qIndex => $questionData) {
                    if (!empty($questionData['question'])) {
                        $question = Question::create([
                            'course_id' => $course->id,
                            'question' => $questionData['question'],
                        ]);

                        foreach ($questionData['choices'] as $choiceIndex => $choiceText) {
                            if (!empty($choiceText)) {
                                Choice::create([
                                    'question_id' => $question->id,
                                    'choice_text' => $choiceText,
                                    'is_correct' => in_array($choiceIndex, $questionData['correct'] ?? []) ? 1 : 0,
                                ]);
                            }
                        }
                    }
                }
            }

            return redirect()->back()->with('success', 'Course and outcomes saved!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function dashboard()
    {
        $user = auth()->user();

        // Get courses created by the current user
        $courses = Course::with([
            'faqs',
            'learningOutcomes',
            'questions.choices',
            'topics.lessons'
        ])->where('user_id', auth()->id())->get();

        $courseCount = $courses->count();

        $courseIds = $courses->pluck('id');

        // Count total unique students across all courses
        $studentCount = DB::table('enrollments')
            ->whereIn('course_id', $courseIds)
            ->distinct('user_id')
            ->count('user_id');

        // Attach enrollment count to each course manually
        foreach ($courses as $course) {
            $course->enrollment_count = DB::table('enrollments')
                ->where('course_id', $course->id)
                ->count();
        }

        return view('admin.dashboard', compact('courses', 'user', 'courseCount', 'studentCount'));
    }

    public function courseList()
    {
        $user = auth()->user();

        // Get courses created by the current user
        $courses = Course::with([
            'faqs',
            'learningOutcomes',
            'questions.choices',
            'topics.lessons'
        ])->where('user_id', auth()->id())->get();

        $courseCount = $courses->count();
        $courseIds = $courses->pluck('id');

        // Count total unique students across all courses
        $studentCount = DB::table('enrollments')
            ->whereIn('course_id', $courseIds)
            ->distinct('user_id')
            ->count('user_id');

        // Attach enrollment count per course
        foreach ($courses as $course) {
            $course->enrollment_count = DB::table('enrollments')
                ->where('course_id', $course->id)
                ->count();
        }

        // Count courses by status
        $activeCount = Course::where('user_id', auth()->id())->where('course_status', NULL)->count();
        $pendingCount = Course::where('user_id', auth()->id())->where('course_status', '0')->count();
        $draftCount = Course::where('user_id', auth()->id())->where('course_status', '1')->count();

        return view('admin.courselist', compact(
            'courses',
            'user',
            'courseCount',
            'studentCount',
            'activeCount',
            'pendingCount',
            'draftCount'
        ));
    }

    public function instructorquiz(){
        $user = auth()->user();

        // Get courses created by this instructor, along with question count
        $courses = Course::withCount('questions')
            ->where('user_id', $user->id)
            ->get();

        return view('admin.quiz', compact('courses'));
    }
   public function quizresult($courseId)
    {
        $course = Course::findOrFail($courseId);

        $results = QuizResult::with('user')
            ->where('course_id', $courseId)
            ->get();

        return view('admin.quizresult', compact('course', 'results'));
    }

    public function show($id)
    {
        $course = Course::with([
            'instructor',
            'faqs',
            'learningOutcomes',
            'questions.choices',
            'topics.lessons'
        ])->findOrFail($id);

        return view('admin.coursedetails', compact('course'));
    }

    public function enroll($courseId)
    {
        $user = auth()->user();

        // Prevent duplicate enrollment
        if (!$user->enrolledCourses->contains($courseId)) {
            $user->enrolledCourses()->attach($courseId);
        }

        return redirect()->back()->with('success', 'Successfully enrolled!');
    }

    public function courseWatch(Course $course){
        $user = auth()->user();

        if (!$user->enrolledCourses->contains($course->id)) {
            abort(403, 'You are not enrolled in this course.');
        }

        $course->load(['topics.lessons', 'learningOutcomes', 'faqs']);

        return view('student.coursewatch', compact('course'));
    }

    public function settings(){
        $user = auth()->user();

        return view('admin.settings', compact('user'));
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

        return redirect()->route('admin.settings')->with('success', 'Profile updated successfully!');
    }
}
