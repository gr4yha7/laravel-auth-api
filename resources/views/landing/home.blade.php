@extends('layouts.landing')

@section('title', 'Home')

@section('head')
    <link rel="stylesheet" href="vendor/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendor/owl.theme.default.min.css" />
@endsection

@section('scripts')
    <script src="vendor/owl.carousel.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/hover-effect.js"></script>
    <script>
        eParallax($('.parallax-section'));
        eHoverEffect($('.learn'));
        eHoverEffect($('.teach'));
        $('.uniform-square').each(function(){
            var width = $(this).outerWidth();
            $(this).outerHeight(width)
            if($(window).outerWidth() <= 350)
                $(this).outerHeight(width + 150)
            else if($(window).outerWidth() <= 380)
                $(this).outerHeight(width + 100)
            else if($(window).outerWidth() <= 450)
                $(this).outerHeight(width + 30)
        })
        $(window).resize(function(){
            $('.uniform-square').each(function(){
                var width = $(this).outerWidth();
                $(this).outerHeight(width)
                if($(window).outerWidth() <= 350)
                    $(this).outerHeight(width + 150)
                else if($(window).outerWidth() <= 380)
                    $(this).outerHeight(width + 100)
                else if($(window).outerWidth() <= 450)
                    $(this).outerHeight(width + 30)
            })
        })
        $('.owl-carousel').owlCarousel({
            center: true,
            items: 2,
            loop: false,
            margin: 10,
            responsive: {
                600: {
                    items: 2
                }
            }
        });
    </script>
@endsection

@section('content')
    <div class="hero">
        <div id="backgroundVideo" class="quicksand">
            <div class="videoContainer">
                <video id="backgroundVideo" class="fullWidth" loop autoplay muted>
                    <source src="videos/My Movie1.mp4" type="video/mp4">
                </video>
            </div>
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="banner-text">Develop yourself today</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div id="hero-sub-div" class="col-md-6">
                            <h1>More than a course</h1>
                            <p>Don't let these savings slip away -- courses from $9.99 ends at 11:59 p.m PDT.</p>
                            <form action="/search" method="GET">
                                <input name="search" placeholder="What should we teach you?" />
                                <button type="submit"><img src="images/icons/search.png" alt="Search" /></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-2 section">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-md-6 colored">
                    <h2 class="intro-title">We are <span>V-Tech</span></h2>
                    <p class="intro-text">
                        We are an online learning platform aimed at connecting students to facilitators ad quis laboris
                        ex esse nulla est minim. Enim Lorem ex adipisicing anim elit excepteur do est irure ea non
                        tempor ad.
                    </p>
                    <a href="#">Get started now <i class="fas fa-angle-right"></i></a>
                </div>
                <div id="intro-background" class="col-md-6 background-1">

                </div>
            </div>
        </div>
    </div>
    <div class="section-1 section">
        <div class="container mt-3">
            <div class="card-grid">
                <div class="card fullWidth">
                    <img src="images/icons/flexible-screen.png" alt="Flexible schedule" />
                    <div>
                        <h4>Flexible schedules</h4>
                        <p>Pick the days you're available and learn at your pace</p>
                    </div>
                </div>
                <div class="card fullWidth">
                    <img src="images/icons/position.png" alt="Learn from the best" />
                    <div>
                        <h4>Learn from the best</h4>
                        <p>Experienced facilitators ready to impart their knowledge to you</p>
                    </div>
                </div>
                <div class="card fullWidth">
                    <img src="images/icons/certificate2.png" alt="Get certified" />
                    <div>
                        <h4>Get certified</h4>
                        <p>Learn and add a new certification to your resume</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-3 section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Check out our courses</h1>
                    <p class="text-muted text-center montserrat">Select a category below to see some of our featured courses</p>
                    <div class="courseSelect">
                        <select class="custom-select">
                            <option>IT Support</option>
                            <option>Networking</option>
                            <option>Software Development</option>
                            <option>Design</option>
                            <option>Data Science</option>
                            <option>Cyber-Security</option>
                        </select>
                    </div>
                    <div class="courseNav">
                        <div class="active">
                            <a href="#">IT Support</a>
                        </div>
                        <div>
                            <a href="#">Networking</a>
                        </div>
                        <div>
                            <a href="#">Software Development</a>
                        </div>
                        <div>
                            <a href="#">Design</a>
                        </div>
                        <div>
                            <a href="#">Data Science</a>
                        </div>
                        <div>
                            <a href="#">Cyber-Security</a>
                        </div>
                    </div>
                    <div class="course-content">
                        <div class="tut-grid">
                            <div class="tut-card">
                                <div class="head">
                                    <img src="images/learnpython.jpg" alt="Learn Python" />
                                </div>
                                <div class="body">
                                    <p class="title">Introduction to Python</p>
                                    <p class="duration"><i class="fas fa-clock"></i> 15 days</p>
                                    <p class="number"><i class="fas fa-users"></i> 994 students</p>
                                    <p class="price">&#8358; 15, 000</p>
                                </div>
                            </div>
                            <div class="tut-card">
                                <div class="head">
                                    <img src="images/learnpython.jpg" alt="Learn Python" />
                                </div>
                                <div class="body">
                                    <p class="title">Introduction to Python</p>
                                    <p class="duration"><i class="fas fa-clock"></i> 15 days</p>
                                    <p class="number"><i class="fas fa-users"></i> 994 students</p>
                                    <p class="price">&#8358; 15, 000</p>
                                </div>
                            </div>
                            <div class="tut-card">
                                <div class="head">
                                    <img src="images/learnpython.jpg" alt="Learn Python" />
                                </div>
                                <div class="body">
                                    <p class="title">Introduction to Python</p>
                                    <p class="duration"><i class="fas fa-clock"></i> 15 days</p>
                                    <p class="number"><i class="fas fa-users"></i> 994 students</p>
                                    <p class="price">&#8358; 15, 000</p>
                                </div>
                            </div>
                            <div class="tut-card">
                                <div class="head">
                                    <img src="assets/images/learnpython.jpg" alt="Learn Python" />
                                </div>
                                <div class="body">
                                    <p class="title">Introduction to Python</p>
                                    <p class="duration"><i class="fas fa-clock"></i> 15 days</p>
                                    <p class="number"><i class="fas fa-users"></i> 994 students</p>
                                    <p class="price">&#8358; 15, 000</p>
                                </div>
                            </div>
                            <div class="tut-card">
                                <div class="head">
                                    <img src="images/learnpython.jpg" alt="Learn Python" />
                                </div>
                                <div class="body">
                                    <p class="title">Introduction to Python</p>
                                    <p class="duration"><i class="fas fa-clock"></i> 15 days</p>
                                    <p class="number"><i class="fas fa-users"></i> 994 students</p>
                                    <p class="price">&#8358; 15, 000</p>
                                </div>
                            </div>
                            <div class="tut-card">
                                <div class="head">
                                    <img src="images/learnpython.jpg" alt="Learn Python" />
                                </div>
                                <div class="body">
                                    <p class="title">Introduction to Python</p>
                                    <p class="duration"><i class="fas fa-clock"></i> 15 days</p>
                                    <p class="number"><i class="fas fa-users"></i> 994 students</p>
                                    <p class="price">&#8358; 15, 000</p>
                                </div>
                            </div>
                            <div class="tut-card">
                                <div class="head">
                                    <img src="images/learnpython.jpg" alt="Learn Python" />
                                </div>
                                <div class="body">
                                    <p class="title">Introduction to Python</p>
                                    <p class="duration"><i class="fas fa-clock"></i> 15 days</p>
                                    <p class="number"><i class="fas fa-users"></i> 994 students</p>
                                    <p class="price">&#8358; 15, 000</p>
                                </div>
                            </div>
                            <div class="tut-card">
                                <div class="head">
                                    <img src="images/learnpython.jpg" alt="Learn Python" />
                                </div>
                                <div class="body">
                                    <p class="title">Introduction to Python</p>
                                    <p class="duration"><i class="fas fa-clock"></i> 15 days</p>
                                    <p class="number"><i class="fas fa-users"></i> 994 students</p>
                                    <p class="price">&#8358; 15, 000</p>
                                </div>
                            </div>
                        </div>
                        <div class="call-to-action mt-5">
                            <a href="#">View more Courses <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax-section section">
        <div class="container parallax-content">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Not sure of what to learn?</h1>
                    <p class="text-center">Fill out our questionnaire and get peronalized suggestions</p>
                    <div class="d-flex">
                        <a href="#">Get started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="category-section">
        <div class="container">
            <h2>Top Categories</h2>
            <div class="category-grid">
                <div class="category-card fullWidth">
                    <img src="images/icons/development.png" alt="Development" />
                    <p>Development</p>
                </div>
                <div class="category-card fullWidth">
                    <img src="images/icons/website.png" alt="IT Support" />
                    <p>IT Support</p>
                </div>
                <div class="category-card fullWidth">
                    <img src="images/icons/cyber-security.png" alt="Cyber-Security" />
                    <p>Cyber-Security</p>
                </div>
                <div class="category-card fullWidth">
                    <img src="images/icons/design.png" alt="Design" />
                    <p>Design</p>
                </div>
                <div class="category-card fullWidth">
                    <img src="images/icons/digital-marketing.png" alt="Marketing" />
                    <p>Marketing</p>
                </div>
                <div class="category-card fullWidth">
                    <img src="images/icons/data-science.png" alt="Data Science" />
                    <p>Data Science</p>
                </div>
                <div class="category-card fullWidth">
                    <img src="images/icons/networking.png" alt="Networking" />
                    <p>Networking</p>
                </div>
                <div class="category-card fullWidth">
                    <img src="images/icons/eng.png" alt="Audio Engineering" />
                    <p>Engineering & Maintenance</p>
                </div>
                <div class="category-card fullWidth">
                    <img src="images/icons/camera.png" alt="Photography" />
                    <p>Photography</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="images/slide1.jpg" alt="Slide 1" />
                <p class="text montserrat">Pick a flexible schedule of your choice and have a class or facilitator
                    assigned to you</p>
            </div>
            <div class="item">
                <img src="images/slide2.jpg" alt="Slide 2" />
                <p class="text montserrat">Start your course and wonderful journey on your wondrous path to
                    self-development</p>
            </div>
            <div class="item">
                <img src="images/slide3.jpg" alt="Slide 3" />
                <p class="text montserrat">Get Certified and prepared to take on the world by storm</p>
            </div>
        </div>

    </div>
    <div class="teach-learn-section">
        <div class="container">
            <!-- <div class="row mt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="hr"></div>
                </div>
            </div> -->
            <div class="row my-5">
                <div class="col-md-8">
                    <h2 class="title-h2">Whether you're a teacher or want to train your team, V-Tech's got you covered!
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 parent">
                    <div class="teach uniform-square">
                        <div class="overlay">
                            <h3>Teach on V-Tech</h3>
                            <p>Think you have what it takes to teach on our platform? We'd like to have you.</p>
                            <a href="#">Apply now <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 parent">
                    <div class="learn uniform-square">
                        <div class="overlay">
                            <h3>V-Tech for Business</h3>
                            <p>Do you want to train your team? We offer amazing plans and loads of courses for your
                                team.</p>
                            <a href="#">Get started <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection