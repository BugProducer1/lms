<?php

use App\Models\LessonProgress;
use Illuminate\Http\Request;

class LessonProgressController extends Controller
{
    public function store(Request $request, $lessonId)
    {
        $userId = auth()->id(); // or student ID

        $validated = $request->validate([
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        LessonProgress::updateOrCreate(
            ['user_id' => $userId, 'lesson_id' => $lessonId],
            ['percentage' => $validated['percentage']]
        );

        return response()->json(['success' => true]);
    }
}
