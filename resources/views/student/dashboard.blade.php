@extends('layouts.studentapp')

@section('title', 'Dashboard')

@section('content')
    <div class="col-lg-9">
        <div class="card bg-light quiz-ans-card">
            <img src="{{ asset('img/shapes/withdraw-bg1.svg') }}" src="{{ asset('') }}" class="quiz-ans-bg1" alt="img">
            <img src="{{ asset('img/shapes/withdraw-bg2.svg') }}" class="quiz-ans-bg2" alt="img">
        </div>
        {{-- <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="icon-box bg-primary-transparent me-2 me-xxl-3 flex-shrink-0"><img
                                    src="{{ asset('img/icon/graduation.svg') }}" alt=""></span>
                            <div>
                                <span class="d-block">Enrolled Subject</span>
                                <h4 class="fs-24 mt-1">{{ $courses->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="icon-box bg-secondary-transparent me-2 me-xxl-3 flex-shrink-0"><img
                                    src="{{ asset('img/icon/book.svg') }}" alt=""></span>
                            <div>
                                <span class="d-block">Active Subject</span>
                                <h4 class="fs-24 mt-1">{{ $activeCoursesCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="icon-box bg-success-transparent me-2 me-xxl-3 flex-shrink-0"><img
                                    src="{{ asset('img/icon/bookmark.svg') }}" alt=""></span>
                            <div>
                                <span class="d-block">Completed Subject</span>
                                <h4 class="fs-24 mt-1">{{ $completedCoursesCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <h5 class="mb-3 fs-18">Recently Generated Subject</h5>
        <div class="row">
            @forelse ($courses as $course)
                <div class="col-xl-4 col-md-6">
                    <div class="course-item">
                        <div class="course-img">
                            <a href="{{ route('users.coursedetails', ['id' => $course->id]) }}">
                                <img src="{{ $course->CourseMedia }}" alt="img" class="img-fluid">
                            </a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge badge-md badge-soft-info rounded-pill">{{ $course->Category }}</span>
                            <a href="javascript:void(0);" class="fav-icon"><i class="isax isax-heart"></i></a>
                        </div>
                        <div class="pb-3 border-bottom mb-3">
                            <h5><a href="{{ route('users.coursedetails', ['id' => $course->id]) }}">{{ $course->Title }}</a>
                            </h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="course-rating">
                                <span class="course-user">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('img/user/default.jpg') }}" alt="img" class="img-fluid">
                                    </a>
                                </span>
                                <a
                                    href="javascript:void(0);">{{ $course->user->name . ' ' . $course->user->last_name ?? 'Unknown' }}</a>
                            </div>
                        </div>
                        <a href="{{ route('users.coursedetails', ['id' => $course->id]) }}"
                            class="btn buy-course-btn">Enroll Course Now</a>
                    </div>
                </div>
            @empty
                <p class="text-center">You haven't Generated in any Subject yet. <a data-bs-toggle="modal"
                        data-bs-target="#generateSubject" style="color:#ff4667">Generate Now</a> </p>
            @endforelse
        </div>
        <div>

            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <h5 class="mb-3 fs-18 border-bottom pb-3">Latest Quizzes</h5>

                            @forelse ($quizResults as $result)
                                <div
                                    class="d-flex align-items-center flex-wrap flex-md-nowrap justify-content-between row-gap-2 mb-3">
                                    <div>
                                        <h6 class="mb-1">{{ $result->course->Title ?? 'Untitled Course' }}</h6>
                                        <div class="d-flex align-items-center">
                                            <p>Correct Answer : {{ $result->score }}%</p>
                                        </div>
                                    </div>
                                    <div class="circle-progress flex-shrink-0" data-value="{{ $result->result }}">
                                        <span class="progress-left">
                                            <span
                                                class="progress-bar {{ $result->passed ? 'border-success' : 'border-danger' }}"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span
                                                class="progress-bar {{ $result->passed ? 'border-success' : 'border-danger' }}"></span>
                                        </span>
                                        <div class="progress-value">
                                            {{ $result->result }}%
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">No quiz results yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="modal fade" id="generateSubject" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="submitQuery">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Generate Subject</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="query" id="" style="height:90px" required
                                        placeholder="What do you want to learn ?"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="generate">Generate</button>
                        <button class="btn btn-primary" id="loadGenerate" style="display: none" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Generating...
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitQuery').submit(function(e) {
                e.preventDefault();
                $('#generate').hide();
                $('#loadGenerate').show();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('student.generate') }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#generate').show();
                        $('#loadGenerate').hide();
                        window.location.href = response.redirect;
                    },
                    error: function(response) {
                        $('#generate').show();
                        $('#loadGenerate').hide();
                        console.log('Error');
                    }
                });
            });
        });
    </script>
@endsection
