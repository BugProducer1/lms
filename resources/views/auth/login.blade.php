<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Dreams LMS is a powerful Learning Management System template designed for educators, training institutions, and businesses. Manage courses, track student progress, conduct virtual classes, and enhance e-learning experiences with an intuitive and feature-rich platform.">
    <meta name="keywords"
        content="LMS template, Learning Management System, e-learning software, online course platform, student management, education portal, virtual classroom, training management system, course tracking, online education">
    <meta name="author" content="Dreams Technologies">
    <meta name="robots" content="index, follow">

    <title>Dreams LMS | Advanced Learning Management System Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}">

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

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="login-content">
            <div class="row">
                <!-- Login Banner -->
                <div class="col-md-6 login-bg d-none d-lg-flex">
                    <div class="login-carousel">
                        <div>
                            <div class="mb-3">
                                <div class="login-banner">
                                    <img src="{{ asset('img/logo.jfif') }}" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h3 class="mb-2">Welcome to <br> Virtual<span class="text-secondary"> Study</span>
                                        Buddy.</h3>
                                    <p>Platform designed to help organizations, educators, and learners manage, deliver,
                                        and track learning and training activities.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Login Banner -->

                <div class="col-md-6 login-wrap-bg">
                    <!-- Login -->
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="w-100">
                                <div class="d-flex align-items-center justify-content-between login-header">
                                    <a href="{{ url('/') }}" class="link-1">Back to Home</a>
                                </div>
                                <h1 class="fs-32 fw-bold topic">Sign into Your Account</h1>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('login') }}" method="POST" class="mb-3 pb-3">
                                    @csrf
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Email<span class="text-danger ms-1">*</span></label>
                                        <div class="position-relative">
                                            <input type="email" name="email" class="form-control form-control-lg"
                                                required>
                                            <span><i class="isax isax-sms input-icon text-gray-7 fs-14"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Password <span
                                                class="text-danger ms-1">*</span></label>
                                        <div class="position-relative" id="passwordInput">
                                            <input type="password" name="password"
                                                class="pass-inputs form-control form-control-lg" required>
                                            <span class="isax toggle-passwords isax-eye-slash fs-14"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="remember-me d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault" name="remember">
                                            <label class="form-check-label ms-2" for="flexCheckDefault">
                                                Remember Me
                                            </label>
                                        </div>
                                        <div class="">
                                            <a href="{{ route('password.request') }}" class="link-2">
                                                Forgot Password ?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-secondary btn-lg" type="submit">Login <i
                                                class="isax isax-arrow-right-3 ms-1"></i></button>
                                    </div>
                                </form>

                                <div class="fs-14 fw-normal d-flex align-items-center justify-content-center">
                                    Don't you have an account?<a href="{{ route('register') }}" class="link-2 ms-1">
                                        Sign up</a>
                                </div>

                                <!-- /Login -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

    <!-- Slick Slider -->
    <script src="{{ asset('plugins/slick/slick.js') }}" type="text/javascript"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

</body>

</html>
