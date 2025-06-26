@extends('layouts.app')

@section('title', 'Course List')

@section('content')
    <div class="col-lg-9">
        <div class="row">
            <div class="col-xxl col-lg-4 col-md-6">
                <div class="card bg-success">
                    <div class="card-body">
                        <h6 class="fw-medium mb-1 text-white">Active Courses</h6>
                        <h4 class="fw-bold text-white">{{ $activeCount }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xxl col-lg-4 col-md-6">
                <div class="card bg-secondary">
                    <div class="card-body">
                        <h6 class="fw-medium mb-1 text-white">Pending Courses</h6>
                        <h4 class="fw-bold text-white">{{ $pendingCount }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xxl col-lg-4 col-md-6">
                <div class="card bg-info">
                    <div class="card-body">
                        <h6 class="fw-medium mb-1 text-white">Draft Courses</h6>
                        <h4 class="fw-bold text-white">{{ $draftCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-title d-flex align-items-center justify-content-between">
            <h5 class="fw-bold">Courses</h5>
            <div class="d-flex align-items-center list-icons">
                <a href="instructor-course.html" class="active me-2"><i class="isax isax-task"></i></a>
                <a href="instructor-course-grid.html"><i class="isax isax-element-3"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <div class="dropdown">
                        <a href="javascript:void(0);"
                            class="dropdown-toggle text-gray-6 btn  rounded border d-inline-flex align-items-center"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Published</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Pending</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Draft</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                        <i class="isax isax-search-normal-14"></i>
                    </span>
                    <input type="email" class="form-control form-control-md" placeholder="Search">
                </div>
            </div>
        </div>
        <div class="table-responsive custom-table">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Course Name</th>
                        <th>Students</th>
                        <th>Ratings</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($courses as $course)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.coursedetails', $course->id) }}" class="avatar avatar-lg me-2">
                                        <img class="img-fluid object-fit-cover" src="{{ $course->CourseMedia }}"
                                            alt="">

                                    </a>
                                    <div>
                                        <h6 class="fw-medium mb-2">
                                            <a
                                                href="{{ route('admin.coursedetails', $course->id) }}">{{ $course->title }}</a>
                                        </h6>
                                        <div class="d-flex align-items-center">
                                            @php
                                                $lessonCount = $course->topics->sum(function ($topic) {
                                                    return $topic->lessons->count();
                                                });
                                            @endphp
                                            <span class="d-inline-flex fs-12 align-items-center me-2 pe-2 border-end">
                                                <i class="isax isax-video-circle me-1 text-gray-9 fw-bold"></i>
                                                {{ $lessonCount }} Lessons
                                            </span>

                                            <span class="d-inline-flex fs-12 align-items-center me-2 pe-2 border-end">
                                                <i class="isax isax-message-question me-1 text-gray-9 fw-bold"></i>
                                                {{ $course->questions->count() }} Quizzes
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Enrolled students --}}
                            <td>{{ $course->enrollment_count }}</td>

                            {{-- Static rating for now --}}
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-star fs-12 filled text-warning me-1"></i>
                                    <span>4.2 (430)</span>
                                </div>
                            </td>

                            {{-- Status badge --}}
                            <td>
                                @php
                                    $status = $course->course_status;
                                    $badgeText = $status === '0' ? 'Pending' : ($status === '1' ? 'Draft' : 'Active');
                                    $badgeClass =
                                        $status === '0'
                                            ? 'bg-skyblue'
                                            : ($status === '1'
                                                ? 'bg-secondary'
                                                : 'bg-success');
                                @endphp
                                <span class="badge badge-sm {{ $badgeClass }} d-inline-flex align-items-center me-1">
                                    <i class="fa-solid fa-circle fs-5 me-1"></i>{{ $badgeText }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.coursedetails', $course->id) }}"
                                        class="d-inline-flex fs-14 me-1 action-icon">
                                        <i class="isax isax-edit-2"></i>
                                    </a>
                                    <a href="#" class="d-inline-flex fs-14 action-icon" data-bs-toggle="modal"
                                        data-bs-target="#delete_modal_{{ $course->id }}">
                                        <i class="isax isax-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /pagination -->
        <div class="row align-items-center mt-4">
            <div class="col-md-2">
                <p class="fs-14 fw-500 text-center text-md-start">Page 1 of 2</p>
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
