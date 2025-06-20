@extends('layouts.studentapp')

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
                            <span>Eugene</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Last Name</h6>
                            <span>Andre</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Registration Date</h6>
                            <span>16 Jan 2024, 11:15 AM</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>User Name</h6>
                            <span>instructordemo</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Phone Number</h6>
                            <span>89104-71829</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Email</h6>
                            <span><a href="https://dreamslms.dreamstechnologies.com/cdn-cgi/l/email-protection"
                                    class="__cf_email__"
                                    data-cfemail="93fafde0e7e1e6f0e7fce1f7f6fefcd3f6ebf2fee3fff6bdf0fcfe">[email&#160;protected]</a></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Gender</h6>
                            <span>Male</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>DOB</h6>
                            <span>16 Jan 2020</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Age</h6>
                            <span>24</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <h6>Bio</h6>
                            <span>I am a web developer with a vast array of knowledge in
                                many different front end and back end languages,
                                responsive frameworks, databases, and best code practices.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="fs-18 pb-3 border-bottom mb-3">Education</h5>
                <div class="education-flow">
                    <div class="ps-4 pb-3 timeline-flow">
                        <div>
                            <h6 class="mb-1">BCA - Bachelor of Computer Applications</h6>
                            <p>International University - (2004 - 2010)</p>
                        </div>
                    </div>
                    <div class="ps-4 pb-3 timeline-flow">
                        <div>
                            <h6 class="mb-1">MCA - Master of Computer Application</h6>
                            <p>International University - (2010 - 2012)</p>
                        </div>
                    </div>
                    <div class="ps-4 pb-0 timeline-flow">
                        <div>
                            <h6 class="mb-1">Design Communication Visual</h6>
                            <p>International University - (2012-2015)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-0">
            <div class="card-body">
                <h5 class="fs-18 pb-3 border-bottom mb-3">Experience</h5>
                <div class="d-flex align-items-center mb-4">
                    <span class="bg-light border avatar avatar-lg text-gray-9 flex-shrink-0 me-3"><i
                            class="isax isax-briefcase fw-bold"></i></span>
                    <div>
                        <h6 class="mb-1">Web Design & Development Team Leader</h6>
                        <p>Creative Agency - (2013 - 2016)</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="bg-light border avatar avatar-lg text-gray-9 flex-shrink-0 me-3"><i
                            class="isax isax-briefcase fw-bold"></i></span>
                    <div>
                        <h6 class="mb-1">Project Manager</h6>
                        <p>CJobcy Technology Pvt.Ltd - (Present)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
