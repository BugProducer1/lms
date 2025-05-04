<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registration</title>

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
                            <div class="login-carousel-section mb-3">
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
                    {{-- registration --}}
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="w-100">
                                <h1 class="fs-32 fw-bold topic">Sign up</h1>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('register') }}" method="POST" class="mb-3 pb-3">
                                    @csrf
                                    <div class="mb-3 position-relative row">
                                        <div class="col-md-6">
                                            <label class="form-label">First Name<span
                                                    class="text-danger ms-1">*</span></label>
                                            <div class="position-relative">
                                                <input type="text" name="name"
                                                    class="form-control form-control-lg">
                                                <span><i class="isax isax-user input-icon text-gray-7 fs-14"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name<span
                                                    class="text-danger ms-1">*</span></label>
                                            <div class="position-relative">
                                                <input type="text" name="last_name"
                                                    class="form-control form-control-lg">
                                                <span><i class="isax isax-user input-icon text-gray-7 fs-14"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative row">
                                        <div class="col-md-6">
                                            <label class="form-label">Email<span
                                                    class="text-danger ms-1">*</span></label>
                                            <div class="position-relative">
                                                <input type="email" name="email"
                                                    class="form-control form-control-lg">
                                                <span><i class="isax isax-sms input-icon text-gray-7 fs-14"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Account Type<span
                                                    class="text-danger ms-1">*</span></label>
                                            <div class="position-relative">
                                                <select name="role" id=""
                                                    class="form-control form-control-lg">
                                                    <option value="Student">Student</option>
                                                    <option value="Instructor">Instructor</option>
                                                </select>
                                                <span><i class="isax isax-sms input-icon text-gray-7 fs-14"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label class="form-label">New Password <span class="text-danger">
                                                *</span></label>
                                        <div class="position-relative" id="passwordInput">
                                            <input type="password" name="password"
                                                class="pass-inputs form-control form-control-lg">
                                            <span class="isax toggle-passwords isax-eye-slash text-gray-7 fs-14"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Confirm Password <span class="text-danger">
                                                *</span></label>
                                        <div class="position-relative">
                                            <input type="password" name="password_confirmation"
                                                class="pass-inputa form-control form-control-lg">
                                            <span
                                                class="isax toggle-passworda isax-eye-slash text-gray-7 fs-14"></span>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-secondary btn-lg" type="submit">Sign Up <i
                                                class="isax isax-arrow-right-3 ms-1"></i></button>
                                    </div>
                                </form>
                                <div class="fs-14 fw-normal d-flex align-items-center justify-content-center">
                                    Already have an account? <a href="{{ route('login') }}" class="link-2 ms-1">
                                        Login</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /Login -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
