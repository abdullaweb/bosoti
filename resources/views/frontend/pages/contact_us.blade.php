@extends('frontend.master')

@section('frontend_title')
    <title>Contact Us - Bosoti Real Estate</title>
    <meta name="description" content="">
@endsection

@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Contact us</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--New property section start-->
    <div class="contact-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">

                <div class="col-12 mb-50">
                    <div class="embed-responsive embed-responsive-21by9">
                        <div id="contact-map" class="embed-responsive-item contact-map" data-lat="40.730610" data-Long="-73.935242"></div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-md-4 fade-left-scroll">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="contact-info">
                                        <i class="pe-7s-map"></i>
                                        <h4>Address</h4>
                                        <p class="text-center">256, 1st AVE, Manchester 125, Noth England</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 fade-left-scroll">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="contact-info">
                                        <i class="pe-7s-phone"></i>
                                        <h4>Phone</h4>
                                        <p class="text-center"><a href="#">+012 345 678 101</a><a href="#">+012 345 678 102</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 fade-left-scroll">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="contact-info">
                                        <i class="pe-7s-global"></i>
                                        <h4>Email & Website</h4>
                                        <p class="text-center"><a href="mailto:info@example.com">info@example.com</a></p>
                                        <p class="text-center"><a href="http://www.example.com" target="_blank">www.example.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--New property section end-->

    <!--New property section start-->
    <div class="contact-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50 fade-left-scroll">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Leave a Message</h1>
                        <div class="underline"></div>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row">

                <div class="contact-form-wrap col-12">
                    <div class="contact-form">
                        <form id="contact-form" action="#">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-30"><input name="name" type="text" placeholder="Name"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="email" type="email" placeholder="Email"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="phone" type="text" placeholder="Phone"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="subject" type="text" placeholder="Subject"></div>
                                <div class="col-12 mb-30">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12 text-center"><button class="btn">submit</button></div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--New property section end-->
@endsection
