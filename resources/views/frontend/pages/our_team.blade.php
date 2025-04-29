@extends('frontend.master')

@section('frontend_title', 'Our Services | Mohammad A Zaman - Chartered Accountants')

@section('frontend_content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('frontend/img/cover_team.jpg') }});">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h1 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Team</h1>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="breadcrumb-item active text-custom-color">Team</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Team Start -->
    <div class="container-fluid team py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">

                {{-- @foreach ($team as $item)
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <div class="team-img rounded-top h-100">
                            <img src="{{ asset($item->team_image) }}" class="img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="team-content text-center border border-primary border-top-0 rounded-bottom p-4">
                            <h5>{{ $item->name }}</h5>
                            <p class="mb-0">{{ $item->designation }}</p>
                        </div>
                    </div>
                </div>
                @endforeach --}}

                @for ($i = 0; $i < 7; $i++)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded">
                            <div class="team-img rounded-top h-100">
                                <img src="{{ url('uploads/our_team/1813629474410820.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                            </div>
                            <div class="team-content text-center border border-primary border-top-0 rounded-bottom p-4">
                                <h5>Mohammad A Zaman</h5>
                                <p class="mb-0">Co. Chartered Accountants</p>
                            </div>
                        </div>
                    </div>
                @endfor


            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection
