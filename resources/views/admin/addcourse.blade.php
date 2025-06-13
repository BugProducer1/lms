@include('layouts.header')

@section('title', 'Add Lesson')

<form action="{{ route('courses.store') }}" method="POST" id="courseForm" enctype="multipart/form-data">
    @csrf
    <!-- Course add -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="add-course-item">
                        <div class="wizard">
                            <ul class="form-wizard-steps" id="progressbar2">
                                <li class="progress-active">
                                    <div class="profile-step">
                                        <span class="dot-active mb-2">
                                            <span class="number">01</span>
                                            <span class="tickmark"><i class="fa-solid fa-check"></i></span>
                                        </span>
                                        <div class="step-section">
                                            <p>Course Information</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile-step">
                                        <span class="dot-active mb-2">
                                            <span class="number">02</span>
                                            <span class="tickmark"><i class="fa-solid fa-check"></i></span>
                                        </span>
                                        <div class="step-section">
                                            <p>Course Media</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile-step">
                                        <span class="dot-active mb-2">
                                            <span class="number">03</span>
                                            <span class="tickmark"><i class="fa-solid fa-check"></i></span>
                                        </span>
                                        <div class="step-section">
                                            <p>Curriculam</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile-step">
                                        <span class="dot-active mb-2">
                                            <span class="number">04</span>
                                            <span class="tickmark"><i class="fa-solid fa-check"></i></span>
                                        </span>
                                        <div class="step-section">
                                            <p>Additional information</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile-step">
                                        <span class="dot-active mb-2">
                                            <span class="number">05</span>
                                            <span class="tickmark"><i class="fa-solid fa-check"></i></span>
                                        </span>
                                        <div class="step-section">
                                            <p>Quiz</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="initialization-form-set">
                            <fieldset class="form-inner wizard-form-card" id="first">
                                <div class="title">
                                    <h5>Basic Information</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Course Title<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" name="Title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Course Category<span
                                                    class="text-danger ms-1">*</span></label>
                                            <select name="Category" class="select form-control">
                                                <option>Select</option>
                                                <option>BSIT </option>
                                                <option>BSED</option>
                                                <option>BEED</option>
                                                <option>HRM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Short Description<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input name="ShortDescription" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" name="CourseDescription" id="description">
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Course Description<span
                                                    class="text-danger ms-1">*</span></label>
                                            <textarea name="CourseDescription" class="summernote form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bg-light border p-4 rounded-3">
                                            <h6 class="mb-2">What will students learn in your course?</h6>
                                            <div class="input-block" id="input-block">
                                                <div class="d-flex align-items-center add-new-input">
                                                    <input type="text" class="form-control"
                                                        value="Become a UX designer">
                                                    <a href="javascript:void(0);" class="link-trash"><i
                                                            class="isax isax-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end">
                                                <a href="javascript:void(0);"
                                                    class="d-flex align-items-center add-new-topic"
                                                    id="add-new-topic-btn">
                                                    <i class="isax isax-add me-1"></i> Add New Item
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="add-form-btn widget-next-btn submit-btn d-flex justify-content-end mb-0">
                                    <div class="btn-left">
                                        <a href="javascript:void(0);" class="btn main-btn next_btns">Next <i
                                                class="isax isax-arrow-right-3 ms-1"></i></a>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-inner wizard-form-card">
                                <div class="title">
                                    <h5>Course Media</h5>
                                    <p>Intro Course overview provider type. (.mp4, YouTube, Vimeo etc.)</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label class="form-label">Course Thumbnail<span
                                                            class="text-danger ms-1">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="upload-img-section d-flex align-items-center justify-content-center"
                                            id="upload-img-section" style="height: 300px">
                                            <textarea name="CourseMedia" id="CourseMediaBase64" cols="30" rows="10" style="display: none"></textarea>
                                            <input type="file" id="upload-img-input" style="display: none;"
                                                accept="image/jpeg, image/png, image/gif, image/webp">
                                            <div class="upload-content text-center">
                                                <span id="upload-icon"
                                                    class="d-flex align-items-center justify-content-center mb-1">
                                                    <i class="isax isax-image5 text-secondary fs-24 text-center"></i>
                                                </span>
                                                <p class="fw-medium mb-1">Upload Image</p>
                                                <span class="d-block mb-2">JPEG, PNG, GIF, and WebP formats, up to 2
                                                    MB</span>
                                                <!-- JS will insert #preview-img here -->
                                            </div>
                                        </div>
                                        <hr class="mt-4 mb-4">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-block-link">
                                                    <label class="form-label">Course Introduction Video
                                                        <span class="text-danger ms-1">*</span>
                                                    </label>
                                                    <select class="select form-control" id="video-type">
                                                        <option value="url">External URL</option>
                                                        <option value="youtube">Youtube</option>
                                                        <option value="vimeo">Vimeo</option>
                                                        <option value="upload">Upload File</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-block-link">
                                                    <label class="form-label">&nbsp;</label>
                                                    <div id="video-input-container">
                                                        <input type="text" class="form-control" name="intro_video"
                                                            placeholder="External URL Link" id="video-input">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-form-btn widget-next-btn submit-btn">
                                    <div class="btn-left">
                                        <a href="javascript:void(0);"
                                            class="btn btn-light main-btn prev_btns d-flex align-items-center"><i
                                                class="isax isax-arrow-left-2 me-1"></i>Prev</a>
                                    </div>
                                    <div class="btn-left">
                                        <a href="javascript:void(0);"
                                            class="btn btn-secondary main-btn next_btns d-flex align-items-center">Next
                                            <i class="isax isax-arrow-right-3 ms-1"></i></a>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-inner wizard-form-card">
                                <div class="title d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Curriculum</h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addTopicModal">
                                        <i class="isax isax-add-circle5 me-1"></i>Add New Topic
                                    </button>
                                </div>

                                <div class="accordion" id="curriculumAccordion"></div>

                                <div class="add-form-btn widget-next-btn submit-btn mt-3">
                                    <div class="btn-left">
                                        <a href="javascript:void(0);" class="btn btn-light main-btn prev_btns">
                                            <i class="isax isax-arrow-left-2 me-1"></i>Prev
                                        </a>
                                    </div>
                                    <div class="btn-left">
                                        <a href="javascript:void(0);" class="btn btn-secondary main-btn next_btns">
                                            Next <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-inner wizard-form-card">
                                <div class="title">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-9">
                                            <h5 class="mb-0">FAQ’s</h5>
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <a href="javascript:void(0);"
                                                class="btn add-edit-btn d-inline-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#addFaqModal">
                                                <i class="isax isax-add-circle5 me-1"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-3 border-bottom mb-3">
                                    <div class="accordions-items-seperate" id="faqAccordion">
                                        <!-- Add more FAQ items here -->
                                    </div>
                                </div>

                                <div class="input-block">
                                    <label class="form-label">Message to a reviewer</label>
                                    <textarea class="form-control"></textarea>
                                </div>

                                <div class="add-form-btn widget-next-btn submit-btn">
                                    <div class="btn-left">
                                        <a href="javascript:void(0);" class="btn btn-light main-btn prev_btns"><i
                                                class="isax isax-arrow-left-2 me-1"></i>Prev</a>
                                    </div>
                                    <div class="btn-left">
                                        <a href="javascript:void(0);"
                                            class="btn btn-secondary main-btn next_btns">Next <i
                                                class="isax isax-arrow-right-3 ms-1"></i></a>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-inner wizard-form-card">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addQuestionModal">
                                        Add Question
                                    </button>
                                </div>

                                <div id="questionsContainer">
                                    <!-- Dynamically added questions will appear here -->
                                </div>

                                <div class="add-form-btn widget-next-btn submit-btn mt-3">
                                    <div class="btn-left">
                                        <a href="javascript:void(0);" class="btn btn-light main-btn prev_btns">
                                            <i class="isax isax-arrow-left-2 me-1"></i>Prev
                                        </a>
                                    </div>
                                    <div class="btn-left">
                                        {{-- <a href="javascript:void(0);" class="btn btn-secondary main-btn next_btns"
                                            data-bs-toggle="modal" data-bs-target="#success">
                                            Submit Course
                                        </a> --}}
                                        <button type="submit" class="btn btn-secondary main-btn next_btns">Submit
                                            Course</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Course watch -->
</form>


<!-- Add Topic Modal -->
<div class="modal fade" id="addTopicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addTopicForm">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="topicTitle" placeholder="Topic Title" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Topic</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Lesson Modal -->
<div class="modal fade" id="addLessonModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addLessonForm">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Lesson</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label> Add Lesson</label>
                    <input type="text" class="form-control mb-3" id="lessonTitle" required>
                    <label>Video Link</label>
                    <input type="text" class="form-control mb-3" id="lessonVideo">
                    <label>Course Description</label>
                    <textarea class="form-control" id="lessonDescription"></textarea>

                    <input type="hidden" id="lessonTopicId">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Add Lesson</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Add FAQ Modal -->
<div class="modal fade" id="addFaqModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addFaqForm">
                <div class="modal-header">
                    <h5 class="modal-title">Add New FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" id="faqQuestion" placeholder="Question"
                        required>
                    <textarea class="form-control" id="faqAnswer" placeholder="Answer" rows="4" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- success -->
<div class="modal fade modal-default" id="success">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <div class="text-success h1 mb-2">
                        <i class="isax isax-tick-circle5"></i>
                    </div>
                    <h5 class="mb-2">Congratulations! Course Submitted</h5>
                    <p class="mb-3">You’ve successfully Submitted the Course & its under the review, Once the course
                        is reviewed by the reviewer it will go live.</p>
                    <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                        <a href="instructor-dashboard.html" class="btn btn-secondary"><i
                                class="isax isax-arrow-left-2 me-1"></i>Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /success -->

<!-- Modal for Adding Question and Choices -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="addQuestionForm" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuestionModalLabel">Add New Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="questionText" class="form-label">Question</label>
                    <input type="text" id="questionText" class="form-control" placeholder="Enter question"
                        required>
                </div>

                <div id="choicesContainer">
                    <label class="form-label">Choices</label>
                    <div class="input-group mb-2 choice-item">
                        <input type="text" class="form-control choice-input" placeholder="Choice 1" required>
                        <button class="btn btn-danger btn-remove-choice" type="button"
                            title="Remove choice">&times;</button>
                    </div>
                </div>

                <button type="button" id="addChoiceBtn" class="btn btn-secondary btn-sm">Add Choice</button>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save Question</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const videoTypeSelect = document.getElementById("video-type");
        const videoInputContainer = document.getElementById("video-input-container");

        videoTypeSelect.addEventListener("change", function() {
            const selected = this.value;
            let newInput;

            if (selected === "upload") {
                // Create file input
                newInput = document.createElement("input");
                newInput.type = "file";
                newInput.className = "form-control";
                newInput.name = "video_file";
                newInput.accept = "video/mp4, video/webm";
                newInput.style.display = "block"; // <-- Fix visibility
            } else {
                // Create text input
                newInput = document.createElement("input");
                newInput.type = "text";
                newInput.className = "form-control";
                newInput.name = "video_url"; // Use for backend if needed
                newInput.placeholder = "External URL Link";
            }

            // Clear and insert new input
            videoInputContainer.innerHTML = "";
            videoInputContainer.appendChild(newInput);
        });
    });

    let topicCount = 0;

    document.getElementById('addTopicForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const title = document.getElementById('topicTitle').value;
        const topId = topicCount++;
        const topicId = `topic-${topId}`;

        const html = `
    <div class="accordion-item" id="${topicId}">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${topicId}">
                <i class="isax isax-menu-15 me-2"></i>${title}
                <input type="text" name="topics[${topId}][title]" value="${title}" style="display:none">
            </button>
        </h2>
        <div id="collapse-${topicId}" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
            <div class="accordion-body">
                <div class="lesson-list"></div>
                <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="openLessonModal('${topicId}')">
                    <i class="isax isax-add-circle5 me-1"></i>Add Lesson
                </button>
            </div>
        </div>
    </div>`;
        document.getElementById('curriculumAccordion').insertAdjacentHTML('beforeend', html);
        document.getElementById('topicTitle').value = '';
        bootstrap.Modal.getInstance(document.getElementById('addTopicModal')).hide();
    });

    function openLessonModal(topicId) {
        document.getElementById('lessonTopicId').value = topicId;
        const modal = new bootstrap.Modal(document.getElementById('addLessonModal'));
        modal.show();
    }

    document.getElementById('addLessonForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const lessonTitle = document.getElementById('lessonTitle').value;
        const lessonVideo = document.getElementById('lessonVideo').value;
        const lessonDescription = document.getElementById('lessonDescription').value;
        const topicId = document.getElementById('lessonTopicId').value;
        const lesId = topicId.match(/\d+/)[0];
        const lessonHTML = `
    <div class="d-flex justify-content-between align-items-center bg-white p-2 border rounded-3 mb-2">
        <div class="d-flex align-items-center">
            <i class="isax isax-play-circle5 text-success fs-24 me-1"></i>
            <span class="fw-medium text-gray-5">${lessonTitle}</span>
            <input type="text" name="topics[${lesId}][lessons][]" value="${lessonTitle}" style="display:none">
            <input type="text" name="topics[${lesId}][lessonVideo][]" value="${lessonVideo}" style="display:none">
            <input type="text" name="topics[${lesId}][lessonDescription][]" value="${lessonDescription}" style="display:none">
        </div>
        <div class="d-flex align-items-center">
            <a href="javascript:void(0);" class="edit-btn1"><i class="isax isax-edit-25 fs-16"></i></a>
            <a href="javascript:void(0);" class="delete-btn1"><i class="isax isax-trash fs-16"></i></a>
        </div>
    </div>`;
        document.querySelector(`#${topicId} .lesson-list`).insertAdjacentHTML('beforeend', lessonHTML);
        document.getElementById('lessonTitle').value = '';
        bootstrap.Modal.getInstance(document.getElementById('addLessonModal')).hide();
    });

    document.getElementById('curriculumAccordion').addEventListener('click', function(e) {
        if (e.target.closest('.delete-btn1')) {
            e.target.closest('.d-flex.justify-content-between').remove();
        }
        // You can also add edit functionality here later if you want
    });

    let faqCount = 1; // Keep track of FAQ IDs

    document.getElementById('addFaqForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const question = document.getElementById('faqQuestion').value.trim();
        const answer = document.getElementById('faqAnswer').value.trim();
        if (!question || !answer) {
            alert('Please fill in both Question and Answer.');
            return;
        }

        faqCount++;

        // Create unique IDs for accordion collapse and heading
        const faqId = 'FAQ' + faqCount;
        const headingId = 'heading' + faqId;
        const collapseId = 'collapse' + faqId;

        // Build new FAQ accordion item
        const newFaqItem = document.createElement('div');
        newFaqItem.className = 'accordion-item';
        newFaqItem.innerHTML = `
      <h2 class="accordion-header" id="${headingId}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#${collapseId}" aria-expanded="false" aria-controls="${collapseId}">
          <span class="d-flex align-items-center text-gray-9 mb-0">
            <i class="isax isax-menu-15 me-2"></i>
            ${question}
          </span>
        </button>
      </h2>
      <div id="${collapseId}" class="accordion-collapse collapse" aria-labelledby="${headingId}" data-bs-parent="#faqAccordion">
        <div class="accordion-body d-flex justify-content-between align-items-start bg-white p-3 border rounded-3 mb-3">
          <div>
            <input type="text" name="question[]" value="${question}">
            <input type="text" name="answer[]" value="${answer}">
            <p class="text-gray-5 mb-0">${answer}</p>
          </div>
          <div class="d-flex flex-column align-items-center ms-3">
            <a href="javascript:void(0);" class="edit-btn1 mb-2"><i class="isax isax-edit-25 fs-16"></i></a>
            <a href="javascript:void(0);" class="delete-btn1"><i class="isax isax-trash fs-16"></i></a>
          </div>
        </div>
      </div>
    `;

        document.getElementById('faqAccordion').appendChild(newFaqItem);

        // Close modal and reset form
        var modal = bootstrap.Modal.getInstance(document.getElementById('addFaqModal'));
        modal.hide();
        this.reset();
    });

    // Handle delete FAQ
    document.getElementById('faqAccordion').addEventListener('click', function(e) {
        if (e.target.closest('.delete-btn1')) {
            e.target.closest('.accordion-item').remove();
        }
    });
</script>

<script>
    (() => {
        const addQuestionForm = document.getElementById('addQuestionForm');
        const questionsContainer = document.getElementById('questionsContainer');
        const choicesContainer = document.getElementById('choicesContainer');
        const addChoiceBtn = document.getElementById('addChoiceBtn');

        let choiceCount = 1;
        let questionIndex = 0;

        addChoiceBtn.addEventListener('click', () => {
            choiceCount++;
            const choiceDiv = document.createElement('div');
            choiceDiv.className = 'input-group mb-2 choice-item';
            choiceDiv.innerHTML = `
        <input type="text" class="form-control choice-input" placeholder="Choice ${choiceCount}" required>
        <button class="btn btn-danger btn-remove-choice" type="button" title="Remove choice">&times;</button>
      `;
            choicesContainer.appendChild(choiceDiv);
        });

        choicesContainer.addEventListener('click', (e) => {
            if (e.target.classList.contains('btn-remove-choice')) {
                const parent = e.target.closest('.choice-item');
                parent.remove();
            }
        });

        addQuestionForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const question = document.getElementById('questionText').value.trim();
            if (!question) {
                alert('Please enter a question');
                return;
            }

            const choiceInputs = [...choicesContainer.querySelectorAll('.choice-input')];
            const choices = choiceInputs.map(input => input.value.trim()).filter(c => c !== '');

            if (choices.length < 1) {
                alert('Please add at least one choice');
                return;
            }

            const questionBlock = document.createElement('div');
            questionBlock.className = 'mb-4 position-relative border rounded p-3';

            questionBlock.innerHTML = `
                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 btn-delete-question" title="Delete question">&times;</button>
                <div class="input-block mb-2">
                    <label class="form-label">${escapeHtml(question)}</label>
                    <input type="text" name="questions[${questionIndex}][question]" value="${escapeHtml(question)}" class="form-control" hidden readonly>
                </div>
                <div class="d-block align-items-center">
                    ${choices.map((choice, idx) => {
                    const choiceId = `question_${Date.now()}_choice_${idx}`;
                    return `
                        <div class="form-check form-check-md d-flex align-items-center mb-1">
                        <input type="text" name="questions[${questionIndex}][choices][]" value="${escapeHtml(choice)}" class="form-control w-auto me-2">
                        <input class="form-check-input" name="questions[${questionIndex}][correct][]" type="checkbox" value="1" id="${choiceId}">
                        <label class="form-check-label ms-2" for="${choiceId}">Correct</label>
                        </div>
                    `;
                    }).join('')}
                </div>
            `;
            questionIndex++;
            questionsContainer.appendChild(questionBlock);

            addQuestionForm.reset();
            choicesContainer.innerHTML = `
        <label class="form-label">Choices</label>
        <div class="input-group mb-2 choice-item">
          <input type="text" class="form-control choice-input" placeholder="Choice 1" required>
          <button class="btn btn-danger btn-remove-choice" type="button" title="Remove choice">&times;</button>
        </div>
      `;
            choiceCount = 1;

            const modal = bootstrap.Modal.getInstance(document.getElementById('addQuestionModal'));
            modal.hide();
        });

        questionsContainer.addEventListener('click', (e) => {
            if (e.target.classList.contains('btn-delete-question')) {
                if (confirm('Are you sure you want to delete this question?')) {
                    const questionBlock = e.target.closest('div.mb-4');
                    if (questionBlock) questionBlock.remove();
                }
            }
        });

        function escapeHtml(text) {
            return text.replace(/[&<>"']/g, m => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            } [m]));
        }
    })();
</script>
@include('layouts.footer')
