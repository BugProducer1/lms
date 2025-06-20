@extends('layouts.studentapp')

@section('title', 'Enrolled Courses')

@section('content')
    <div class="col-lg-9">
        <div class="page-title d-flex flex-wrap gap-3 align-items-center justify-content-between">
            <h5>Enrolled Courses</h5>
            <div class="tab-list">
                <ul class="nav mb-0 gap-2" role="tablist">
                    <li class="nav-item mb-0" role="presentation">
                        <a href="javascript:void(0);" class="active" data-bs-toggle="tab" data-bs-target="#enroll-courses"
                            aria-selected="true" role="tab">Enrolled (09)</a>
                    </li>
                    <li class="nav-item mb-0" role="presentation">
                        <a href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#active-courses"
                            aria-selected="false" role="tab" class="" tabindex="-1">Active (06)</a>
                    </li>
                    <li class="nav-item mb-0" role="presentation">
                        <a href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#complete-courses"
                            aria-selected="false" role="tab" class="" tabindex="-1">Completed (03)</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="enroll-courses" role="tabpanel">
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
            </div>
            <div class="tab-pane fade" id="active-courses" role="tabpanel">
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="course-item-two course-item mx-0">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-01.jpg') }}" alt="img" class="img-fluid">
                                </a>
                                <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                    <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                            class="isax isax-heart"></i></a>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <a href="instructor-details.html" class="avatar avatar-sm">
                                            <img src="{{ asset('img/user/user-29.jpg') }}" alt="img"
                                                class="img-fluid avatar avatar-sm rounded-circle">
                                        </a>
                                        <div class="ms-2">
                                            <a href="instructor-details.html" class="link-default fs-14">Brenda Slaton</a>
                                        </div>
                                    </div>
                                    <span
                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                        Design
                                    </span>
                                </div>
                                <h6 class="title mb-2"><a href="course-details.html">Information About UI/UX Design
                                        Degree</a></h6>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="fa-solid fa-star text-warning me-2"></i>4.9 (200 Reviews)</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="course-details.html"
                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">View Course<i
                                            class="isax isax-arrow-right-3 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="course-item-two course-item mx-0">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-02.jpg') }}" alt="img" class="img-fluid">
                                </a>
                                <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                    <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                            class="isax isax-heart"></i></a>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <a href="instructor-details.html" class="avatar avatar-sm">
                                            <img src="{{ asset('img/user/user-30.jpg') }}" alt="img"
                                                class="img-fluid avatar avatar-sm rounded-circle">
                                        </a>
                                        <div class="ms-2">
                                            <a href="instructor-details.html" class="link-default fs-14">Ana Reyes</a>
                                        </div>
                                    </div>
                                    <span
                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                        Wordpress
                                    </span>
                                </div>
                                <h6 class="title mb-2"><a href="course-details.html">Wordpress for Beginners - Master
                                        Wordpress Quickly</a></h6>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="fa-solid fa-star text-warning me-2"></i>4.4 (160 Reviews)</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="course-details.html"
                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">View Course<i
                                            class="isax isax-arrow-right-3 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="course-item-two course-item mx-0">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-03.jpg') }}" alt="img" class="img-fluid">
                                </a>
                                <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                    <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                            class="isax isax-heart"></i></a>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <a href="instructor-details.html" class="avatar avatar-sm">
                                            <img src="{{ asset('img/user/user-31.jpg') }}" alt="img"
                                                class="img-fluid avatar avatar-sm rounded-circle">
                                        </a>
                                        <div class="ms-2">
                                            <a href="instructor-details.html" class="link-default fs-14">Andrew Pirtle</a>
                                        </div>
                                    </div>
                                    <span
                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                        Design
                                    </span>
                                </div>
                                <h6 class="title mb-2"><a href="course-details.html">Sketch from A to Z (2024): Become an
                                        app designer</a></h6>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="fa-solid fa-star text-warning me-2"></i>4.4 (160 Reviews)</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="course-details.html"
                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">View Course<i
                                            class="isax isax-arrow-right-3 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="course-item-two course-item mx-0">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-04.jpg') }}" alt="img" class="img-fluid">
                                </a>
                                <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                    <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                            class="isax isax-heart"></i></a>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <a href="instructor-details.html" class="avatar avatar-sm">
                                            <img src="{{ asset('img/user/user-32.jpg') }}" alt="img"
                                                class="img-fluid avatar avatar-sm rounded-circle">
                                        </a>
                                        <div class="ms-2">
                                            <a href="instructor-details.html" class="link-default fs-14">Christy
                                                Garner</a>
                                        </div>
                                    </div>
                                    <span
                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                        Programming
                                    </span>
                                </div>
                                <h6 class="title mb-2"><a href="course-details.html">Build Responsive Real World Websites
                                        with Crash Course</a></h6>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="fa-solid fa-star text-warning me-2"></i>4.2 (220 Reviews)</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="course-details.html"
                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">View Course<i
                                            class="isax isax-arrow-right-3 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="course-item-two course-item mx-0">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-05.jpg') }}" alt="img" class="img-fluid">
                                </a>
                                <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                    <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                            class="isax isax-heart"></i></a>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <a href="instructor-details.html" class="avatar avatar-sm">
                                            <img src="{{ asset('img/user/user-32.jpg') }}" alt="img"
                                                class="img-fluid avatar avatar-sm rounded-circle">
                                        </a>
                                        <div class="ms-2">
                                            <a href="instructor-details.html" class="link-default fs-14">Justin
                                                Gregory</a>
                                        </div>
                                    </div>
                                    <span
                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                        Programming
                                    </span>
                                </div>
                                <h6 class="title mb-2"><a href="course-details.html">Learn JavaScript and Express to
                                        become a Expert</a></h6>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="fa-solid fa-star text-warning me-2"></i>4.4 (180 Reviews)</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="course-details.html"
                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">View Course<i
                                            class="isax isax-arrow-right-3 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="course-item-two course-item mx-0">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-06.jpg') }}" alt="img" class="img-fluid">
                                </a>
                                <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                    <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                            class="isax isax-heart"></i></a>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <a href="instructor-details.html" class="avatar avatar-sm">
                                            <img src="{{ asset('img/user/user-33.jpg') }}" alt="img"
                                                class="img-fluid avatar avatar-sm rounded-circle">
                                        </a>
                                        <div class="ms-2">
                                            <a href="instructor-details.html" class="link-default fs-14">Carolyn Hines</a>
                                        </div>
                                    </div>
                                    <span
                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                        Programming
                                    </span>
                                </div>
                                <h6 class="title mb-2"><a href="course-details.html">Introduction to Python
                                        Programming</a></h6>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="fa-solid fa-star text-warning me-2"></i>4.4 (180 Reviews)</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="course-details.html"
                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">View Course<i
                                            class="isax isax-arrow-right-3 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="complete-courses" role="tabpanel">
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="course-item-two course-item mx-0">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-04.jpg') }}" alt="img" class="img-fluid">
                                </a>
                                <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                    <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                            class="isax isax-heart"></i></a>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <a href="instructor-details.html" class="avatar avatar-sm">
                                            <img src="{{ asset('img/user/user-32.jpg') }}" alt="img"
                                                class="img-fluid avatar avatar-sm rounded-circle">
                                        </a>
                                        <div class="ms-2">
                                            <a href="instructor-details.html" class="link-default fs-14">Christy
                                                Garner</a>
                                        </div>
                                    </div>
                                    <span
                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                        Programming
                                    </span>
                                </div>
                                <h6 class="title mb-2"><a href="course-details.html">Build Responsive Real World Websites
                                        with Crash Course</a></h6>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="fa-solid fa-star text-warning me-2"></i>4.2 (220 Reviews)</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="course-details.html"
                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">View Course<i
                                            class="isax isax-arrow-right-3 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="course-item-two course-item mx-0">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-05.jpg') }}" alt="img" class="img-fluid">
                                </a>
                                <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                    <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                            class="isax isax-heart"></i></a>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <a href="instructor-details.html" class="avatar avatar-sm">
                                            <img src="{{ asset('img/user/user-32.jpg') }}" alt="img"
                                                class="img-fluid avatar avatar-sm rounded-circle">
                                        </a>
                                        <div class="ms-2">
                                            <a href="instructor-details.html" class="link-default fs-14">Justin
                                                Gregory</a>
                                        </div>
                                    </div>
                                    <span
                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                        Programming
                                    </span>
                                </div>
                                <h6 class="title mb-2"><a href="course-details.html">Learn JavaScript and Express to
                                        become a Expert</a></h6>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="fa-solid fa-star text-warning me-2"></i>4.4 (180 Reviews)</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="course-details.html"
                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">View Course<i
                                            class="isax isax-arrow-right-3 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="course-item-two course-item mx-0">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-06.jpg') }}" alt="img" class="img-fluid">
                                </a>
                                <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                    <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                            class="isax isax-heart"></i></a>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <a href="instructor-details.html" class="avatar avatar-sm">
                                            <img src="{{ asset('img/user/user-33.jpg') }}" alt="img"
                                                class="img-fluid avatar avatar-sm rounded-circle">
                                        </a>
                                        <div class="ms-2">
                                            <a href="instructor-details.html" class="link-default fs-14">Carolyn Hines</a>
                                        </div>
                                    </div>
                                    <span
                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                        Programming
                                    </span>
                                </div>
                                <h6 class="title mb-2"><a href="course-details.html">Introduction to Python
                                        Programming</a></h6>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="fa-solid fa-star text-warning me-2"></i>4.4 (180 Reviews)</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="course-details.html"
                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">View Course<i
                                            class="isax isax-arrow-right-3 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /pagination -->
        <div class="row align-items-center mt-2">
            <div class="col-md-2">
                <p class="pagination-text">Page 1 of 2</p>
            </div>
            <div class="col-md-10">
                <ul class="pagination lms-page justify-content-center justify-content-md-end mt-2 mt-md-0">
                    <li class="page-item prev">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1"><i
                                class="fas fa-angle-left"></i></a>
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
