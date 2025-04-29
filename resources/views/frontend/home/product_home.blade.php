@php
    $products = App\Models\Product::latest()->take(3)->get();
@endphp
{{-- <style>
    .hover-text span, p{
        color: #fff !important;
    }
</style> --}}
{{-- <section class="project-style-two">
    <div class="container">
        <div class="sec-title centred">
            <h1>Industry Project</h1>
        </div>
        <div class="row">
            @foreach ($projects as $key => $project)
            <div class="col-lg-4 col-md-6 col-sm-12 project-block">
                <div class="project-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset($project->project_image) }}" alt="{{ $project->project_title }}">
                            </figure>
                            <a href="{{ asset($project->project_image) }}" class="lightbox-image"
                                data-fancybox="gallery"><i class="flaticon-add"></i></a>
                        </div>
                        <div class="lower-content">
                            <div class="count-number">{{ $key + 1 }}</div>
                            <h3><a href="#">{{ $project->project_title }}</a></h3>
                            <div class="text-light text-justify hover-text">
                                {!! $project->project_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}


<section class="shop-style-two" style="background: #f1f1f1; padding: 40px 0px 60px 0px;">
    <div class="sec-title centred mb-5 pt-1">
        <h1>Product</h1>
    </div>
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