<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/lesson-progress', function (Request $request) {
    $validated = $request->validate([
        'lesson_id' => 'required|exists:lessons,id',
        'progress' => 'required|numeric|min:0|max:100'
    ]);

    \App\Models\LessonProgress::updateOrCreate(
        ['user_id' => auth()->id(), 'lesson_id' => $validated['lesson_id']],
        ['progress' => $validated['progress']]
    );

    return response()->json(['status' => 'ok']);
});
