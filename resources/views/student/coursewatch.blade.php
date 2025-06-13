@include('layouts.header')


<div class="content pt-0">
    <div class="container-fluid">
        <div class="course-watch-section">
            <div class="row">
                <div class="col-lg-4  border-end">
                    <div class="progress-overview-section">
                        <div class="mb-4">
                            <a href="javascript:void(0);" class="back-to-course"><i
                                    class="isax isax-arrow-left me-1"></i>Back to Course</a>
                        </div>
                        <h3>
                            {{ $course->Title }}
                        </h3>
                        <div class="mb-4">
                            <p class="mb-1">46% Complete</p>
                            <div class="progress progress-xs mb-2" role="progressbar" aria-valuenow="10"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-success" style="width: 70%"></div>
                            </div>
                            <span class="fw-medium">Last activity on April 20, 2025</span>
                        </div>

                        <div class="accordions-items-seperate" id="accordionSpacingExample">
                            @foreach ($course->topics as $index => $topic)
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingSpacing{{ $index }}">
                                        <div class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                                            data-bs-target="#Spacing{{ $index }}" aria-expanded="false"
                                            aria-controls="Spacing{{ $index }}">
                                            <div>
                                                <span class="d-block mb-1">Section {{ $index + 1 }}</span>
                                                <h6 class="mb-0">{{ $topic->title }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Spacing{{ $index }}" class="accordion-collapse collapse"
                                        aria-labelledby="headingSpacing{{ $index }}"
                                        data-bs-parent="#accordionSpacingExample">
                                        <div class="accordion-body">
                                            @foreach ($topic->lessons as $lesson)
                                                @php
                                                    $progress = $lesson->progressForUser(auth()->id());
                                                @endphp

                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <span class="d-flex">
                                                            <i
                                                                class="isax {{ $progress >= 100 ? 'isax-check-circle text-success' : 'isax-play-circle5 text-muted' }} fs-24 me-1"></i>
                                                        </span>
                                                        <p class="accordian-content mb-0">
                                                            <a href="#"
                                                                class="open-video text-decoration-none text-dark"
                                                                data-video="{{ $lesson->lessonVideo }}"
                                                                data-lesson-id="{{ $lesson->id }}">
                                                                {{ $lesson->title }}
                                                                @if ($progress >= 100)
                                                                    <span class="badge bg-success ms-1">Done</span>
                                                                @elseif ($progress > 0)
                                                                    <span
                                                                        class="badge bg-warning ms-1">{{ $progress }}%</span>
                                                                @endif
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="course-watch-content">
                        <div class="position-relative video-btn" id="videoPlayer">
                            <iframe id="lessonVideoIframe" class="img-fluid" width="100%" height="420"
                                src="" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                            <input type="hidden" id="currentLessonId" value="">
                        </div>
                        <div id="videoModal">
                            <div class="modal-content1">
                                <span class="close-btn" id="closeModal">&times;</span>
                                <iframe id="youtubeIframe" allowfullscreen></iframe>
                            </div>
                        </div>
                        <ul class="nav-tabs mb-4 nav-justified border-0 nav-style-1 d-sm-flex d-block" role="tablist">
                            <li class="nav-item active">
                                <a class="btn nav-link active" data-bs-toggle="tab" role="tab" href="#overview"
                                    aria-selected="false">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn nav-link" data-bs-toggle="tab" role="tab" href="#notes"
                                    aria-selected="false">Notes</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn nav-link" data-bs-toggle="tab" role="tab" href="#faq"
                                    aria-selected="true">FAQ</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="overview" role="tabpanel">
                                <div class="mb-4">
                                    <h6 class="fs-18 fw-semibold mb-1">About this course</h6>
                                    <p>{{ $course->ShortDescription }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="fs-18 fw-semibold mb-2">Description</h6>
                                    <p>{{ strip_tags($course->CourseDescription) }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="fs-18 fw-semibold mb-2">What You’ll Learn</h6>
                                    <ul class="list-unstyled what-you-learn ms-4" style="list-style-type: disc;">
                                        @foreach ($course->learningOutcomes as $outcome_row)
                                            <li class="mb-2">{{ $outcome_row->title }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" id="notes" role="tabpanel">
                                <div class="mb-0">
                                    <h6 class="fs-18 fw-semibold mb-1">Notes</h6>
                                    <p>{{ strip_tags($course->ShortDescription) }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="faq" role="tabpanel">
                                <div class="faq-accordion">
                                    <div class="accordions-items-seperate" id="accordionSpacingExample2">
                                        @foreach ($course->faqs as $index => $faq)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="headingSpacingTwo{{ $index }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#accordion{{ $index }}"
                                                        aria-expanded="false"
                                                        aria-controls="accordion{{ $index }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h2>
                                                <div id="accordion{{ $index }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingSpacingTwo{{ $index }}"
                                                    data-bs-parent="#accordionSpacingExample2">
                                                    <div class="accordion-body">
                                                        <p class="mb-0">{{ $faq->answer }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script src="https://www.youtube.com/iframe_api"></script>
<script>
    let player;
    let updateInterval;
    let userId = {{ auth()->user()->id }};

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('lessonVideoIframe', {
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.PLAYING) {
            clearInterval(updateInterval);
            updateInterval = setInterval(() => {
                const currentTime = player.getCurrentTime();
                const duration = player.getDuration();
                const progress = Math.floor((currentTime / duration) * 100);
                const lessonId = document.getElementById('currentLessonId').value;

                // Send to backend
                fetch(`/api/lesson-progress`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        lesson_id: lessonId,
                        progress: progress
                    })
                });
            }, 5000);
        } else {
            clearInterval(updateInterval);
        }
    }

    document.querySelectorAll('.open-video').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const videoUrl = this.dataset.video.replace("watch?v=", "embed/");
            const iframe = document.getElementById('lessonVideoIframe');
            iframe.src = videoUrl + "?enablejsapi=1";
            document.getElementById('currentLessonId').value = this.dataset.lessonId;
        });
    });
</script>
