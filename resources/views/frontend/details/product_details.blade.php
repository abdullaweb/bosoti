
@extends('frontend.master')

@section('frontend_title', 'Home | Royal Power Link')

@section('frontend_content')

  <!-- page-title -->

<section class="contact-banner centred" style="background-image: url(/frontend/images/background/page-title-10.jpg);">
    <div class="container">
        <div class="content-box mt-5">
            <h1>{{ $product->title }}</h1>
        </div>
    </div>
</section>
<!-- page-title end -->


<!-- single-shop -->
<section class="single-shop">
    <div class="container">
        <div class="products-details">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <img src="{{ asset($product->productDetail->product_image) }}" alt="" class="img-thumbnail">
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <h3 class="product-price">{{ $product->title }}</h3>
                        <div class="other-info">
                            <div class="categories-box">
                                <ul>
                                    <li><h6><strong>Category:</strong> {{ $product->category->name }}</h6>&nbsp;</li>
                                    <li>{{ $product->productDetail->title }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="lower-content">
                            <div class="text text-justify">
                                {!! $product->productDetail->long_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- single-shop end -->

@endsection
