@extends('layouts.studentapp')

@section('title', 'Quiz Attemps')

@section('content')
    <div class="col-lg-9">
        <div class="page-title d-flex align-items-center justify-content-between">
            <h5>My Quiz Attempts</h5>
        </div>
        @forelse ($courses as $course)
            @php
                $hasTakenQuiz = $quizResults->has($course->id);
            @endphp

            <div class="d-flex align-items-center justify-content-between border p-3 mb-3 rounded-2">
                <div>
                    <h6 class="mb-1">
                        @if ($hasTakenQuiz)
                            {{ $course->Title }} <span class="badge bg-success ms-1">Completed</span>
                        @else
                            <a href="{{ route('student.quizquestion', ['course' => $course->id]) }}">{{ $course->Title }}</a>
                        @endif
                    </h6>
                    <p class="fs-14">Number of Questions : {{ $course->questions_count }}</p>
                </div>
                <div>
                    @if ($hasTakenQuiz)
                        <i class="isax isax-check-circle text-success fs-24"></i>
                    @else
                        <a href="{{ route('student.quizquestion', ['course' => $course->id]) }}" class="arrow-next">
                            <i class="isax isax-arrow-right-1"></i>
                        </a>
                    @endif
                </div>
            </div>

        @empty
            <p class="text-center">No Quiz</p>
        @endforelse
        <!-- /pagination -->
        <div class="row align-items-center mt-3">
            <div class="col-md-2">
                <p class="pagination-text">Page 1 of 2</p>
            </div>
            <div class="col-md-10">
                <ul class="pagination lms-page justify-content-center justify-content-md-end mt-2 mt-md-0">
                    <li class="page-item prev">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1"><i class="fas fa-angle-left"></i></a>
                    </li>
                    <li class="page-item first-page active">
                        <a class="page-link" href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item next">
                        <a class="page-link" href="javascript:void(0)"><i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /pagination -->
    </div>
@endsection
