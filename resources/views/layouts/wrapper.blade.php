<!-- /Header -->

<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title mb-2">@yield('title')</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<div class="content">
    <div class="container">
        <div class="instructor-profile">
            <div class="instructor-profile-bg">
                <img src="assets/img/bg/card-bg-01.png" class="instructor-profile-bg-1" alt="">
            </div>
            <div class="row align-items-center row-gap-3">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <span
                            class="avatar flex-shrink-0 avatar-xxl avatar-rounded me-3 border border-white border-3 position-relative">
                            <img src="assets/img/user/user-01.jpg" alt="img">
                            <span class="verify-tick"><i class="isax isax-verify5"></i></span>
                        </span>
                        <div>
                            <h5 class="mb-1 text-white d-inline-flex align-items-center">Eugene Andre<a
                                    href="instructor-profile.html" class="link-light fs-16 ms-2"><i
                                        class="isax isax-edit-2"></i></a></h5>
                            <p class="text-light">Instructor</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center flex-wrap gap-3 justify-content-md-end">
                        <a href="{{ route('instructor.addcourse') }}" class="btn btn-secondary rounded-pill">Add New
                            Course</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- Sidebar -->
            <div class="col-lg-3 theiaStickySidebar">
                <div class="settings-sidebar mb-lg-0">
                    <div>
                        <h6 class="mb-3">Main Menu</h6>
                        <ul class="mb-3 pb-1">
                            <li>
                                <a href="dashboard"
                                    class="d-inline-flex align-items-center {{ Request::is('dashboard') ? 'active' : '' }}"><i
                                        class="isax isax-grid-35 me-2"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('instructor.profile') }}"
                                    class="d-inline-flex align-items-center {{ Request::is('instructorprofile') ? 'active' : '' }}"><i
                                        class="fa-solid fa-user me-2 "></i>My
                                    Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('instructor.courselist') }}"
                                    class="d-inline-flex align-items-center {{ Request::is('courselist') ? 'active' : '' }}"><i
                                        class="isax isax-teacher5 me-2"></i>Courses</a>
                            </li>
                            <li>
                                <a href="{{ route('instructor.quiz') }}"
                                    class="d-inline-flex align-items-center {{ Request::is('instructorquiz') ? 'active' : '' }}"><i
                                        class="isax isax-award5 me-2"></i>Quiz</a>
                            </li>
                            <li>
                                <a href="{{ route('instructor.quizresult') }}"
                                    class="d-inline-flex align-items-center {{ Request::is('quizresult') ? 'active' : '' }}"><i
                                        class="isax isax-medal-star5 me-2"></i>Quiz Results</a>
                            </li>
                            <li>
                                <a href="instructor-message.html" class="d-inline-flex align-items-center"><i
                                        class="isax isax-messages-35 me-2"></i>Messages</a>
                            </li>
                        </ul>
                        <hr>
                        <h6 class="mb-3">Account Settings</h6>
                        <ul>
                            <li>
                                <a href="instructor-settings.html" class="d-inline-flex align-items-center"><i
                                        class="isax isax-setting-25 me-2"></i>Settings</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link p-0 m-0 align-baseline d-inline-flex align-items-center text-decoration-none">
                                        <i class="isax isax-logout5 me-2"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Sidebar -->
