@extends('layouts.studentapp')

@section('title', 'Change Password')

@section('content')
    <div class="col-lg-9">
        <div class="mb-3">
            <h5>Settings</h5>
        </div>

        <ul class="settings-nav d-flex align-items-center flex-wrap border bg-light-900 rounded">
            <li><a href="{{ route('student.settings') }}">Edit Profile</a></li>
            <li><a href="{{ route('student.changepassword') }}" class="active">Security</a></li>
            <li><a href="student-social-profile.html">Social Profiles</a></li>
            <li><a href="student-linked-accounts.html">Linked Accounts</a></li>
        </ul>
        <div class="card mb-0">
            <div class="card-body">
                <div class="border-bottom mb-4 pb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <h5 class="mb-1 fs-18">Change Password</h5>
                                <p>Can't remember your current password? <a href="#"
                                        class="text-decoration-underline">Reset your password via email</a></p>
                            </div>
                            <form
                                action="https://dreamslms.dreamstechnologies.com/html/template/student-change-password.html">
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Current Password <span class="text-danger"> *</span></label>
                                    <div class="position-relative">
                                        <input type="password" class="pass-input form-control">
                                        <span class="isax toggle-password isax-eye-slash text-gray-7 fs-14"></span>
                                    </div>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">New Password <span class="text-danger"> *</span></label>
                                    <div class="position-relative" id="passwordInput">
                                        <input type="password" class="pass-inputs form-control">
                                        <span class="isax toggle-passwords isax-eye-slash text-gray-7 fs-14"></span>
                                    </div>
                                    <div class="password-strength" id="passwordStrength">
                                        <span id="poor"></span>
                                        <span id="weak"></span>
                                        <span id="strong"></span>
                                        <span id="heavy"></span>
                                    </div>
                                    <div class="mt-2 fs-14" id="passwordInfo">Use 8 or more characters with a mix of
                                        letters, numbers & symbols.</div>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Confirm Password <span class="text-danger"> *</span></label>
                                    <div class="position-relative">
                                        <input type="password" class="pass-inputa form-control">
                                        <span class="isax toggle-passworda isax-eye-slash text-gray-7 fs-14"></span>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-secondary" type="submit">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <h5 class="mb-1 fs-18">Change Email</h5>
                            <p>Your current email address is <a href="#" class="fw-semibold"><span
                                        class="__cf_email__"
                                        data-cfemail="53213a303b32213713362b323e233f367d303c3e">[email&#160;protected]</span></a>
                            </p>
                        </div>
                        <form action="https://dreamslms.dreamstechnologies.com/html/template/student-change-password.html">
                            <div class="mb-3">
                                <label class="form-label">New Email Address <span class="text-danger"> *</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div>
                                <button class="btn btn-secondary" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
