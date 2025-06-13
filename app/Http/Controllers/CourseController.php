<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Course;
use App\Models\Faq;
use App\Models\LearningOutcome;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // You can also filter by Auth::id() if needed
        $courses = Course::with([
            'faqs',
            'learningOutcomes',
            'questions.choices',
            'topics.lessons'
        ])->where('user_id', auth()->id())->get();

        return view('admin.dashboard', compact('courses'));
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
}
