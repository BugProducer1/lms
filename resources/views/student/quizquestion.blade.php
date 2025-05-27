@extends('layouts.studentapp')

@section('title', 'Quiz Question')

@section('content')
    <div class="col-lg-9 quiz-wizard">
        @if (isset($passed) && $passed === true)
            <fieldset style="display: block;">
                <div class="page-title d-flex align-items-center justify-content-between">
                    <h5>My Quiz Attempts</h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="quiz-circle-progress m-0 mb-3">
                            <div class="circle-progress mb-2" data-value="{{ round($scorePercentage) }}">
                                <span class="progress-left">
                                    <span class="progress-bar border-success"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar border-success"></span>
                                </span>
                                <div class="progress-value text-success fw-bold fs-24">{{ round($scorePercentage) }}%</div>
                            </div>
                            <p class="text-center fs-14">Pass Score : 80%</p>
                        </div>
                        <div class="text-center mb-3">
                            <h6 class="mb-1">Congratulations! You Passed</h6>
                            <p class="fs-14">You’ve successfully passed the quiz. Keep up the great work!</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('student.dashboard') }}" class="btn btn-secondary rounded-pill">
                                <i class="isax isax-arrow-left-2 me-1 fs-10"></i>Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </fieldset>
        @elseif (isset($passed) && $passed === false)
            <fieldset style="display: block;">
                <div class="page-title d-flex align-items-center justify-content-between">
                    <h5>My Quiz Attempts</h5>
                </div>
                <div class="quiz-attempt-card">
                    <div class="quiz-attempt-body">
                        <div class="quiz-circle-progress m-0 mb-3">
                            <div class="circle-progress mb-2" data-value="{{ round($scorePercentage) }}">
                                <span class="progress-left">
                                    <span class="progress-bar border-danger"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar border-danger"></span>
                                </span>
                                <div class="progress-value text-danger fw-bold fs-24">{{ round($scorePercentage) }}%</div>
                            </div>
                            <p class="text-center fs-14">Pass Score : 80%</p>
                        </div>
                        <div class="text-center mb-3">
                            <h6 class="mb-1">Sorry, You Didn't Pass This Time</h6>
                            <p class="fs-14">Don't worry, learn from this attempt and come back stronger next time!</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('student.mycourses') }}" class="btn btn-secondary rounded-pill">
                                <i class="isax isax-arrow-left-2 me-1 fs-10"></i>Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </fieldset>
        @else
            @php
                $total = $course->questions->count();
            @endphp
            <form id="quizForm" method="POST" action="{{ route('student.quiz.submit', $course->id) }}">
                @csrf
                @foreach ($course->questions as $index => $question)
                    <fieldset id="step-{{ $index }}" class="{{ $index > 0 ? 'd-none' : '' }}">
                        <div class="page-title d-flex align-items-center justify-content-between">
                            <h5>My Quiz Attempts</h5>
                        </div>
                        <div class="quiz-attempt-card border-0">
                            <div class="quiz-attempt-body p-0">
                                <div class="border p-3 mb-3 rounded-2">
                                    <div class="bg-light border p-3 mb-3 rounded-2 flex-wrap">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <div class="mb-2 mb-md-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-lg me-3 flex-shrink-0">
                                                            <img class="img-fluid rounded-3"
                                                                src="{{ asset('img/students/quiz.jpg') }}" alt="">
                                                        </div>
                                                        <h5 class="fs-18">{{ $course->Title }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-md-end">
                                                    <p class="d-inline-flex align-items-center mb-0">
                                                        <i class="isax isax-clock me-1"></i>
                                                        00:02:21
                                                        <span class="text-dark ms-1"> / 00:03:00</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-semibold text-gray-9">Quiz Progress</span>
                                            <span>Question {{ $index + 1 }} out of {{ $total }}</span>
                                        </div>
                                        <div class="progress progress-xs flex-grow-1 mb-1">
                                            <div class="progress-bar bg-success rounded" role="progressbar"
                                                style="width: {{ (($index + 1) / $total) * 100 }}%;"
                                                aria-valuenow="{{ (($index + 1) / $total) * 100 }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <h6 class="mb-3">{{ $question->question }}</h6>
                                        @foreach ($question->choices as $choiceIndex => $choice)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio"
                                                    name="answers[{{ $question->id }}]"
                                                    id="question-{{ $index }}-choice-{{ $choiceIndex }}"
                                                    value="{{ $choice->id }}">
                                                <label for="question-{{ $index }}-choice-{{ $choiceIndex }}">
                                                    {{ $choice->choice_text }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="text-end">
                                    @if ($index > 0)
                                        <button type="button" class="btn btn-light prev_btn">Previous</button>
                                    @endif

                                    @if ($index < $course->questions->count() - 1)
                                        <button type="button" class="btn btn-secondary next_btn">Next</button>
                                    @else
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </fieldset>
                @endforeach
            </form>
        @endif
    </div>
@endsection
