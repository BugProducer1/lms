@extends('layouts.studentapp')

@section('title', 'Settings')

@section('content')
    <div class="col-lg-9">
        <div class="mb-3">
            <h5>Settings</h5>
        </div>
        <ul class="settings-nav d-flex align-items-center flex-wrap border bg-light-900 rounded">
            <li><a href="{{ route('student.settings') }}" class="active">Edit Profile</a></li>
            <li><a href="#">Security</a></li>
        </ul>
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('student.updateProfile') }}" method="POST">
                    @csrf
                    <input type="hidden" name="profile_image_base64" id="profile_image_base64">

                    <div class="profile-upload-group">
                        <div class="d-flex align-items-center">
                            <div class="avatar flex-shrink-0 avatar-xxxl avatar-rounded border me-3">
                                <img id="preview-image"
                                    src="{{ $user->userPhoto ? $user->userPhoto : asset('img/user/user-02.jpg') }}"
                                    alt="Profile" class="img-fluid">
                            </div>
                            <div class="profile-upload-head">
                                <h6>Profile Photo</h6>
                                <p class="fs-14 mb-0">PNG or JPG no bigger than 800px width and height</p>
                                <div class="d-flex align-items-center mt-3">
                                    <input type="file" id="image-input" accept="image/*" hidden>
                                    <button type="button" class="btn bg-gray-100 btn-sm rounded-pill me-2"
                                        id="upload-btn">Upload</button>
                                    <button type="button" class="btn btn-danger btn-sm rounded-pill"
                                        id="delete-btn">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="edit-profile-info mb-3">
                        <h5 class="mb-1">Personal Details</h5>
                        <p>Edit your personal information</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" value="{{ $user->name }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" value="{{ $user->phone_number }}"
                                class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select name="gender" class="form-control">
                                <option value="">Select</option>
                                <option value="M" {{ $user->gender == 'M' ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ $user->gender == 'F' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 d-none">
                            <label class="form-label">DOB <span class="text-danger">*</span></label>
                            <div class="input-icon-end position-relative">
                                <input type="text" name="dob" value="{{ $user->dob }}" class="form-control"
                                    placeholder="yyyy-mm-dd">
                                <span class="input-icon-addon"><i class="isax isax-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label class="form-label">Student ID <span class="text-danger">*</span></label>
                            <input type="text" name="userID" value="{{ $user->userID }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3 d-none">
                            <label class="form-label">Year Level <span class="text-danger">*</span></label>
                            <select name="" class="form-control" id="">
                                <option value="">1st Year</option>
                                <option value="">2nd Year</option>
                                <option value="">3rd Year</option>
                                <option value="">4th Year</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3  d-none">
                            <label class="form-label">Department <span class="text-danger">*</span></label>
                            <select name="" class="form-control" id="">
                                <option value="">BSIT</option>
                                <option value="">BSED</option>
                                <option value="">CRIM</option>
                                <option value="">BSHM</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            @if ($user && $user->completed_profile == 1)
                                @php
                                    $submitText = 'Update Profile';
                                @endphp
                            @else
                                @php
                                    $submitText = 'Confirm';
                                @endphp
                            @endif
                            <button class="btn btn-secondary rounded-pill" type="submit">{{ $submitText }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const imageInput = document.getElementById("image-input");
        const previewImage = document.getElementById("preview-image");
        const base64Input = document.getElementById("profile_image_base64");
        const uploadBtn = document.getElementById("upload-btn");
        const deleteBtn = document.getElementById("delete-btn");

        uploadBtn.addEventListener("click", function(e) {
            e.preventDefault();
            imageInput.click();
        });

        imageInput.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    base64Input.value = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        deleteBtn.addEventListener("click", function(e) {
            e.preventDefault();
            previewImage.src = "{{ asset('img/user/user-02.jpg') }}";
            imageInput.value = '';
            base64Input.value = '';
        });
    });
</script>
