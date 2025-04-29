@extends('frontend.master')

@section('frontend_title', 'Home | Royal Power Link')

@section('frontend_content')

    <!-- page-title -->
    {{-- <section class="page-title shop-single" style="background-image: url(/frontend/images/background/page-title-4.jpg);">
    <div class="container">
        <div class="content-box">
            <h1>Products</h1>
        </div>
    </div>
</section> --}}
    <!-- page-title end -->

    <!-- contact-banner -->
    <section class="contact-banner centred" style="background-image: url(/frontend/images/background/page-title-10.jpg);">
        <div class="container">
            <div class="content-box mt-5">
                @if ($category)
                    <h1>{{ $category->name ? $category->name : 'Products' }}</h1>
                @else
                    <h1>Products</h1>
                @endif

            </div>
        </div>
    </section>
    <!-- contact-banner end -->

    <!-- shop-style-two -->
    <section class="shop-style-two">
        <div class="container">
            <div class="lower-box centred">
                <div class="row">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            @php
                                $slug = Str::slug($product->category->name);
                            @endphp
                            <div class="col-lg-4 col-md-6 col-sm-12 shop-block mb-4">
                                <div class="shop-block-two">
                                    <div class="inner-box">
                                        <div class="image-holder">
                                            <a href="{{ route('frontend.product.details', $product->slug) }}">
                                                <figure class="image-box"><img
                                                        src="{{ asset($product->productDetail->product_image) }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="lower-content">
                                            <h4><a
                                                    href="{{ route('frontend.product.details', $product->slug) }}">{{ $product->title }}</a>
                                            </h4>
                                            <div class="link-btn"><a
                                                    href="{{ route('frontend.catwise.product.list', $slug) }}">{{ $product->category->name }}</a>
                                            </div>
                                            <div class="btn-box"><a
                                                    href="{{ route('frontend.product.details', $product->slug) }}">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @else
                         <div class="col-md-12">
                            <div class="no-product text-center pb-5">
                                <h1>No Product Found!</h1>
                            </div>
                         </div>

                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- shop-style-two end -->

@endsection
