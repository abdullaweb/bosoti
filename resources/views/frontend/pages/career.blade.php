@extends('frontend.master')

@section('frontend_title', 'Contact Us | Mohammad A Zaman - Chartered Accountants')

@section('frontend_content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('frontend/img/cover_career.jpg') }});">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h1 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Career</h1>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="breadcrumb-item active text-custom-color">Career</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->


    <!-- Career Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="sub-style">
                    <h4 class="sub-title px-3 mb-0">Career Opportunities</h4>
                </div>
            </div>
            <div class="row g-4 justify-content-center">

                @foreach ($career as $item)
                    <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded">
                            <div class="service-img rounded-top">
                                <img src="{{ asset($item->career_image) }}" class="img-fluid rounded-top w-100" style="height: 250px" alt="">
                            </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4 text-center">{{ $item->title }}</h5>
                                    <p class="mb-4 text-center">Open Positions</p>
                                    <a href="{{ route('frontend.career.details', $item->slug) }}" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2 w-100">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Career End -->





    <!-- Chairman Message Start -->
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 wow fadeInLeft" data-wow-delay="0.4s">
                    <div class="section-title text-start mb-5">
                        <h4 class="sub-title pe-3 mb-2">Students & recent graduates</h4>
                        <div class="custom_description">
                            <p class="mb-4">We encourage students and the young minds who dare to challenge the status quo, open for constant learning, upskilling, and have concrete interest in experimenting and experiencing what is to come.</p>
                            <a href="#!" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Apply For Job</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="about-img">
                        <div style="background-image: url('https://img.freepik.com/free-photo/happy-young-business-colleagues-using-laptop-computer-talking-with-each-other_171337-761.jpg?uid=R169242788&ga=GA1.1.1573341222.1728472017&semt=ais_hybrid'); background-size: cover; background-position: top; background-repeat: no-repeat; height: 450px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chairman Message End -->


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
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: 'Your application has been sent successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    timer: 3000
                });
            @endif
        })
    </script>

@endsection
