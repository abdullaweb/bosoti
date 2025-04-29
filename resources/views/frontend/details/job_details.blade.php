@extends('frontend.master')

@section('frontend_title', $job_application->title . ' | Mohammad A Zaman - Chartered Accountants')

@section('frontend_content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('frontend/img/cover_blog_details.jpg') }});">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h1 class="display-4 text-white mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $job_application->title }}</h1>
        </div>
    </div>
    <!-- Header End -->


    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">

                <div class="col-md-8 wow fadeInLeft" data-wow-delay="0.2">
                    <div class="section-title text-start custom_blog_details_left">
                        <img src="{{ asset($job_application->career_image) }}" alt="Blog Image" class="img-fluid mb-4">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="display-6 mb-3">{{ $job_application->title }}</h3>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#!" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Apply For Job</a>
                            </div>
                        </div>
                        <div class="row g-4 mb-5">
                            <div class="custom_description" style="text-align: justify;">
                                <p>{!! $job_application->description !!}</p>
                            </div>
                        </div>
                
                    </div>
                </div>

                <div class="col-md-4 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="sidebar">
                        <div class="sidebar_search widget">
                            <form>
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-transparent" id="search" placeholder="Search..." name="search">
                                    <label for="search">Search...</label>
                                </div>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="sidebar_posts widget">
                            <h4 class="text-dark mb-4">Recent Job</h4>
                            @php
                                $job_applicationss = App\Models\Career::latest()->take(4)->get();
                            @endphp
                            @foreach ($job_applicationss as $item)
                                <div class="sidebar_post_item">
                                    <div class="sidebar_post_item_image">
                                        <a href="{{ route('frontend.career.details', $item->slug) }}"><img src="{{ asset($item->career_image) }}" alt="image" class="img-fluid"></a>
                                    </div>
                                    <div class="sidebar_post_item_content">
                                        <h6><a href="{{ route('frontend.career.details', $item->slug) }}" class="text-dark">{{ $item->title }}</a></h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.job_apply.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="interested_in" required>
                                <option value="">Interested In</option>
                                @if (jobPost()->count() > 0)
                                    @foreach (jobPost() as $job)
                                        <option value="{{ $job->id }}">
                                            {{ $job->title }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="message" rows="3" placeholder="Why you interest to join with us" style="width: 100%"></textarea>
                        </div>
                        {{-- <div class="mb-3">
                            <input type="file" class="form-control" name="job_files" style="background: none">
                            <p class="text-muted mt-3" style="font-size: 14px; color: rgb(23, 162, 184) !important;">accept jpg,pdf,doc & docx only (upto 2MB)</p>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary text-white">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

@endsection
