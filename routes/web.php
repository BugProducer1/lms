<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcomepage');
});

Route::get('/coursedetails/{id}', [CourseController::class, 'show'])->name('users.coursedetails');

Route::middleware(['auth', 'role.Instructor'])->prefix('instructor')->group(function(){

    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');


    Route::get('/', [CourseController::class, 'dashboard'])->name('instructor.home');
    Route::get('/dashboard', [CourseController::class, 'dashboard'])->name('instructor.dasboard');
    Route::get('/coursedetails/{id}', [CourseController::class, 'show'])->name('admin.coursedetails');
    Route::get('/instructorprofile', function(){
        return view('admin.profile');
    })->name('instructor.profile');

    Route::get('/courselist', function(){
        return view('admin.courselist');
    })->name('instructor.courselist');

    Route::get('/instructorquiz', function(){
        return view('admin.quiz');
    })->name('instructor.quiz');

    Route::get('quizresult', function(){
        return view('admin.quizresult');
    })->name('instructor.quizresult');

    Route::get('/addcourse', function(){
        return view('/admin.addcourse');
    })->name('instructor.addcourse');
});

Route::middleware(['auth', 'role.Student'])->prefix('student')->group(function(){

    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
    Route::get('/', [StudentController::class, 'myCourses'])->name('student.mycourses');
    Route::get('/dashboard', [StudentController::class, 'myCourses'])->name('student.dashboard');
    Route::get('/quizattemps', [StudentController::class, 'quizAttemps'])->name('student.quizattemps');


    Route::post('/quizquestion/{course}/submit', [QuizController::class, 'submitQuiz'])
        ->name('student.quiz.submit');

    // Route::get('/quizquestion', fn() => view('student.quizquestion'))->name('student.quizquestion');
    Route::get('/quizquestion/{course}', [StudentController::class, 'quizQuestion'])->name('student.quizquestion');

//    Route::get('/dashboard', fn() => view('student.dashboard'));
   Route::get('/enrolledcourses', fn() => view('student.enrolledcourses'))->name('student.enrolledcourses');

//    Route::get('/quizattemps', fn() => view('student.quizattemps'))->name('student.quizattemps');


   Route::get('/settings', fn() => view('student.settings'))->name('student.settings');
   Route::get('/changepassword', fn() => view('student.changepassword'))->name('student.changepassword');
   Route::get('/coursedetails', fn() => view('student.coursedetails'))->name('student.coursedetails');
   Route::get('/coursewatch', fn() => view('student.coursewatch'))->name('student.coursewatch');

   Route::get('/studentprofile', function(){
        return view('student.profile');
    })->name('student.profile');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
