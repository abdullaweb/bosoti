@php
  $categories = App\Models\ProductCategory::get();
@endphp

<section class="service-section">

    <div class="container">

        <div class="sec-title centred">
            <h1>Product Category</h1>
        </div>

       <div class="row">

        @if (count($categories) > 0)
            @foreach ($categories as $cat)
            @php
                $slug = Str::slug($cat->name);
            @endphp
            <div class="col-lg-6 col-md-12 col-sm-12 service-block">
                <div class="service-block-one wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="{{ route('frontend.catwise.product.list', $slug) }}"><img src="{{ asset( $cat->cat_image) }}" alt="{{ $cat->name }}"></a></figure>
                        <div class="content-box">
                            <h3><a href="{{ route('frontend.catwise.product.list', $slug) }}">{{ $cat->name }}</a></h3>
                            <div class="text text-justify">{{ $cat->short_description }}</div>
                            <div class="link-btn"><a href="{{ route('frontend.catwise.product.list', $slug) }}">Go Continues<i class="fas fa-arrow-right"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @else
                <div class="col-md-12">
                    <div class="no-cat text-center pb-5">
                        <h4>No Category Found!</h1>
                    </div>
                </div>
        @endif
        </div>
    </div>
</section>
