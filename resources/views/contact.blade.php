@extends('layouts.guest')
@section('guest')

<div class="container-fluid bg-image py-1">

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
                <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 700px;">
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

@endsection
