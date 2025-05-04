@extends('layouts.studentapp')

@section('title', 'Settings')

@section('content')
    <div class="col-lg-9">
        <div class="mb-3">
            <h5>Settings</h5>
        </div>
        <ul class="settings-nav d-flex align-items-center flex-wrap border bg-light-900 rounded">
            <li><a href="{{ route('student.settings') }}" class="active">Edit Profile</a></li>
            <li><a href="{{ route('student.changepassword') }}">Security</a></li>
            <li><a href="student-social-profile.html">Social Profiles</a></li>
            <li><a href="student-linked-accounts.html">Linked Accounts</a></li>
            <li><a href="student-notifications.html">Notifications</a></li>
        </ul>
        <div class="card">
            <div class="card-body">
                <form action="https://dreamslms.dreamstechnologies.com/html/template/student-settings.html">
                    <div class="profile-upload-group">
                        <div class="d-flex align-items-center">
                            <a href="student-profile.html"
                                class="avatar flex-shrink-0 avatar-xxxl avatar-rounded border me-3"><img
                                    src="{{ asset('img/user/user-02.jpg') }}" alt="Img" class="img-fluid"></a>
                            <div class="profile-upload-head">
                                <h6><a href="student-profile.html">Profile Photo</a></h6>
                                <p class="fs-14 mb-0">PNG or JPG no bigger than 800px width and height</p>
                                <div class="new-employee-field">
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="image-upload position-relative mb-0 me-2">
                                            <input type="file">
                                            <a href="#"
                                                class="btn bg-gray-100 btn-sm rounded-pill image-uploads">Upload</a>
                                        </div>
                                        <div class="img-delete">
                                            <a href="#" class="btn btn-secondary btn-sm rounded-pill">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="edit-profile-info mb-3">
                            <h5 class="mb-1">Personal Details</h5>
                            <p>Edit your personal information</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" value="Ronald">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Last Name <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" value="Richard">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">User Name <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" value="studentdemo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" value="90154-91036">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gender <span class="text-danger"> *</span></label>
                                    <select class="select form-control">
                                        <option>Select</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">DOB <span class="text-danger"> *</span></label>
                                    <div class="input-icon-end position-relative">
                                        <input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
                                        <span class="input-icon-addon">
                                            <i class="isax isax-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Bio <span class="text-danger"> *</span></label>
                                    <textarea rows="4" class="form-control">Hello! I'm Ronald Richard. I'm passionate about developing innovative software solutions, analyzing classic literature. I aspire to become a software developer, work as an editor. In my free time, I enjoy coding, reading, hiking etc.</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-secondary rounded-pill" type="submit">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-body">
                <h5 class="fs-18 mb-3">Delete Account</h5>
                <h6 class="mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-3">Refers to the action of permanently removing a user's account and associated data from a
                    system, service and platform.</p>
                <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delete_account">Delete
                    Account</a>
            </div>
        </div>
    </div>
@endsection
