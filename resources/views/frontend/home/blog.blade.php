<div class="container-fluid blog py-5">

    <div class="container py-5">

        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">Our Blog</h4>
            </div>
        </div>

        @if (count($blog) > 0)

            <div class="row g-4 justify-content-center">

                @foreach ($blog as $item)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item rounded">
                            <a href="{{ route('frontend.blog.details', $item->slug) }}">
                                <div class="blog-img">
                                    <img src="{{ asset($item->blogDetail->blog_image) }}" class="img-fluid w-100" alt="Image">
                                </div>
                            </a>
                            <div class="blog-centent p-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <p class="mb-0 text-muted"><i class="fa fa-calendar-alt text-primary"></i> {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</p>
                                    <a href="#!" class="text-muted"><span class="fa fa-comments text-primary"></span> 3 Comments</a>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 text-muted"><i class="fa fa-tag text-primary"></i> {{ $item->blogDetail->category->name }}</p>
                                </div>
                                <a href="{{ route('frontend.blog.details', $item->slug) }}" class="h4">{{ $item->title }}</a>
                                <p class="my-4 text-justify">{{ Str::limit($item->blogDetail->short_description, 150) }}</p>
                                <a href="{{ route('frontend.blog.details', $item->slug) }}" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-1">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a href="{{ route('frontend.blog.list') }}" class="btn btn-primary rounded-pill text-white py-3 px-5">View All Blog</a>
                </div>

            </div>
        @else
            <div class="row g-4 justify-content-center">
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <p class="mb-0">No blog available yet.</p>
                </div>
            </div>

        @endif

    </div>

</div>
