@extends('layouts.guest')
@section('guest')


<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center my-5 py-5">

        <h1 class="text-white display-1 mb-4"></h1>
          <div class="mx-auto mb-3" style="width: 100%; max-width: 800px;">
        <h3 class="text-white mt-8 mb-8"></h3>

            <div class="input-group">
                <div class="input-group-prepend">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- About Start -->

<div class="container-fluid py-1">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{ asset('images/main/about.png') }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-title position-relative mb-2">
                    <h2 class="d-inline-block position-relative text-warning text-uppercase pb-2">About Us</h2>
                    <h3 class="display-8">VISION</h3>
                </div>
                <p>We dream of Filipinos who passionately love their country and whose values and competencies enable them to realize their full potential and contribute meaningfully to building the nation. As a learner-centered public institution, the Department of Education continuously improves itself to better serve its stakeholders.</p>
                  <h3 class="display-8">MISSION</h3>

                <p>To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where: Students learn in a child-friendly, gender-sensitive, safe, and motivating environment. Teachers facilitate learning and constantly nurture every learner. Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen. Family, community, and other stakeholders are actively engaged and share responsibility for developing life-long learners.</p>
                  <h3 class="display-8">CORE VALUES</h3>

                <ul>
                                <li>Maka-Diyos</li>
                                <li>Maka-tao</li>
                                <li>Makakalikasan</li>
                                <li>Makabansa</li>


                               </ul>
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
<!-- Feature Start -->

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


@endsection
