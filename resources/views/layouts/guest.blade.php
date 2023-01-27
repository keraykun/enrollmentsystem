
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Agdao Integrated School Enrollment System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('images/main/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}">
    {{-- <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> --}}

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <!-- Topbar End -->



<!-- Navbar Start -->
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
    <a href="home.php" class="navbar-brand ml-lg-3">
        <h3 class="m-0 text-uppercase text-primary"><img width="6%" src="{{ asset('images/main/agdaologo.png') }}">Enrollment System</h3>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
            <a href="{{ route('guest.home') }}" class="nav-item nav-link  {{ Route::is('guest.home')?'active':''}}">Home</a>
            <a href="{{ route('guest.about') }}" class="nav-item nav-link {{ Route::is('guest.about')?'active':''}}">About</a>
            <a href="{{ route('guest.department') }}" class="nav-item nav-link  {{ Route::is('guest.department')?'active':''}}">Department</a>
            <a href="{{ route('guest.contact') }}" class="nav-item nav-link  {{ Route::is('guest.contact')?'active':''}}">Contact</a>
            <a href="{{ route('guest.register') }}" class="nav-item nav-link  {{ Route::is('guest.register')?'active':''}}">Register</a>
            <a href="{{ route('guest.login') }}" class="nav-item nav-link  {{ Route::is('guest.login')?'active':''}}">Login</a>
        </div>
        {{-- <div style="display: flex; column-gap: 30px;">
            <a href="studentlogin.php" class="btn btn-primary py-2 d-none d-lg-block">Login Student</a>
        <a href="admin/login.php" class="btn btn-primary py-2 d-none d-lg-block">Login Teacher</a>
        </div> --}}
    </div>
</nav>
</div>
<!-- Navbar End -->

@yield('guest')



<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h2 class="mt-n2 text-uppercase text-white"><img  width="12%" src="{{ asset('images/main/agdaologo.png') }}"></i>Enrollment System</h2>
                </a>
                <p class="m-0">Agdao Integrated School-Junior High School Department</p>
            </div>
            <div class="col-md-6 mb-5">
                <h3 class="text-white mb-4"></h3>
                <div class="w-100">
                    <div class="input-group">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container mt-2 pt-2">

        <div class="row">
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Barangay Agdao, San Carlos City, Pangasinan</p>
                <p><i class="fa fa-phone-alt mr-2"></i>(075) 649 3099</p>
                <p><i class="fa fa-envelope mr-2"></i>scc.agdaointegratedschool@gmail.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                    <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">ACADEMICS</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Kindergarten</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Elementary</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Sped</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Junior High School</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Senior High School</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>ALS</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Privacy Policy</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Terms & Condition</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Regular FAQs</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Help & Support</a>
                    <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--yeild-->
<div class="container-fluid bg-white text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="text-primary">Copyright &copy; <a class="text-primary" href="#">enrollment system</a>. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <p class="text-primary">Designed by<a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
        </div>
    </div>
</div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script src={{ asset('lib/easing/easing.js') }}></script>
    <script src={{ asset("lib/waypoints/waypoints.min.js") }}></script>
    <script src={{ asset('lib/counterup/counterup.min.js') }}></script>
    <script src={{ asset('lib/owlcarousel/owl.carousel.min.js') }}></script>
    <!-- Template Javascript -->
    <script src={{ asset('js/main.js') }}></script>

</body>

</html>
