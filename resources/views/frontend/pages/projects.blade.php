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

    <!--project Section start-->
    <div class="agency-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-lg-4 col-sm-6 col-12 mb-30 fade-left-scroll">
                        <div class="agency">
                            <div class="image">
                                <a class="img" href="{{ route('frontend.project.details', $project->slug) }}"><img src="{{ $project->project_image }}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="{{ route('frontend.project.details', $project->slug) }}">{{ $project->name }}</a></h4>
                                <span>{{ $project->location->city }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--project Section end-->
@endsection
