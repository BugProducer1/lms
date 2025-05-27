@include('layouts.header')

@section('title', 'Course Details')


<section class="course-details-two">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card bg-light">
                    <div class="card-body d-lg-flex align-items-center">
                        <div class="position-relative">
                            <a href="https://www.youtube.com/embed/1trvO6dqQUI" id="openVideoBtn" target="_blank">
                                <img class="img-fluid rounded-2" src="{{ asset('img/course/video-bg.jpg') }}"
                                    alt="img">
                                <div class="play-icon">
                                    <i class="ti ti-player-play-filled fs-28"></i>
                                </div>
                            </a>
                        </div>
                        <div id="videoModal">
                            <div class="modal-content1">
                                <span class="close-btn" id="closeModal">&times;</span>
                                <iframe id="youtubeIframe" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="w-100 ps-lg-4">
                            <h3 class="mb-2">{{ $course->Title }}</h3>
                            <p class="fs-14 mb-3">{{ $course->ShortDescription }}</p>
                            <div class="d-flex align-items-center gap-2 gap-sm-3 gap-xl-4 flex-wrap my-3 my-sm-0">
                                <p class="fw-medium d-flex align-items-center mb-0"><img class="me-2"
                                        src="{{ asset('img/icons/book.svg') }}" alt="img">12+ Lesson</p>
                                <p class="fw-medium d-flex align-items-center mb-0"><img class="me-2"
                                        src="{{ asset('img/icons/timer-start.svg') }}" alt="img">9hr 30min</p>
                                <p class="fw-medium d-flex align-items-center mb-0"><img class="me-2"
                                        src="{{ asset('img/icons/people.svg') }}" alt="img">32 students enrolled
                                </p>
                                <span class="badge badge-sm rounded-pill bg-warning fs-12">Web Development</span>
                            </div>
                            <div class="d-sm-flex align-items-center justify-content-sm-between mt-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <img class="rounded-circle" src="{{ asset('img/avatar/avatar10.jpg') }}"
                                            alt="img">
                                    </div>
                                    <div class="ms-2">
                                        <h5 class="fs-18 fw-semibold"><a
                                                href="instructor-details.html">{{ $course->instructor->name . ' ' . $course->instructor->last_name ?? 'No Name' }}</a>
                                        </h5>
                                        <p class="fs-14">Instructor</p>
                                    </div>
                                </div>
                                <div class="d-flex mt-sm-0 mt-2 align-items-center">
                                    <i class="fa-solid fa-star text-warning me-1"></i>
                                    <i class="fa-solid fa-star text-warning me-1"></i>
                                    <i class="fa-solid fa-star text-warning me-1"></i>
                                    <i class="fa-solid fa-star text-warning me-1"></i>
                                    <i class="fa-solid fa-star text-gray-1 me-1"></i>
                                    <p class=" fs-14"><span class="text-gray-9">4.0</span> (15) </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-8">
                <div>
                    <img src="{{ $course->CourseMedia }}" alt="img" class="img-fluid mb-4"
                        style="width:100%;height:400px">
                </div>
                <div class="course-page-content pt-0">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">Overview</h5>
                            <h6 class="mb-2">Course Description</h6>
                            <p>{{ strip_tags($course->CourseDescription) }}</p>
                            <h6 class="mb-2">What you'll learn</h6>
                            <ul class="custom-list mb-3">
                                @foreach ($course->learningOutcomes as $outcome)
                                    <li class="list-item">{{ $outcome->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-wrap">
                                <h5 class="subs-title mb-2 mb-sm-3">Course Content</h5>
                            </div>
                            <div class="accordion accordion-customicon1 accordions-items-seperate p-0"
                                id="accordioncustomicon1Example">
                                @foreach ($course->topics as $index => $topic)
                                    <div class="accordion-item" data-aos="fade-up">
                                        <h2 class="accordion-header" id="headingcustomicon{{ $index }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapsecustomicon{{ $index }}"
                                                aria-expanded="false"
                                                aria-controls="collapsecustomicon{{ $index }}">
                                                {{ $topic->title }} <i class="fa-solid fa-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapsecustomicon{{ $index }}"
                                            class="accordion-collapse collapse"
                                            aria-labelledby="headingcustomicon{{ $index }}"
                                            data-bs-parent="#accordioncustomicon1Example">
                                            <div class="accordion-body p-0">
                                                <ul>
                                                    @foreach ($topic->lessons as $lesson)
                                                        <li class="p-4 px-3 d-flex justify-content-between">
                                                            <p class="mb-0">
                                                                <img class="me-2"
                                                                    src="{{ asset('/img/icons/play.svg') }}"
                                                                    alt="img">
                                                                {{ $lesson->title }}
                                                            </p>
                                                            <div class="d-flex gap-xl-5 gap-3">
                                                                <a href="{{ $lesson->lessonVideo }}"
                                                                    class="preview-link" target="_blank">Preview</a>
                                                                <p class="mb-0">{{ $lesson->duration ?? '00:00' }}
                                                                </p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="subs-title mb-3">Post A comment</h5>
                            <form class="course-details-form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" type="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Subject</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Comments</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn post-btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="course-sidebar-sec mt-0">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between gap-3 wishlist-btns">
                                <a class="btn d-flex btn-wish" href="student-wishlist.html"><i
                                        class="isax isax-heart me-1 fs-18"></i>Add to Wishlist</a>
                                <a class="btn d-flex btn-wish" href="#"><i
                                        class="ti ti-share me-1 fs-18"></i>Share</a>
                            </div>
                            <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100 mt-3 btn-enroll">Enroll
                                    Now</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body cou-features">
                            <h5 class="subs-title">Course Features</h5>
                            <ul>
                                <li>
                                    <p class="mb-0"><img class="me-2"
                                            src="{{ asset('/img/icons/people2.svg') }}" alt="img">Enrolled: 32
                                        students</p>
                                </li>
                                <li>
                                    <p class="mb-0"><img class="me-2"
                                            src="{{ asset('img/icons/timer-start3.svg') }}" alt="img">Duration:
                                        20 hours</p>
                                </li>
                                <li>
                                    <p class="mb-0"><img class="me-2" src="{{ asset('img/icons/note.svg') }}"
                                            alt="img">Chapters: 15</p>
                                </li>
                                <li>
                                    <p class="mb-0"><img class="me-2" src="{{ asset('img/icons/play3.svg') }}"
                                            alt="img">Video: 12 hours</p>
                                </li>
                                <li>
                                    <p class="mb-0"><img class="me-2" src="{{ asset('img/icons/chart.svg') }}"
                                            alt="img">Level: Beginner</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.footer')
