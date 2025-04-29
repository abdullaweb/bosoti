@extends('frontend.master')

@section('frontend_title')
    <title>Our Projects - Bosoti Real Estate</title>
    <meta name="description" content="">
@endsection

@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Our Project</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Projects</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--Agency Section start-->
    <div class="agency-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <div class="row">

                <!--Agencies satrt-->
                <div class="col-lg-4 col-sm-6 col-12 mb-30 fade-left-scroll">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="{{ route('frontend.project.details', 'project-details') }}"><img src="frontend/assets/images/projects/project-9.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Royao Estates</a></h4>
                            <span>Gulshan</span>
                        </div>
                    </div>
                </div>
                <!--Agencies end-->

                <!--Agencies satrt-->
                <div class="col-lg-4 col-sm-6 col-12 mb-30 fade-left-scroll">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="{{ route('frontend.project.details', 'project-details') }}"><img src="frontend/assets/images/projects/project-3.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Luzury Homes</a></h4>
                            <span>Mirpur</span>
                        </div>
                    </div>
                </div>
                <!--Agencies end-->

                <!--Agencies satrt-->
                <div class="col-lg-4 col-sm-6 col-12 mb-30 fade-left-scroll">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="{{ route('frontend.project.details', 'project-details') }}"><img src="frontend/assets/images/projects/project-4.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Duplex Estates</a></h4>
                            <span>Banani</span>
                        </div>
                    </div>
                </div>
                <!--Agencies end-->

                <!--Agencies satrt-->
                <div class="col-lg-4 col-sm-6 col-12 mb-30 fade-left-scroll">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="{{ route('frontend.project.details', 'project-details') }}"><img src="frontend/assets/images/projects/project-8.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Global Homes</a></h4>
                            <span>Baridhara</span>
                        </div>
                    </div>
                </div>
                <!--Agencies end-->

                <!--Agencies satrt-->
                <div class="col-lg-4 col-sm-6 col-12 mb-30 fade-left-scroll">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="{{ route('frontend.project.details', 'project-details') }}"><img src="frontend/assets/images/projects/project-6.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Green House Homes</a></h4>
                            <span>Uttara</span>
                        </div>
                    </div>
                </div>
                <!--Agencies end-->

                <!--Agencies satrt-->
                <div class="col-lg-4 col-sm-6 col-12 mb-30 fade-left-scroll">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="{{ route('frontend.project.details', 'project-details') }}"><img src="frontend/assets/images/projects/project-7.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Landscape Estates</a></h4>
                            <span>Dhanmondi</span>
                        </div>
                    </div>
                </div>
                <!--Agencies end-->
                
            </div>
            
        </div>
    </div>
    <!--Agency Section end-->
@endsection
