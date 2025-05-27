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

    <title>StudyBuddy</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}">

    <!-- Theme Settings Js -->
    <script src="{{ asset('js/theme-script.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/swiper/css/swiper-bundle.min.css') }}">

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

    <!-- Aos CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/aos/aos.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/tabler-icons/tabler-icons.css') }}">

    <!-- Iconsax CSS -->
    <link rel="stylesheet" href="{{ asset('css/iconsax.css') }}">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/fancybox/jquery.fancybox.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <header class="header-one">
            <div class="container">
                <div class="header-nav">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                            <span class="bar-icon">
                                <i class="isax isax-menu"></i>
                            </span>
                        </a>
                        <div class="navbar-logo">
                            <a class="logo-white header-logo" href="index-2.html">
                                <img src="{{ asset('img/logo.jfif') }}" class="logo" alt="Logo"
                                    style="width: 80px;heigh:80px;border-radius:50%">
                            </a>
                            <a class="logo-dark header-logo" href="index-2.html">
                                <img src="{{ asset('img/logo.jfif') }}" class="logo" alt="Logo"
                                    style="width: 80px;heigh:80px;border-radius:50%">
                            </a>
                        </div>
                    </div>
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="index-2.html" class="menu-logo">
                                <img src="{{ asset('img/logo.jfif') }}" class="img-fluid" alt="Logo"
                                    style="width: 80px;heigh:80px;border-radius:50%">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li class="has-submenu megamenu active">
                                <a href="#">Home</a>
                            </li>
                            <li class="has-submenu">
                                <a href="#">Courses</a>
                            </li>
                        </ul>

                        <div class="menu-dropdown">
                            <div class="cart-item">
                                <h6>Cart & Wishlist</h6>
                                <div class="icon-btn">
                                    <a href="cart.html" class="position-relative">
                                        <i class="isax isax-shopping-cart5"></i>
                                        <span
                                            class="count-icon bg-success p-1 rounded-pill text-white fs-10 fw-bold">1</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-login">
                            <a href="login.html" class="btn btn-primary w-100 mb-2"><i
                                    class="isax isax-user me-2"></i>Sign In</a>
                            <a href="register.html" class="btn btn-secondary w-100"><i
                                    class="isax isax-user-edit me-2"></i>Register</a>
                        </div>
                    </div>
                    <div class="header-btn d-flex align-items-center">
                        <a href="/login" class="btn btn-primary d-inline-flex align-items-center me-2">
                            Sign In
                        </a>
                        <a href="/register" class="btn btn-secondary me-0">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- /Header -->

        <!-- banner -->
        <section class="banner-section">
            <img class="img-fluid d-none d-lg-flex banner-bg1" src="{{ asset('img/bg/bg-15.png') }}" alt="img">
            <img class="img-fluid d-none d-lg-flex banner-bg2" src="{{ asset('img/bg/bg-16.png') }}" alt="img">
            <img class="img-fluid d-none d-lg-flex banner-bg3" src="{{ asset('img/bg/bg-17.png') }}" alt="img">
            <img class="img-fluid d-none d-lg-flex banner-bg4" src="{{ asset('img/bg/bg-18.png') }}" alt="img">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-7 col-lg-7">
                        <div class="banner-content pe-xxl-5">
                            <span class="hero-title">The Leader in Online Learning</span>
                            <h1 class="mb-4 text-white">Find the Best <span>Courses</span> from the Best
                                <span>Mentors</span> Around the World
                            </h1>
                            <p class="fs-lg text-center text-md-start pb-2 pb-md-3 mb-4">Our specialized online courses
                                are designed to bring the classroom experience to you, no matter where you are.</p>

                            <form class="banner-search"
                                action="https://dreamslms.dreamstechnologies.com/html/template/course-list.html">
                                <div class="dropdown">
                                    <a class="hero-dropdown" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Select Category <i class="isax isax-arrow-down5 fs-12"></i>
                                    </a>
                                    <ul class="dropdown-menu p-1">
                                        <li><a class="dropdown-item" href="#">Design</a></li>
                                        <li><a class="dropdown-item" href="#">Programming</a></li>
                                        <li><a class="dropdown-item" href="#">Marketing</a></li>
                                    </ul>
                                </div>
                                <input type="text" name="search" class="border-0 form-control p-0"
                                    placeholder="Search for Courses, Instructors">
                                <button type="submit" class="btn btn-secondary ms-auto"><i
                                        class="isax isax-arrow-right-1"></i></button>
                            </form>
                            <div
                                class="d-flex align-items-center gap-4 justify-content-lg-between justify-content-center flex-wrap">
                                <div class="counter-item">
                                    <div class="counter-icon flex-shrink-0">
                                        <img src="{{ asset('img/icons/icon-32.svg') }}" alt="img">
                                    </div>
                                    <div class="count-content">
                                        <h5 class="text-purple"><span class="count-digit">10</span>K</h5>
                                        <p>Online Courses</p>
                                    </div>
                                </div>
                                <div class="counter-item">
                                    <div class="counter-icon flex-shrink-0">
                                        <img src="{{ asset('img/icons/icon-33.svg') }}" alt="img">
                                    </div>
                                    <div class="count-content">
                                        <h5 class="text-skyblue"><span class="count-digit">6</span>K</h5>
                                        <p>Certified Courses</p>
                                    </div>
                                </div>
                                <div class="counter-item">
                                    <div class="counter-icon flex-shrink-0">
                                        <img src="{{ asset('img/icons/icon-34.svg') }}" alt="img">
                                    </div>
                                    <div class="count-content">
                                        <h5 class="text-success"><span class="count-digit">2</span>K</h5>
                                        <p>Experienced Tutors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="banner-image">
                            <div class="swiper swiper-slider-banner">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="course-item-two course-item mb-0">
                                            <div class="course-img">
                                                <img src="{{ asset('img/course/course-22.jpg') }}" alt="img"
                                                    class="img-fluid">
                                                <div
                                                    class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                                    <a href="javascript:void(0);" class="fav-icon">
                                                        <i class="isax isax-heart"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="brand-icon ms-auto">
                                                        <img src="{{ asset('img/icons/course-01.svg') }}"
                                                            alt="img" class="img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="course-content">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-sm">
                                                            <img src="{{ asset('img/user/user-50.jpg') }}"
                                                                alt="img"
                                                                class="img-fluid avatar avatar-sm rounded-circle">
                                                        </a>
                                                        <div class="ms-2">
                                                            <a href="javascript:void(0);"
                                                                class="link-default fs-14">David Benitz</a>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium">
                                                        Productivity
                                                    </span>
                                                </div>
                                                <h6 class="mb-2"><a href="course-details.html">The Complete Business
                                                        and Management Course</a></h6>
                                                <p class="d-flex align-items-center mb-3"><i
                                                        class="ti ti-star-filled text-warning me-2"></i>5.0 (210
                                                    Reviews)</p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="text-secondary fs-16 fw-semi-bold mb-0">$168</h6>
                                                    <a href="cart.html"
                                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">Add
                                                        to Cart<i class="isax isax-arrow-right-3 ms-1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="course-item course-item-two mb-0">
                                            <div class="course-img">
                                                <img src="{{ asset('img/course/course-25.jpg') }}" alt="img"
                                                    class="img-fluid">
                                                <div
                                                    class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                                    <a href="javascript:void(0);" class="fav-icon">
                                                        <i class="isax isax-heart"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="brand-icon ms-auto">
                                                        <img src="{{ asset('img/featured-courses/Clip-path-group.svg') }}"
                                                            alt="img" class="img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content-course">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-sm">
                                                            <img src="{{ asset('img/user/user-20.jpg') }}"
                                                                alt="img"
                                                                class="img-fluid avatar avatar-sm rounded-circle">
                                                        </a>
                                                        <div class="ms-2">
                                                            <a href="javascript:void(0);"
                                                                class="link-default fs-14">Edith Dorsey</a>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium">
                                                        Lifestyles
                                                    </span>
                                                </div>
                                                <h6 class="mb-2"><a href="course-details.html">Build Creative Arts &
                                                        media Course Completed</a></h6>
                                                <p class="d-flex align-items-center mb-3"><i
                                                        class="ti ti-star-filled text-warning me-2"></i>4.9 (178
                                                    Reviews)</p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="text-secondary fs-16 fw-semi-bold mb-0">$190</h6>
                                                    <a href="cart.html"
                                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">Add
                                                        to Cart<i class="isax isax-arrow-right-3 ms-1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="course-item course-item-two mb-0">
                                            <div class="course-img">
                                                <img src="{{ asset('img/course/course-24.jpg') }}" alt="img"
                                                    class="img-fluid">
                                                <div
                                                    class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                                    <a href="javascript:void(0);" class="fav-icon">
                                                        <i class="isax isax-heart"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="brand-icon ms-auto">
                                                        <img src="{{ asset('img/featured-courses/react.svg') }}"
                                                            alt="img" class="img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content-course">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-sm">
                                                            <img src="{{ asset('img/user/user-23.jpg') }}"
                                                                alt="img"
                                                                class="img-fluid avatar avatar-sm rounded-circle">
                                                        </a>
                                                        <div class="ms-2">
                                                            <a href="javascript:void(0);"
                                                                class="link-default fs-14">Calvin Johnsen</a>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium">
                                                        Development
                                                    </span>
                                                </div>
                                                <h6 class="mb-2"><a href="course-details.html">Learn & Create
                                                        ReactJS Tech Fundamentals Apps</a></h6>
                                                <p class="d-flex align-items-center mb-3"><i
                                                        class="ti ti-star-filled text-warning me-2"></i>5.0 (154
                                                    Reviews)</p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="text-secondary fs-16 fw-semi-bold mb-0">$147</h6>
                                                    <a href="cart.html"
                                                        class="btn btn-dark btn-sm d-inline-flex align-items-center">Add
                                                        to Cart<i class="isax isax-arrow-right-3 ms-1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner -->

        <!-- benefits -->
        <section class="benefit-section">
            <div class="container">
                <div class="section-header text-center">
                    <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Our
                        Benefits</span>
                    <h2>Master the Skills to Drive your Career</h2>
                    <p>The right course, guided by an expert mentor, can provide invaluable insights, practical skills.
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body p-4">
                                <div class="position-absolute top-0 end-0 mt-n3 me-n4">
                                    <img src="{{ asset('img/shapes/bg-1.png') }}" alt="img">
                                </div>
                                <div class="p-4 rounded-pill bg-primary-transparent d-inline-flex">
                                    <i class="isax isax-book-1 fs-24"></i>
                                </div>
                                <h5 class="mt-3 mb-1">Flexible Learning</h5>
                                <p>We believe that high-quality education should be accessible to everyone. Our pricing
                                    form in models are designed.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body p-4">
                                <div class="position-absolute top-0 end-0 mt-n3 me-n4">
                                    <img src="{{ asset('img/shapes/bg-2.png') }}" alt="img">
                                </div>
                                <div class="p-4 rounded-pill bg-secondary-transparent d-inline-flex">
                                    <i class="isax isax-bookmark5 fs-24"></i>
                                </div>
                                <h5 class="mt-3 mb-1">Lifetime Access</h5>
                                <p>When you enroll in our courses, you’re not just signing up for a temporary learning
                                    to experience you’re making.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body p-4">
                                <div class="position-absolute top-0 end-0 mt-n3 me-n4">
                                    <img src="{{ asset('img/shapes/bg-3.png') }}" alt="img">
                                </div>
                                <div class="p-4 rounded-pill bg-skyblue-transparent d-inline-flex">
                                    <i class="isax isax-chart-26 fs-24"></i>
                                </div>
                                <h5 class="mt-3 mb-1">Expert Instruction</h5>
                                <p>Our instructors are seasoned professionals with years of experience in their
                                    respective fields & Experts advice</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- benefits -->


        <!-- trust -->
        <section class="trust-sec">
            <div class="container">
                <div class="video-showcase">
                    <img src="{{ asset('img/feature/feature-1.jpg') }}" class="img-fluid w-100 rounded-2"
                        alt="banner">
                    <div class="video-play">
                        <a href="https://www.youtube.com/embed/1trvO6dqQUI" data-fancybox=""><i
                                class="isax isax-play5"></i></a>
                    </div>
                </div>
                <div class="trust-content">
                    <img src="{{ asset('img/bg/bg-19.png') }}" alt="img" class="w-100 trust-bg">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <h4>Trusted by the 15,000+ happy students and online users since 2000</h4>
                            <div class="d-flex align-items-center flex-wrap mt-5 gap-2">
                                <a href="login.html" class="btn btn-secondary">Enroll as Student</a>
                                <a href="become-an-instructor.html" class="btn btn-dark">Apply as Tutor</a>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="text-white mb-2">9.8/10</h4>
                                    <h5 class="text-white mb-2">Course Approval Score</h5>
                                    <p class="text-white mb-5">Achieving a complete course approval score is a
                                        significant.</p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="text-white mb-2">13k</h4>
                                    <h5 class="text-white mb-2">Satisfied Students Worldwide</h5>
                                    <p class="text-white mb-5">Satisfied students worldwide share a common thread of
                                        happiness.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white user-goal p-2">
                                <div class="avatar avatar-lg flex-shrink-0">
                                    <img class="rounded-pill" src="{{ asset('img/user/user-28.jpg') }}"
                                        alt="img">
                                </div>
                                <p class="text-gray-9 mb-0">“All courses are incredibly help people to achieve their
                                    goals”</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /trust -->

        <!-- featured course -->
        <section class="featured-courses-section">
            <div class="container">
                <div class="section-header text-center">
                    <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Featured
                        Courses</span>
                    <h2>What’s New in DreamsLMS</h2>
                    <p>Discover our featured courses, specially curated to help you gain in-demand skills</p>
                </div>
                <div class="feature-course-slider-2">
                    <div>
                        <div class="course-item">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-36.jpg') }}" alt="img"
                                        class="img-fluid">
                                </a>
                                <div
                                    class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                    <span class="price-badge ms-auto">$500</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge badge-md badge-soft-info rounded-pill">UI/UX</span>
                                <a href="javascript:void(0);" class="fav-icon"><i class="isax isax-heart"></i></a>
                            </div>
                            <div class="pb-3 border-bottom mb-3">
                                <h5><a href="course-details.html">Information About UI/UX Design Degree</a></h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="course-rating">
                                    <span class="course-user"><a href="javascript:void(0);"><img
                                                src="{{ asset('img/user/user-06.jpg') }}" alt="img"
                                                class="img-fluid"></a></span>
                                    <a href="javascript:void(0);">Brenda Slaton</a>
                                </div>
                                <div class="d-flex">
                                    <span class="d-flex align-items-center rating"><i
                                            class="fa-solid fa-star text-warning me-2"></i>5.0</span>
                                </div>
                            </div>
                            <a href="course-details.html" class="btn buy-course-btn">Buy Course Now</a>
                        </div>
                    </div>
                    <div>
                        <div class="course-item">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-37.jpg') }}" alt="img"
                                        class="img-fluid">
                                </a>
                                <div
                                    class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                    <span class="price-badge ms-auto">$300</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span
                                    class="badge badge-soft-danger badge-md rounded-pill shadow-none">Productivity</span>
                                <a href="javascript:void(0);" class="fav-icon"><i class="isax isax-heart"></i></a>
                            </div>
                            <div class="pb-3 border-bottom mb-3">
                                <h5><a href="course-details.html">Learn & Create ReactJS Tech Fundamentals Apps</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="course-rating">
                                    <span class="course-user"><a href="javascript:void(0);"><img
                                                src="{{ asset('img/user/user-07.jpg') }}" alt="img"
                                                class="img-fluid"></a></span>
                                    <a href="javascript:void(0);">David Benitez</a>
                                </div>
                                <div class="d-flex">
                                    <span class="d-flex align-items-center rating"><i
                                            class="fa-solid fa-star text-warning me-2"></i>5.0</span>
                                </div>
                            </div>
                            <a href="course-details.html" class="btn buy-course-btn">Buy Course Now</a>
                        </div>
                    </div>
                    <div>
                        <div class="course-item">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-38.jpg') }}" alt="img"
                                        class="img-fluid">
                                </a>
                                <div
                                    class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                    <span class="price-badge ms-auto">$350</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span
                                    class="badge badge-soft-purple badge-md rounded-pill shadow-none">Management</span>
                                <a href="javascript:void(0);" class="fav-icon"><i class="isax isax-heart"></i></a>
                            </div>
                            <div class="pb-3 border-bottom mb-3">
                                <h5><a href="course-details.html">The Complete Business and Management Course</a></h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="course-rating">
                                    <span class="course-user"><a href="javascript:void(0);"><img
                                                src="{{ asset('img/user/user-08.jpg') }}" alt="img"
                                                class="img-fluid"></a></span>
                                    <a href="javascript:void(0);">Calvin Johnsen</a>
                                </div>
                                <div class="d-flex">
                                    <span class="d-flex align-items-center rating"><i
                                            class="fa-solid fa-star text-warning me-2"></i>5.0</span>
                                </div>
                            </div>
                            <a href="course-details.html" class="btn buy-course-btn">Buy Course Now</a>
                        </div>
                    </div>
                    <div>
                        <div class="course-item">
                            <div class="course-img">
                                <a href="course-details.html">
                                    <img src="{{ asset('img/course/course-39.jpg') }}" alt="img"
                                        class="img-fluid">
                                </a>
                                <div
                                    class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                    <span class="price-badge ms-auto">$500</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge badge-soft-success badge-md rounded-pill shadow-none">Art &
                                    Media</span>
                                <a href="javascript:void(0);" class="fav-icon"><i
                                        class="isax isax-heart5 text-danger"></i></a>
                            </div>
                            <div class="pb-3 border-bottom mb-3">
                                <h5><a href="course-details.html">Build Creative Arts & media Course Completed</a></h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="course-rating">
                                    <span class="course-user"><a href="javascript:void(0);"><img
                                                src="{{ asset('img/user/user-09.jpg') }}" alt="img"
                                                class="img-fluid"></a></span>
                                    <a href="javascript:void(0);">David Benitez</a>
                                </div>
                                <div class="d-flex">
                                    <span class="d-flex align-items-center rating"><i
                                            class="fa-solid fa-star text-warning me-2"></i>5.0</span>
                                </div>
                            </div>
                            <a href="course-details.html" class="btn buy-course-btn">Buy Course Now</a>
                        </div>
                    </div>
                    <div>
                        <div class="course-item">
                            <div class="course-img">
                                <a href="course-details-2.html">
                                    <img src="{{ asset('img/course/course-37.jpg') }}" alt="img"
                                        class="img-fluid">
                                </a>
                                <div
                                    class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                    <span class="price-badge ms-auto">$300</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span
                                    class="badge badge-soft-danger badge-md rounded-pill shadow-none">Productivity</span>
                                <a href="javascript:void(0);" class="fav-icon"><i class="isax isax-heart"></i></a>
                            </div>
                            <div class="pb-3 border-bottom mb-3">
                                <h5><a href="course-details-2.html">Learn & Create ReactJS Tech Fundamentals Apps</a>
                                </h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="course-rating">
                                    <span class="course-user"><a href="javascript:void(0);"><img
                                                src="{{ asset('img/user/user-07.jpg') }}" alt="img"
                                                class="img-fluid"></a></span>
                                    <a href="javascript:void(0);">David Benitez</a>
                                </div>
                                <div class="d-flex">
                                    <span class="d-flex align-items-center rating"><i
                                            class="fa-solid fa-star text-warning me-2"></i>5.0</span>
                                </div>
                            </div>
                            <a href="course-details.html" class="btn buy-course-btn">Buy Course Now</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="course-list.html" class="btn btn-primary btn-md">View All Courses</a>
                </div>
            </div>
        </section>
        <!-- /featured course -->

        <!-- community-to-learn -->
        <section class="community-to-learn">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-header">
                            <span
                                class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Advanced
                                Learning</span>
                            <h2>Creating a community of learners.</h2>
                            <p>We're dedicated to transforming education by providing a diverse range of high-quality
                                courses that cater to learners of all levels.</p>
                        </div>
                        <div class="community-item d-flex align-items-center">
                            <span class="community-icon-1">
                                <i class="isax isax-book-saved5"></i>
                            </span>
                            <div>
                                <h5 class="mb-2">Learn from anywhere</h5>
                                <p class="mb-0">Learning from anywhere has become a transform aspect of modern
                                    education, allowing individuals.</p>
                            </div>
                        </div>
                        <div class="community-item d-flex align-items-center">
                            <span class="community-icon-2">
                                <i class="isax isax-bookmark5"></i>
                            </span>
                            <div>
                                <h5 class="mb-2">Expert Mentors</h5>
                                <p class="mb-0">Learning from anywhere has become a transform aspect of modern
                                    education, allowing individuals.</p>
                            </div>
                        </div>
                        <div class="community-item d-flex align-items-center">
                            <span class="community-icon-3">
                                <i class="isax isax-chart-26"></i>
                            </span>
                            <div>
                                <h5 class="mb-2">Learn in demand skills</h5>
                                <p class="mb-0">In today's rapidly evolving job market, learning in demand skills is
                                    crucial for career advancement.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="login.html" class="btn btn-secondary btn-md">Enroll as Student</a>
                            <a href="become-an-instructor.html" class="btn btn-dark btn-md">Apply as Tutor</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="community-img d-none d-lg-flex">
                            <img src="{{ asset('img/shapes/shape-5.png') }}" alt="img"
                                class="img-fluid community-img-01">
                            <img src="{{ asset('img/shapes/shape-6.png') }}" alt="img"
                                class="img-fluid community-img-02">
                            <img src="{{ asset('img/feature/feature-2.jpg') }}" alt="img"
                                class="img-fluid community-img-03">
                            <img src="{{ asset('img/feature/feature-3.jpg') }}" alt="img"
                                class="img-fluid community-img-04">
                            <img src="{{ asset('img/shapes/shape-7.svg') }}" alt="img"
                                class="img-fluid community-img-05">
                            <div class="community-count p-2">
                                <div class="enrolled-list">
                                    <div class="avatar-list-stacked mb-2">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white"
                                                src="{{ asset('img/user/user-01.jpg') }}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white"
                                                src="{{ asset('img/user/user-03.jpg') }}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white"
                                                src="{{ asset('img/user/user-07.jpg') }}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white"
                                                src="{{ asset('img/user/user-08.jpg') }}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img src="{{ asset('img/user/user-06.jpg') }}" alt="img">
                                        </span>
                                    </div>
                                    <p class="mb-0"><span class="text-secondary">35K+</span> Students Enrolled</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /community-to-learn -->



        <!-- Footer -->
        <footer class="footer footer-one">
            <div class="footer-top">
                <div class="container">
                    <div class="row row-gap-4">
                        <div class="col-lg-4">
                            <div class="footer-about">
                                <div class="footer-logo">
                                    <img src="{{ asset('img/logo-white.svg') }}" alt="">
                                </div>
                                <p>Platform designed to help organizations, educators, and learners manage, deliver, and
                                    track learning and training activities.</p>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="me-2"><img src="{{ asset('img/icon/appstore.svg') }}"
                                            alt=""></a>
                                    <a href="#"><img src="{{ asset('img/icon/googleplay.svg') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row row-gap-4">
                                <div class="col-lg-4 col-md-4">
                                    <div class="footer-widget footer-menu">
                                        <h5 class="footer-title">Support</h5>
                                        <ul>
                                            <li><a href="course-grid.html">Education</a></li>
                                            <li><a href="add-course.html">Enroll Course</a></li>
                                            <li><a href="javscript:void(0);">Orders</a></li>
                                            <li><a href="pricing-plan.html">Payments</a></li>
                                            <li><a href="blog-grid.html">Blogs</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="footer-widget footer-menu">
                                        <h5 class="footer-title">About</h5>
                                        <ul>
                                            <li><a href="course-category.html">Categories</a></li>
                                            <li><a href="course-list.html">Courses</a></li>
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="contact-us.html">Contacts</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="footer-widget footer-menu">
                                        <h5 class="footer-title">Useful Links</h5>
                                        <ul>
                                            <li><a href="javascript:void(0);">Our values</a></li>
                                            <li><a href="javascript:void(0);">Our advisory board</a></li>
                                            <li><a href="javascript:void(0);">Our partners</a></li>
                                            <li><a href="javascript:void(0);">Become a partner</a></li>
                                            <li><a href="javascript:void(0);">Work at Future Learn</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="footer-widget footer-contact">
                                <h5 class="footer-title">Subscribe Newsletter</h5>
                                <div class="footer-newsletter">
                                    <p>Sign up to get updates & news.</p>
                                    <form action="javascript:void(0);">
                                        <div class="subscribe-form">
                                            <span>
                                                <i class="isax isax-message-text"></i>
                                            </span>
                                            <input type="email" class="form-control" placeholder="Email Address">
                                        </div>
                                        <button type="submit"
                                            class="btn btn-secondary btn-xl w-100">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row row-gap-2">
                        <div class="col-lg-5">
                            <div class="text-center text-lg-start">
                                <p>Copyright 2025 © <span class="text-secondary">DreamsLMS</span>. All right reserved.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ul class="d-flex align-items-center justify-content-center footer-link">
                                <li><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <div class="social-icon">
                                <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>

    <!-- Slick Slider -->
    <script src="{{ asset('plugins/slick/slick.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>

    <!-- Swiper Slider -->
    <script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>

    <!-- counterup JS -->
    <script src="{{ asset('js/counter.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>

    <!-- Aos -->
    <script src="{{ asset('plugins/aos/aos.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>

    <!-- Fancybox JS -->
    <script src="{{ asset('plugins/fancybox/jquery.fancybox.min.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}" type="1c53fecba67e85f4bb940866-text/javascript"></script>
    <script src="{{ asset('js/rocket-loader.min.js') }}" data-cf-settings="69bb5a96ab822db32518aa29-|49"></script>
</body>

</html>
