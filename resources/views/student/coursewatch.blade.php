@include('layouts.header')

<div class="content pt-0">
    <div class="container-fluid">
        <div class="course-watch-section">
            <div class="row">
                <!-- Left side -->
                <div class="col-lg-4 border-end">
                    <div class="progress-overview-section position-relative" style="padding-bottom: 100px;">
                        <div class="mb-4">
                            <a href="javascript:void(0);" class="back-to-course">
                                <i class="isax isax-arrow-left me-1"></i>Back to Course
                            </a>
                        </div>

                        <h3>{{ $course->Title }}</h3>

                        <div class="accordions-items-seperate" id="accordionSpacingExample">
                            @foreach ($course->topics as $index => $topic)
                                <div class="accordion-item">
                                    @php
                                        $isDisabled = false;
                                        $completionStatus = '';
                                        // If all topics are 0, only enable the first
                                        if ($course->topics->every(fn($t) => $t->topicStatus == 0)) {
                                            $isDisabled = $index !== 0;
                                        } else {
                                            if ($topic->topicStatus == 0) {
                                                $isDisabled = true; // locked
                                            }
                                            if ($topic->topicStatus == 1) {
                                                $isDisabled = true; // completed
                                                $completionStatus = '- Completed';
                                            }
                                            if ($topic->topicStatus == 2) {
                                                $isDisabled = false; // next (enabled)
                                            }
                                        }
                                    @endphp

                                    <div class="accordion-header {{ $isDisabled ? 'disabled' : '' }}"
                                        id="headingSpacing{{ $index }}">
                                        <div class="accordion-button collapsed {{ $isDisabled ? 'disabled' : '' }}"
                                            role="button"
                                            @if (!$isDisabled) data-bs-toggle="collapse" data-bs-target="#Spacing{{ $index }}" aria-controls="Spacing{{ $index }}" @endif
                                            aria-expanded="false">
                                            <div>
                                                <span class="d-block mb-1">Section {{ $index + 1 }} <span
                                                        style="color: green;font-weight:600">{{ $completionStatus }}</span>
                                                </span>
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
                                            <button data-topic="{{ $topic->id }}"
                                                class="btn btn-primary btn-take-quiz" data-course="{{ $course->id }}"
                                                {{ $isDisabled ? 'disabled' : '' }}>
                                                Take Quiz
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right side -->
                <div class="col-lg-8">
                    <!-- Video section -->
                    <div id="videoSection" class="course-watch-content">
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
                                    <p>{{ strip_tags($course->notes) }}</p>
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

                    <!-- Quiz section (hidden initially) -->
                    <div id="quizSection" class="course-watch-content d-none">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h4>Quiz</h4>
                            <button class="btn btn-secondary btn-sm" id="backToVideo">Back to Video</button>
                        </div>
                        <div id="quizContent">
                            {{-- You can replace this with dynamic quiz rendering --}}
                            <p>This is where the quiz content will appear for course
                                <strong>{{ $course->Title }}</strong>.
                            </p>
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

    // Switch between video and quiz
    document.querySelectorAll('.btn-take-quiz').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('videoSection').classList.add('d-none');
            document.getElementById('quizSection').classList.remove('d-none');
        });
    });

    document.getElementById('backToVideo').addEventListener('click', function() {
        document.getElementById('quizSection').classList.add('d-none');
        document.getElementById('videoSection').classList.remove('d-none');
    });

    // Open video click
    document.querySelectorAll('.open-video').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const videoUrl = this.dataset.video.replace("watch?v=", "embed/");
            const iframe = document.getElementById('lessonVideoIframe');
            iframe.src = videoUrl + "?enablejsapi=1";
            document.getElementById('currentLessonId').value = this.dataset.lessonId;
        });
    });

    $(document).ready(function() {
        // Open video click
        $(".open-video").on("click", function(e) {
            e.preventDefault();
            const videoUrl = $(this).data("video").replace("watch?v=", "embed/");
            $("#lessonVideoIframe").attr("src", videoUrl + "?enablejsapi=1");
            $("#currentLessonId").val($(this).data("lesson-id"));
        });

        // Take Quiz button
        $(".btn-take-quiz").on("click", function() {
            let topicId = $(this).data("topic");

            $.ajax({
                url: `/topics/${topicId}/quiz`,
                type: "GET",
                success: function(html) {
                    $("#quizContent").html(html);

                    // Switch view
                    $("#videoSection").addClass("d-none");
                    $("#quizSection").removeClass("d-none");

                    // Wizard navigation
                    $(".next_btn").click(function() {
                        let fieldset = $(this).closest("fieldset");
                        fieldset.addClass("d-none");
                        fieldset.next("fieldset").removeClass("d-none");
                    });

                    $(".prev_btn").click(function() {
                        let fieldset = $(this).closest("fieldset");
                        fieldset.addClass("d-none");
                        fieldset.prev("fieldset").removeClass("d-none");
                    });
                },
                error: function(xhr) {
                    $("#quizContent").html(
                        `<p class="text-danger">Failed to load quiz.</p>`);
                    console.error(xhr.responseText);
                }
            });
        });

        // Back button
        $("#backToVideo").on("click", function() {
            $("#quizSection").addClass("d-none");
            $("#videoSection").removeClass("d-none");
        });
    });
</script>

<style>
    .accordion-button.disabled {
        pointer-events: none !important;
        opacity: 0.6;
        cursor: not-allowed;
    }

    .accordion-header.disabled {
        pointer-events: none !important;
        opacity: 0.6;
    }
</style>
