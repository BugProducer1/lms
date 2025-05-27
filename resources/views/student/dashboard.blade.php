@extends('layouts.studentapp')

@section('title', 'Dashboard')

@section('content')
    <div class="col-lg-9">
        <div class="card bg-light quiz-ans-card">
            <img src="{{ asset('img/shapes/withdraw-bg1.svg') }}" src="{{ asset('') }}" class="quiz-ans-bg1" alt="img">
            <img src="{{ asset('img/shapes/withdraw-bg2.svg') }}" class="quiz-ans-bg2" alt="img">
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="icon-box bg-primary-transparent me-2 me-xxl-3 flex-shrink-0"><img
                                    src="{{ asset('img/icon/graduation.svg') }}" alt=""></span>
                            <div>
                                <span class="d-block">Enrolled Courses</span>
                                <h4 class="fs-24 mt-1">12</h4>
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
                                <span class="d-block">Active Courses</span>
                                <h4 class="fs-24 mt-1">03</h4>
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
                                <span class="d-block">Completed Courses</span>
                                <h4 class="fs-24 mt-1">10</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mb-3 fs-18">Recently Enrolled Courses</h5>
        <div class="row">
            @forelse ($courses as $course)
                <div class="col-xl-4 col-md-6">
                    <div class="course-item-two course-item mx-0">
                        <div class="course-img">
                            <a href="{{ route('student.coursewatch', $course->id) }}">
                                <img src="{{ $course->CourseMedia }}" alt="Course Image" class="img-fluid">
                            </a>
                        </div>
                        <div class="course-content">
                            <div class="d-flex justify-content-between mb-2">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="avatar avatar-sm">
                                        <img src="{{ $course->instructor->profile_photo ?? asset('img/user/default.jpg') }}"
                                            alt="Instructor" class="img-fluid rounded-circle">
                                    </a>
                                    <div class="ms-2">
                                        <a href="#" class="link-default fs-14">
                                            {{ $course->instructor->name . ' ' . $course->instructor->last_name ?? 'Unknown Instructor' }}
                                        </a>
                                    </div>
                                </div>
                                <span class="badge bg-light fs-13 fw-medium mb-0">
                                    {{ $course->Category ?? 'General' }}
                                </span>
                            </div>
                            <h6 class="title mb-2">
                                <a href="{{ route('student.coursewatch', $course->id) }}">
                                    {{ $course->Title }}
                                </a>
                            </h6>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('student.coursewatch', $course->id) }}"
                                    class="btn btn-dark btn-sm d-inline-flex align-items-center">
                                    Take Course<i class="isax isax-arrow-right-3 ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">You haven't enrolled in any courses yet.</p>
            @endforelse
        </div>
        <div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <h5 class="mb-3 fs-18 border-bottom pb-3">Latest Quizes</h5>
                            <div
                                class="d-flex align-items-center flex-wrap flex-md-nowrap justify-content-between row-gap-2 mb-3">
                                <div>
                                    <h6 class="mb-1">Sketch from A to Z (2024)</h6>
                                    <div class="d-flex align-items-center">
                                        <p>Correct Answer : 15/22</p>
                                    </div>
                                </div>
                                <div class="circle-progress flex-shrink-0" data-value='95'>
                                    <span class="progress-left">
                                        <span class="progress-bar border-success"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar border-success"></span>
                                    </span>
                                    <div class="progress-value">95%</div>
                                </div>
                            </div>
                            <div
                                class="d-flex align-items-center flex-wrap flex-md-nowrap justify-content-between row-gap-2 mb-3">
                                <div>
                                    <h6 class="mb-1">Build Responsive Real World </h6>
                                    <div class="d-flex align-items-center">
                                        <p>Correct Answer : 18/22</p>
                                    </div>
                                </div>
                                <div class="circle-progress flex-shrink-0" data-value='100'>
                                    <span class="progress-left">
                                        <span class="progress-bar border-success"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar border-success"></span>
                                    </span>
                                    <div class="progress-value">100%</div>
                                </div>
                            </div>
                            <div
                                class="d-flex align-items-center flex-wrap flex-md-nowrap justify-content-between row-gap-2 mb-3">
                                <div>
                                    <h6 class="mb-1">UI/UX Design Degree</h6>
                                    <div class="d-flex align-items-center">
                                        <p>Correct Answer : 25/30</p>
                                    </div>
                                </div>
                                <div class="circle-progress flex-shrink-0" data-value='80'>
                                    <span class="progress-left">
                                        <span class="progress-bar border-success"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar border-success"></span>
                                    </span>
                                    <div class="progress-value">80%</div>
                                </div>
                            </div>
                            <div
                                class="d-flex align-items-center flex-wrap flex-md-nowrap justify-content-between row-gap-2 mb-3">
                                <div>
                                    <h6 class="mb-1">Build Responsive Real World </h6>
                                    <div class="d-flex align-items-center">
                                        <p>Correct Answer : 15/20</p>
                                    </div>
                                </div>
                                <div class="circle-progress flex-shrink-0" data-value='85'>
                                    <span class="progress-left">
                                        <span class="progress-bar border-success"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar border-success"></span>
                                    </span>
                                    <div class="progress-value">85%</div>
                                </div>
                            </div>
                            <div
                                class="d-flex align-items-center flex-wrap flex-md-nowrap justify-content-between row-gap-2">
                                <div>
                                    <h6 class="mb-1">Become an app designer</h6>
                                    <div class="d-flex align-items-center">
                                        <p>Correct Answer : 12/20</p>
                                    </div>
                                </div>
                                <div class="circle-progress flex-shrink-0" data-value='20'>
                                    <span class="progress-left">
                                        <span class="progress-bar border-danger"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar border-danger"></span>
                                    </span>
                                    <div class="progress-value">20%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
