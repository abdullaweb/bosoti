@extends('frontend.master')

@section('frontend_title', 'Home | Royal Power Link')

@section('frontend_content')

    <!-- contact-banner -->
    <section class="contact-banner centred" style="background-image: url(/frontend/images/background/page-title-10.jpg);">
        <div class="container">
            <div class="content-box mt-5">
                <h1>{{ $powerSolution->title }}</h1>
            </div>
        </div>
    </section>
    <!-- contact-banner end -->

    <!-- about-style-six -->
    <section class="about-style-six">
        <div class="lower-content">
            <div class="container">
                @if ($powerSolution)
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column mb-3">
                            <img src="{{ asset($powerSolution->power_image) }}" alt="" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content-box">
                                <div class="text text-justify">
                                    {!! $powerSolution->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="no-about text-center pb-5">
                            <h2>Please Add Content!</h2>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- about-style-six end -->

@endsection
