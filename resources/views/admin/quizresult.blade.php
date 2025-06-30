@extends('layouts.app')

@section('title', 'Quiz Result')

@section('content')
    <div class="col-lg-9">
        <h5 class="page-title">Quiz Results</h5>
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center">
                    <div class="quiz-img me-3 mb-2 mb-sm-0">
                        <img src="assets/img/students/quiz.jpg" alt="">
                    </div>
                    <div>
                        <h5 class="mb-2"><a href="#">Information About UI/UX Design Degree</a></h5>
                        <div class="question-info d-flex align-items-center">
                            <p class="d-flex align-items-center fs-14 me-2 pe-2 border-end mb-0"><i
                                    class="isax isax-message-question5 text-primary-soft me-2"></i>25 Questions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card bg-secondary-transparent border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="mb-1 fw-normal text-gray-5">Total Particpants</h6>
                                <span class="fs-20 fw-bold mb-1 d-block text-gray-9">30</span>
                            </div>
                            <div class="icon-box bg-soft-secondary">
                                <img src="assets/img/icon/user-tick.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="table-responsive custom-table">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Student Name</th>
                        <th>Score</th>
                        <th>Attemplts</th>
                        <th>Finish Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="avatar avatar-md avatar-rounded flex-shrink-0 me-2">
                                        <img class="avatar avatar-md avatar-rounded flex-shrink-0 me-2"
                                            src="{{ $result->user->userPhoto }}" alt="User Photo">
                                    </a>
                                    <a href="#" class="fs-14">
                                        {{ $result->user->name }}
                                    </a>
                                </div>
                            </td>
                            <td>{{ $result->score ?? 'N/A' }}</td>
                            <td>{{ $result->attempts ?? '1' }}</td>
                            <td>{{ \Carbon\Carbon::parse($result->finished_at)->format('d M Y, h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /pagination -->
        <div class="row align-items-center mt-4">
            <div class="col-md-2">
                <p class="pagination-text">Page 1 of 2</p>
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
