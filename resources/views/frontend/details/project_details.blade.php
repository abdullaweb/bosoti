@extends('frontend.master')

@section('frontend_title')
    <title>Project Details - Bosoti Real Estate</title>
    <meta name="description" content="">
@endsection

@section('frontend_content')
<!--Page Banner Section start-->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">Project Details</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Project Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Page Banner Section end-->

<!--Agent Section start-->
<div class="agent-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    <div class="container">
        
        <div class="row row-25 align-items-center">

            <!--Agent Image-->
            <div class="col-lg-5 col-12 mb-30 fade-left-scroll">
                <div class="agent-image">
                    <img src="{{ asset('frontend/assets/images/projects/project-2.jpg') }}" alt="">
                </div>
            </div>

            <!--Agent Content-->
            <div class="col-lg-7 col-12 fade-left-scroll">
                <div class="agent-content">
                    {!! $project->description !!}
                    <div class="row">
                        <div class="col-md-6 col-12 mb-30">
                            <h4>Address Info</h4>
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i>{{ $project->location->city }}</li>
                                <li><i class="fas fa-flag"></i>{{ $project->location->country }}</li>
                                <li><i class="fas fa-network-wired"></i>{{ $project->location->state }}</li>
                                <li><i class="fas fa-map-marker-alt"></i>{{ $project->location->latitude }}</li>
                                <li><i class="fas fa-map-marker-alt"></i>{{ $project->location->longitude }}</li>
                            </ul>
                        </div>
                        @if ($projectUnitDetails)   
                        <div class="col-md-6 col-12 mb-30">
                            <h4>Unit Details</h4>
                            <ul>
                                <li>
                                    <i class="fas fa-home"></i>Unit Type: &nbsp; <span>{{ $projectUnitDetails->unit_type }}</span>
                                </li>
                                <li><i class="fas fa-expand-arrows-alt"></i>Unit Size: &nbsp; &nbsp;  <span>{{ $projectUnitDetails->area_sqft }} SqFt</span></li>
                                <li><i class="fas fa-bed"></i>Bedrooms: &nbsp; <span>{{ $projectUnitDetails->bedrooms }}</span></li>
                                <li><i class="fas fa-shower"></i>Bathrooms: &nbsp;<span>{{ $projectUnitDetails->bathrooms }}</span></li>
                                <li><i class="fas fa-car"></i>Floor: &nbsp; <span>{{ $projectUnitDetails->floor }}</span></li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
<!--Agent Section end-->

<!--Feature property section start-->
<div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        
        <!--Section Title start-->
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="section-title center">
                    <h1>Related Projects</h1>
                    <div class="underline"></div>
                </div>
            </div>
        </div>
        <!--Section Title end-->
        
        <div class="row">
           
            <!--Property Slider start-->
            <div class="property-carousel section slider-space-30">

                <!--Property start-->
                <div class="property-item col fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('frontend.project.details', 'project-details') }}"><img src="{{ asset('frontend/assets/images/projects/project-1.jpg') }}" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="{{ asset('frontend/assets/images/icons/bed.png') }}" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="frontend/assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="frontend/assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Friuli-Venezia Giulia</a></h3>
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">568 E 1st Ave, Miami</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$550<span>M</span></span>
                                    <span class="type">For Rent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

                <!--Property start-->
                <div class="property-item col fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">Feature</span>
                            <a href="{{ route('frontend.project.details', 'project-details') }}"><img src="{{ asset('frontend/assets/images/projects/project-3.jpg') }}" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="frontend/assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="frontend/assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="frontend/assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Marvel de Villa</a></h3>
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">450 E 1st Ave, New Jersey</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$2550</span>
                                    <span class="type">For Sale</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

                <!--Property start-->
                <div class="property-item col fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">popular</span>
                            <a href="{{ route('frontend.project.details', 'project-details') }}"><img src="{{ asset('frontend/assets/images/projects/project-4.jpg') }}" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="frontend/assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="frontend/assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="frontend/assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Ruposi Bangla Cottage</a></h3>
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">215 L AH Rod, California</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$550<span>M</span></span>
                                    <span class="type">For Rent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

                <!--Property start-->
                <div class="property-item col fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('frontend.project.details', 'project-details') }}"><img src="{{ asset('frontend/assets/images/projects/project-5.jpg') }}" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="frontend/assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="frontend/assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="frontend/assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">MayaKanon de Villa</a></h3>
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">12 EA 1st Ave, Washington</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$550<span>M</span></span>
                                    <span class="type">For Rent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

                <!--Property start-->
                <div class="property-item col fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('frontend.project.details', 'project-details') }}"><img src="{{ asset('frontend/assets/images/projects/project-6.jpg') }}" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="frontend/assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="frontend/assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="frontend/assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="{{ route('frontend.project.details', 'project-details') }}">Azorex de South Villa</a></h3>
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">668 L 2nd Ave, Boston</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$2550</span>
                                    <span class="type">For Sale</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

            </div>
            <!--Property Slider end-->
            
        </div>
        
    </div>
</div>
<!--Feature property section end-->
@endsection