@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="col-lg-9">
        <div class="page-title d-flex align-items-center justify-content-between">
            <h5 class="fw-bold">My Profile</h5>
            <a href="#" class="edit-profile-icon"><i class="isax isax-edit-2"></i></a>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="fs-18 pb-3 border-bottom mb-3">Basic Information</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>First Name</h6>
                            <span>{{ $studentList->name }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Last Name</h6>
                            <span>{{ $studentList->last_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Registration Date</h6>
                            <span>{{ $studentList->created_at }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>User Name</h6>
                            <span>N/A</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Phone Number</h6>
                            <span>{{ $studentList->phone_number }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Email</h6>
                            <span>{{ $studentList->email }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Gender</h6>
                            <span>{{ $studentList->gender }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>DOB</h6>
                            <span>{{ $studentList->dob }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="fs-18 pb-3 border-bottom mb-3">Generated Course</h5>
                <div class="education-flow">
                    <div class="ps-4 pb-3 timeline-flow">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Course Name</th>
                                    <th>Status</th>
                                    <th>Date Generated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courseList as $row)
                                    <tr>
                                        <td>{{ $row->Title }}</td>
                                        <td></td>
                                        <td>{{ $row->created_at }}</td>
                                        <td><a href="instructorprofile/{{ $row->id }}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach;
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
