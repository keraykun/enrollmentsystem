@extends('layouts.guest')

@section('guest')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">

            <h1 class="text-white display-1 mb-4">Agdao Integrated School</h1>
                <div class="mx-auto mb-3" style="width: 100%; max-width: 800px;"  >
            <h3 class="text-white mt-8 mb-8">Junior High School Department</h3>

                <div class="input-group">
                    <div class="input-group-prepend">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('images/main/about.png') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-2">
                        <h4 class="d-inline-block position-relative text-warning text-uppercase pb-2">About Us</h4>
                        <h3 class="display-8">VISION</h3>
                    </div>
                    <b><p>We dream of Filipinos who passionately love their country and whose values and competencies enable them to realize their full potential and contribute meaningfully to building the nation. As a learner-centered public institution, the Department of Education continuously improves itself to better serve its stakeholders.</p></b>
                        <h3 class="display-8">MISSION</h3>

                    <b> <p>To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where: Students learn in a child-friendly, gender-sensitive, safe, and motivating environment. Teachers facilitate learning and constantly nurture every learner. Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen. Family, community, and other stakeholders are actively engaged and share responsibility for developing life-long learners.</p></b>
                        <h3 class="display-8">CORE VALUES</h3>

                    <b><ul>
                                    <li>Maka-Diyos</li>
                                    <li>Maka-tao</li>
                                    <li>Makakalikasan</li>
                                    <li>Makabansa</li>


                                    </ul></b>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->




    <!-- Feature Start -->
    <div class="container-fluid bg-image py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">

                        <h1 class="display-4">Yearly Enrollment Practices</h1>
                    </div>
                    <b> <p class="mb-4 pb-2">Setting up enrollment hub and online enrollment link, a yearly practices during open enrollment at agdao integrated school. The Faculties are divided to assist learners according to the grade level of their school year, the setting enrollment help them to get easily and less hassle to maintain and organize the management record of learner’s enrollee.</p></b>
                        <h4 class="display-8">Academics</h4>

                    <ul>
                                    <b><li>Kindergarten</li>
                                    <li>Elementary</li>
                                    <li>Sped</li>
                                    <li>Junior High School</li>
                                    <li>Senior High School</li>
                                    <li>ALS</li></b>
                                        <ul>
                    <div class="d-flex mb-3">

                        <div class="mt-n1">
                            <h4></h4>
                            <p class="m-0"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 600px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('images/main/feature.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid py-5">
        <div class="container py-5">
            <div class="section-title text-center position-relative mb-5">

                <h3 class="display-5">News/Updates</h3>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/teams1.jpg') }}" alt="">
                    <div class=" text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/teams2.jpg') }}" alt="">
                    <div class=" text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/teams3.jpg') }}" alt="">
                    <div class=" text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/teams4.jpg') }}" alt="">
                    <div class="text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/teams5.jpg') }}" alt="">
                    <div class="text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses Start -->
    <div class="container-fluid bg-image px-0 py-5">
        <div class="row mx-0 justify-content-center pt-5">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative mb-4">
                    <h4 class="d-inline-block position-relative text-warning text-uppercase pb-2">DEPARTMENT</h4>
                    <h1 class="display-5">Junior High School</h1>
                </div>
            </div>
        </div>
        <div class="owl-carousel courses-carousel">
            <div class="courses-item position-relative">
                <img class="img-fluid" src="{{ asset('images/main/courses-1.jpg') }}" alt="">
                <div class="courses-text">

                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-6">

                        </div>
                            <h3 class="text-center text-white px-4">Program</h3>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >

                    </div>
                </div>
            </div>
            <div class="courses-item position-relative">
                <img class="img-fluid" src="{{ asset('images/main/courses-2.jpg') }}" alt="">
                <div class="courses-text">

                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-6">

                        </div>
                            <h3 class="text-center text-white px-4">Performance Task</h3>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >

                    </div>
                </div>
            </div>
            <div class="courses-item position-relative">
                <img class="img-fluid" src="{{ asset('images/main/courses-3.jpg') }}" alt="">
                <div class="courses-text">

                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-6">

                        </div>
                            <h3 class="text-center text-white px-4">Career Guidance</h3>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >

                    </div>
                </div>
            </div>
            <div class="courses-item position-relative">
                <img class="img-fluid" src="{{ asset('images/main/courses-4.jpg') }}" alt="">
                <div class="courses-text">

                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-6">

                        </div>
                            <h3 class="text-center text-white px-4">National Reading Month</h3>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >

                    </div>
                </div>
            </div>
            <div class="courses-item position-relative">
                <img class="img-fluid" src="{{ asset('images/main/courses-5.jpg') }}" alt="">
                <div class="courses-text">

                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-6">

                        </div>
                            <h3 class="text-center text-white px-4">Sports Event</h3>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >

                    </div>
                </div>
            </div>
            <div class="courses-item position-relative">
                <img class="img-fluid" src="{{ asset('images/main/courses-6.jpg') }}" alt="">
                <div class="courses-text">

                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-6">

                        </div>
                            <h3 class="text-center text-white px-4">Learning Classes</h3>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >

                    </div>
                </div>
            </div>

            <div class="courses-item position-relative">
                <img class="img-fluid" src="{{ asset('images/main/courses-7.jpg') }}" alt="">
                <div class="courses-text">

                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-6">

                        </div>
                            <h3 class="text-center text-white px-4">Earthquake Drill</h3>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >

                    </div>
                </div>
            </div>

                <div class="courses-item position-relative">
                <img class="img-fluid" src="{{ asset('images/main/courses-8.jpg') }}" alt="">
                <div class="courses-text">

                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-6">

                        </div>
                            <h3 class="text-center text-white px-4">Christmas Party</h3>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >

                    </div>
                </div>
            </div>
            <div class="courses-item position-relative">
                <img class="img-fluid" src="{{ asset('images/main/courses-9.jpg') }}" alt="">
                <div class="courses-text">

                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-6">

                        </div>
                            <h3 class="text-center text-white px-4">Gr-10 Teachers</h3>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >

                    </div>
                </div>
            </div>


        </div>



                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->
    <div class="container-fluid  py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">

                        <h4 class="display-3">Enrollment Focal Person</h4>
                    </div>
                        <h4 class="display-8">Junior High School Department</h4>
                    <ul>
                                    <b><li>Grade 7- Maria Fatima A. Malasan</li>
                                    <li>Grade 8- Joel M.Beltran</li>
                                    <li>Grade 9- Gisselle G.Solomon</li>
                                    <li>Grade 10- Norma V. Dela Cruz</li>


                                    </ul></b>
                    <div class="d-flex mb-3">

                        <div class="mt-n1">
                            <h4></h4>
                            <p class="m-0"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('images/main/shs.webp') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Team Start -->
    <div class="container-fluid bg-image py-5">
        <div class="container py-5">
            <div class="section-title text-center position-relative mb-5">

                <h3 class="display-5">AIS FAMILY</h3>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/team-1.jpg') }}" alt="">
                    <div class=" text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/team-2.jpg') }}" alt="">
                    <div class=" text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/team-3.jpg') }}" alt="">
                    <div class=" text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/team-4.png') }}" alt="">
                    <div class="text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
                    <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/team-5.png') }}" alt="">
                    <div class="text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
                    <div class="team-item">
                    <img class="img-fluid w-100" src="{{ asset('images/main/team-6.png') }}" alt="">
                    <div class="text-center p-4">
                        <h5 class="mb-3"></h5>
                        <p class="mb-2"></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->




    <!-- Contact Start -->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('images/main/contactus.gif') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-2">
                        <h4 class="d-inline-block position-relative text-warning text-uppercase pb-2">Contact Us</h4>

                    </div>
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 650px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>

                            <div class="mt-n1">
                                <h4>Our Location</h4>
                                <p class="m-0">Barangay Agdao, San Carlos City, Pangasinan</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Call Us</h4>
                                <p class="m-0">(075) 649 3099</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email Us</h4>
                                <p class="m-0">scc.agdaointegratedschool@gmail.com</p>

                            </div>



                    </div>
                </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->



    @endsection
