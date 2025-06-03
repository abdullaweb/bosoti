@extends('frontend.master')

@section('frontend_title')
    <title>Our Properties - Bosoti Real Estate</title>
    <meta name="description" content="">
@endsection

@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Properties</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Properties</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <div class="row">
               
                @foreach ($properties as $property)
                <!--Property start-->
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('frontend.property.details', $property->slug) }}"><img src="{{ asset($property->property_image) }}" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}" alt="">{{ $property->propertyUnit->area_sqft }} SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="{{ asset('frontend/assets/images/icons/bed.png') }}" alt="">{{ $property->propertyUnit->bedrooms }}</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="{{ asset('frontend/assets/images/icons/bath.png') }}" alt="">{{ $property->propertyUnit->bathrooms }}</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="{{ asset('frontend/assets/images/icons/parking.png') }}" alt="">{{ $property->propertyUnit->floor }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="{{ route('frontend.property.details', $property->slug) }}">{{ $property->name }}</a></h3>
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">{{ $property->location->address }}</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                     <span class="price">{{ $property->propertyUnit->price }}<span>M</span></span>
                                    <span class="type">{{ $property->propertyUnit->unit_type }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->
                @endforeach
                
            </div>
            
        </div>
    </div>
    <!--New property section end-->
@endsection
