@extends('frontend.master')

@section('frontend_title', 'Home | Royal Power Link')

@section('frontend_content')

    <!-- contact-banner -->
    <section class="contact-banner centred" style="background-image: url(/frontend/images/background/page-title-10.jpg);">
        <div class="container">
            <div class="content-box mt-5">
                    <h1>Power Solution</h1>
            </div>
        </div>
    </section>
    <!-- contact-banner end -->

    <!-- shop-style-two -->
    <section class="shop-style-two">
        <div class="container">
            <div class="lower-box centred">
                <div class="row">
                    @if (count($powerSolutions) > 0)
                        @foreach ($powerSolutions as $power)
                            <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                <div class="shop-block-two">
                                    <div class="inner-box">
                                        <div class="image-holder">
                                            <a href="{{ route('frontend.power.details', $power->slug) }}">
                                                <figure class="image-box"><img
                                                        src="{{ asset($power->power_image) }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="lower-content">
                                            <h4><a
                                                    href="{{ route('frontend.power.details', $power->slug) }}">{{ $power->title }}</a>
                                            </h4>
                                            <div class="btn-box"><a
                                                    href="{{ route('frontend.power.details', $power->slug) }}">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @else
                         <div class="col-md-12">
                            <div class="no-product text-center pb-5">
                                <h1>No Power Solution Found!</h1>
                            </div>
                         </div>

                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- shop-style-two end -->

@endsection
