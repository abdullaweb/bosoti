@extends('frontend.master')

@section('frontend_title')
    <title>About us - Bosoti Real Estate</title>
    <meta name="description" content="">
@endsection

@section('frontend_content')
 <!--Page Banner Section start-->
 <div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">About us</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">About us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Page Banner Section end-->

<!-- Welcome Bosoti   -->
<div class="feature-section feature-section-border-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
    <div class="container">
        <div class="row row-25 align-items-center">
           
            <!--Feature Image start-->
            <div class="col-lg-6 col-12 order-1 order-lg-2 mb-40 fade-left-scroll">
                <div class="feature-image"><img src="{{ asset($about_us->about_us_image) }}" alt=""></div>
            </div>
            <!--Feature Image end-->
            
            <div class="col-lg-6 col-12 order-2 order-lg-1 mb-40 fade-left-scroll">
                
                <div class="row">
                    <div class="col">
                        <div class="about-content text-justify">
                            {!! $about_us->description !!}
                            
                            <ul class="feature-list">
                                <li>
                                    <i class="pe-7s-piggy"></i>
                                    <h4>Low Cost</h4>
                                </li>
                                <li>
                                    <i class="pe-7s-science"></i>
                                    <h4>Modern Design</h4>
                                </li>
                                <li>
                                    <i class="pe-7s-display1"></i>
                                    <h4>Good Marketing</h4>
                                </li>
                                <li>
                                    <i class="pe-7s-signal"></i>
                                    <h4>Free Wifi</h4>
                                </li>
                                <li>
                                    <i class="pe-7s-map"></i>
                                    <h4>Easy to Find</h4>
                                </li>
                                <li>
                                    <i class="pe-7s-shield"></i>
                                    <h4>Reliable</h4>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
<!--Welcome Khonike - Real Estate Bootstrap 5 Templatesection end-->

<!--Testimonial Section start-->
<div class="testimonial-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
       
        <!--Section Title start-->
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="section-title center">
                    <h1>What Client's Say</h1>
                </div>
            </div>
        </div>
        <!--Section Title end-->
        
        <div class="row">
           
            <!--Review start-->
            <div class="review-slider section">
                
                <div class="review col fade-left-scroll">
                    <div class="review-inner">
                        <div class="image"><img src="frontend/assets/images/review/review-1.jpg" alt=""></div>
                        <div class="content">
                            <p>Khonike - Real Estate Bootstrap 5 Templatethe best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit.</p>
                            <h6>John Carlson - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col fade-left-scroll">
                    <div class="review-inner">
                        <div class="image"><img src="frontend/assets/images/review/review-2.jpg" alt=""></div>
                        <div class="content">
                            <p>Khonike - Real Estate Bootstrap 5 Templatethe best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit.</p>
                            <h6>Virginia Henry - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col fade-left-scroll">
                    <div class="review-inner">
                        <div class="image"><img src="frontend/assets/images/review/review-3.jpg" alt=""></div>
                        <div class="content">
                            <p>Khonike - Real Estate Bootstrap 5 Templatethe best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit.</p>
                            <h6>Emma Romero - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col fade-left-scroll">
                    <div class="review-inner">
                        <div class="image"><img src="frontend/assets/images/review/review-4.jpg" alt=""></div>
                        <div class="content">
                            <p>Khonike - Real Estate Bootstrap 5 Templatethe best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit.</p>
                            <h6>Russell Ortiz - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col fade-left-scroll">
                    <div class="review-inner">
                        <div class="image"><img src="frontend/assets/images/review/review-5.jpg" alt=""></div>
                        <div class="content">
                            <p>Khonike - Real Estate Bootstrap 5 Templatethe best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit.</p>
                            <h6>Carol Palmer - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col fade-in-scroll">
                    <div class="review-inner">
                        <div class="image"><img src="frontend/assets/images/review/review-6.jpg" alt=""></div>
                        <div class="content">
                            <p>Khonike - Real Estate Bootstrap 5 Templatethe best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit.</p>
                            <h6>David Herrera - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
            </div>
            <!--Review end-->
            
        </div>
    </div>
</div>
<!--Testimonial Section end-->
@endsection
