@extends('frontend.master')

@section('frontend_title')
    <title>Property Details - Bosoti Real Estate</title>
    <meta name="description" content="">
@endsection

@section('frontend_content')
<div class="page-banner-section section" style="background-image: url({{ asset('frontend/assets/images/bg/single-property-bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">{{ $property->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{{ $property->name }}</li>
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
        
            <div class="col-lg-8 col-12 order-1 mb-sm-50 mb-xs-50">
                <div class="row">

                    <!--Property start-->
                    <div class="single-property col-12 mb-50 fade-left-scroll">
                        <div class="property-inner">
                           
                            <div class="head">
                                <div class="left">
                                    <h1 class="title">{{ $property->name }}</h1>
                                    <span class="location"><img src="{{ asset('frontend/assets/images/icons/marker.png') }}" alt="">{{ $property->location->address }}</span>
                                </div>
                            </div>
                            
                            <div class="image mb-30">
                                <img src="{{ asset($property->property_image) }}" alt="">
                            </div>
                            
                            <div class="content">
                                
                                <h3>Description</h3>
                                
                                <div>{!! $property->description !!}</div>
                                
                                <div class="row mt-30 mb-30">
                                    
                                    <div class="col-md-5 col-12 mb-xs-30">
                                        <h3>Condition</h3>
                                        <ul class="feature-list">
                                            <li><div class="image"><img src="{{ asset('frontend/assets/images/icons/area.png') }}" alt=""></div>Area {{ $property->propertyUnit->area_sqft }} sqft</li>
                                            <li><div class="image"><img src="{{ asset('frontend/assets/images/icons/bed.png') }}" alt=""></div>Bedroom {{ $property->propertyUnit->bedrooms }}</li>
                                            <li><div class="image"><img src="{{ asset('frontend/assets/images/icons/bath.png') }}" alt=""></div>Bathroom {{ $property->propertyUnit->bathrooms }}</li>
                                            <li><div class="image"><img src="{{ asset('frontend/assets/images/icons/parking.png') }}" alt=""></div>Parking {{ $property->propertyUnit->floor }}</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="col-md-7 col-12">
                                        <h3>Amenities</h3>
                                        <ul class="amenities-list">
                                            <li>Air Conditioning</li>
                                            <li>Bedding</li>
                                            <li>Balcony</li>
                                            <li>Cable TV</li>
                                            <li>Internet</li>
                                            <li>Parking</li>
                                            <li>Lift</li>
                                            <li>Pool</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 mb-30">
                                        <h3>Video</h3>
                                        <div class="embed-responsive ratio ratio-16x9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8CbvItGX7Vk"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h3>Location</h3>
                                        <div class="embed-responsive ratio ratio-16x9">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.401573467631!2d90.36740127502561!3d23.80431518670498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d6aaa2cb19%3A0xb24da85cafcddc26!2z4Kao4KeH4Kas4KeB4Kay4Ka-IOCmhuCmh-Cmn-Cmvw!5e0!3m2!1sbn!2sbd!4v1745909805235!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--Property end-->

                </div>
            </div>
            
            <div class="col-lg-4 col-12 order-2 pl-30 pl-sm-15 pl-xs-15 fade-left-scroll">
                <!--Sidebar start-->
                <div class="sidebar">
                    <h4 class="sidebar-title"><span class="text">Latest Property</span><span class="shape"></span></h4>
                    
                    <!--Sidebar Property start-->
                    <div class="sidebar-property-list">
                        @foreach ($propertyLatest as $properties)
                        <div class="sidebar-property">
                            <div class="image">
                                <span class="type">{{ $properties->propertyUnit->unit_type }}</span>
                                <a href="{{ route('frontend.property.details', $properties->slug) }}"><img src="{{ asset($properties->property_image) }}" alt=""></a>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="{{ route('frontend.property.details', $properties->slug) }}">{{ $properties->name }}</a></h5>
                                <span class="location"><img src="{{ asset('frontend/assets/images/icons/marker.png') }}" alt="">{{ $properties->location->address }}</span>
                            </div>
                        </div>
                        @endforeach
                        
                        {{-- <div class="sidebar-property">
                            <div class="image">
                                <span class="type">For Sale</span>
                                <a href="single-properties.html"><img src="{{ asset('frontend/assets/images/property/sidebar-property-2.jpg') }}" alt=""></a>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="single-properties.html">Marvel de Villa</a></h5>
                                <span class="location"><img src="{{ asset('frontend/assets/images/icons/marker.png') }}" alt="">450 E 1st Ave, New Palton</span>
                                <span class="price">$2550</span>
                            </div>
                        </div>
                        
                        <div class="sidebar-property">
                            <div class="image">
                                <span class="type">For Rent</span>
                                <a href="single-properties.html"><img src="{{ asset('frontend/assets/images/property/sidebar-property-3.jpg') }}" alt=""></a>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="single-properties.html">Ruposi Bangla Cottage</a></h5>
                                <span class="location"><img src="{{ asset('frontend/assets/images/icons/marker.png') }}" alt="">215 L AH Rod, California</span>
                                <span class="price">$550 <span>Month</span></span>
                            </div>
                        </div> --}}
                        
                    </div>
                    <!--Sidebar Property end-->
                    
                </div>
        
            </div>
            
        </div>
    </div>
</div>
<!--New property section end-->
@endsection
