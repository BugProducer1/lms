@extends('layouts.app')

@section('title', 'Quiz List')

@section('content')
    <div class="col-lg-9">
        <div class="page-title d-flex align-items-center justify-content-between">
            <h5 class="fw-bold">Quiz</h5>
            {{-- <div>
                <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add_quiz">Add Quiz</a>
            </div> --}}
        </div>
        @foreach ($courses as $course)
            <div class="border rounded-2 p-3 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div>
                            <h6 class="mb-2">
                                <a href="{{ route('instructor.quizresult', ['courseId' => $course->id]) }}">
                                    {{ $course->Title }}
                                </a>
                            </h6>
                            <div class="question-info d-flex align-items-center">
                                <p class="d-flex align-items-center fs-14 me-2 pe-2 border-end mb-0">
                                    <i class="isax isax-message-question5 text-primary-soft me-2"></i>
                                    {{ $course->questions_count }} Questions
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-end mt-2 mt-md-0">
                            <a href="{{ route('instructor.quizresult', ['courseId' => $course->id]) }}">
                                View Results
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Add Question -->
    <div class="modal fade" id="add_quiz">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="fw-bold">Add New Quiz</h5>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="isax isax-close-circle5"></i>
                    </button>
                </div>
                <form action="https://dreamslms.dreamstechnologies.com/html/template/instructor-quiz-questions.html">
                    <div class="modal-body pb-0">
                        <div class="mb-3">
                            <label class="form-label">Course <span class="text-danger"> *</span></label>
                            <select class="select form-control">
                                <option>Select</option>
                                <option>Information About UI/UX Design Degree</option>
                                <option>Learn JavaScript and Express to become a Expert</option>
                                <option>Introduction to Python Programming</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quiz Title <span class="text-danger"> *</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No of Questions <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Total Marks <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Pass Mark <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Duration <span class="text-danger"> *</span></label>
                                    <div class="input-icon-end position-relative">
                                        <input type="text" class="form-control timepicker" placeholder="dd/mm/yyyy"
                                            value="02-05-2024">
                                        <span class="input-icon-addon">
                                            <i class="isax isax-clock"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn bg-gray-100 rounded-pill me-2" type="button"
                            data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-secondary rounded-pill" type="submit">Add Quiz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Question -->

    {{-- <!-- Edit Question -->
    <div class="modal fade" id="edit_quiz">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="fw-bold">Edit Quiz</h5>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="isax isax-close-circle5"></i>
                    </button>
                </div>
                <form action="https://dreamslms.dreamstechnologies.com/html/template/instructor-quiz-questions.html">
                    <div class="modal-body pb-0">
                        <div class="mb-3">
                            <label class="form-label">Course <span class="text-danger"> *</span></label>
                            <select class="select form-control">
                                <option>Select</option>
                                <option selected>Information About UI/UX Design Degree</option>
                                <option>Learn JavaScript and Express to become a Expert</option>
                                <option>Introduction to Python Programming</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quiz Title <span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="Information About UI/UX Design Degree">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No of Questions <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" value="10">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Total Marks <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" value="100">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Pass Mark <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" value="50">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Duration <span class="text-danger"> *</span></label>
                                    <div class="input-icon-end position-relative">
                                        <input type="text" class="form-control timepicker" placeholder="dd/mm/yyyy"
                                            value="02-05-2024">
                                        <span class="input-icon-addon">
                                            <i class="isax isax-clock"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn bg-gray-100 rounded-pill me-2" type="button"
                            data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-secondary rounded-pill" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Question -->

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center custom-modal-body">
                    <span class="avatar avatar-lg bg-danger-transparent rounded-circle mb-2">
                        <i class="isax isax-trash fs-24 text-danger"></i>
                    </span>
                    <div>
                        <h4 class="mb-2">Delete Quiz</h4>
                        <p class="mb-3">Are you sure you want to delete Quiz?</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="javascript:void(0);" class="btn bg-gray-100 rounded-pill me-2"
                                data-bs-dismiss="modal">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-secondary rounded-pill">Yes, Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal --> --}}
@endsection
