@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
    <div class="col-lg-9">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="icon-box bg-secondary-transparent me-2 me-xxl-3 flex-shrink-0">
                                <img src="{{ asset('img/icon/book.svg') }}" alt="">
                            </span>
                            <div>
                                <span class="d-block">Active Courses</span>
                                <h4 class="fs-24 mt-1">08</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="icon-box bg-info-transparent me-2 me-xxl-3 flex-shrink-0">
                                <img src="{{ asset('img/icon/user-octagon.svg') }}" alt="">
                            </span>
                            <div>
                                <span class="d-block">Total Students</span>
                                <h4 class="fs-24 mt-1">17</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="icon-box bg-blue-transparent me-2 me-xxl-3 flex-shrink-0">
                                <img src="{{ asset('img/icon/book-2.svg') }}" alt="">
                            </span>
                            <div>
                                <span class="d-block">Total Courses</span>
                                <h4 class="fs-24 mt-1">11</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mb-3 fw-bold">Recently Created Courses</h5>
        <div class="table-responsive custom-table">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Courses</th>
                        <th>Enrolled</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>
                                <div class="course-title d-flex align-items-center">
                                    <a href="{{ route('admin.coursedetails', ['id' => $course->id]) }}"
                                        class="avatar avatar-xl flex-shrink-0 me-2">
                                        {{-- Display base64 image --}}
                                        @if (Str::startsWith($course->CourseMedia, 'data:image'))
                                            <img src="{{ $course->CourseMedia }}" alt="Course Image">
                                        @else
                                            {{-- If CourseMedia is a path, use asset or Storage --}}
                                            <img src="{{ asset('storage/' . $course->CourseMedia) }}" alt="Course Image">
                                        @endif
                                    </a>
                                    <div>
                                        <p class="fw-medium">
                                            <a href="{{ route('admin.coursedetails', ['id' => $course->id]) }}">
                                                {{ $course->Title }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>0</td> {{-- You can replace this with dynamic data like number of lessons --}}
                            <td>Published</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script>
    if ($('.summernote').length > 0) {
        $('.summernote').summernote({
            height: 160,
            minHeight: null,
            maxHeight: null,
            toolbar: [
                ['fontsize', ['fontsize']],
                ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
                ['insert', ['picture']]
            ],
        });
    }
</script>
