@php
    $sliders = App\Models\Slider::get();
@endphp

<div class="hero-section section position-relative">

    <!--Hero Slider start-->
    <div class="hero-slider section">

        <!--Hero Item start-->
        @foreach ($sliders as $slider)
            <div class="hero-item" style="background-image: url({{ asset($slider->slider_image) }})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!--Hero Content start-->
                            <div class="hero-property-content text-center">
                                <h1 class="title"><a href="single-properties.html">{{ $slider->title }}</a></h1>
                                <span class="location">
                                    {{ $slider->link }}
                                </span>
                            </div>
                            <!--Hero Content end-->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!--Hero Item end-->
    </div>
    <!--Hero Slider end-->

</div>
