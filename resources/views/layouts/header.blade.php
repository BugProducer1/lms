<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}">

    <!-- Theme Settings Js -->
    <script src="{{asset('js/theme-script.js')}}" type="94bd056a916da8ee2507ef31-text/javascript"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick-theme.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/feather/feather.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/tabler-icons/tabler-icons.css') }}">

    <!-- Iconsax CSS -->
    <link rel="stylesheet" href="{{ asset('css/iconsax.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Summernote JS -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-lite.min.css') }}">
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper" style="min-height: 880px">

        <!-- Header -->
        {{-- <header class="header-two">
            <div class="container">
                <div class="header-nav">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                            <span class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                        <div class="navbar-logo">
                            <a class="logo-white header-logo" href="index-2.html">
                                <img src="assets/img/logo.svg" class="logo" alt="Logo">
                            </a>
                            <a class="logo-dark header-logo" href="index-2.html">
                                <img src="assets/img/logo-white.svg" class="logo" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="index-2.html" class="menu-logo">
                                <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li class="has-submenu megamenu">
                                <a href="#">Home
                            </li>
                        </ul>
                    </div>
                    <div class="header-btn d-flex align-items-center">
                        <div class="dropdown profile-dropdown">
                            <a href="javascript:void(0);" class="d-flex align-items-center" data-bs-toggle="dropdown">
                                <span class="avatar">
                                    <img src="assets/img/user/user-01.jpg" alt="Img"
                                        class="img-fluid rounded-circle">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="profile-header d-flex align-items-center">
                                    <div class="avatar">
                                        <img src="assets/img/user/user-01.jpg" alt="Img"
                                            class="img-fluid rounded-circle">
                                    </div>
                                    <div>
                                        <h6>Eugene Andre</h6>
                                        <p><a href="https://dreamslms.dreamstechnologies.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="e28b8c919690978196879086878f8da2879a838f928e87cc818d8f">[email&#160;protected]</a>
                                        </p>
                                    </div>
                                </div>
                                <ul class="profile-body">
                                    <li>
                                        <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
                                            href="instructor-profile.html"><i
                                                class="isax isax-security-user me-2"></i>My
                                            Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
                                            href="instructor-course.html"><i
                                                class="isax isax-teacher me-2"></i>Courses</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
                                            href="instructor-message.html"><i
                                                class="isax isax-messages-3 me-2"></i>Messages<span
                                                class="message-count">2</span></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
                                            href="instructor-settings.html"><i
                                                class="isax isax-setting-2 me-2"></i>Settings</a>
                                    </li>
                                </ul>
                                <div class="profile-footer">
                                    <a href="index-2.html"
                                        class="btn btn-secondary d-inline-flex align-items-center justify-content-center w-100"><i
                                            class="isax isax-logout me-2"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header> --}}
