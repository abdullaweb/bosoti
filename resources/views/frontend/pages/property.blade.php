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
               
                <!--Property start-->
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="{{ asset('frontend/assets/images/property/property-1.jpg') }}" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="{{ asset('frontend/assets/images/icons/bed.png') }}" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="{{ asset('frontend/assets/images/icons/bath.png') }}" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="{{ asset('frontend/assets/images/icons/parking.png') }}" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Friuli-Venezia Giulia</a></h3>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">Feature</span>
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="{{ asset('frontend/assets/images/property/property-2.jpg') }}" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="{{ asset('frontend/assets/images/icons/bed.png') }}" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="{{ asset('frontend/assets/images/icons/bath.png') }}" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="{{ asset('frontend/assets/images/icons/parking.png') }}" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Marvel de Villa</a></h3>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">popular</span>
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-3.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="frontend/assets/images/icons/area.png" alt="">550 SqFt</span>
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
                                <h3 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Ruposi Bangla Cottage</a></h3>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-4.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="frontend/assets/images/icons/area.png" alt="">550 SqFt</span>
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
                                <h3 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">MayaKanon de Villa</a></h3>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-5.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="frontend/assets/images/icons/area.png" alt="">550 SqFt</span>
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
                                <h3 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Azorex de South Villa</a></h3>
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
               
                <!--Property start-->
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">Feature</span>
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-6.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="frontend/assets/images/icons/area.png" alt="">550 SqFt</span>
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
                                <h3 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Radison de Villa</a></h3>
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">12 1st Ave, New Yourk</span>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-7.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="frontend/assets/images/icons/area.png" alt="">550 SqFt</span>
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
                                <h3 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Friuli-Venezia Giulia</a></h3>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">Feature</span>
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-8.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="frontend/assets/images/icons/area.png" alt="">550 SqFt</span>
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
                                <h3 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Marvel de Villa</a></h3>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40 fade-left-scroll">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">popular</span>
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-9.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="frontend/assets/images/icons/area.png" alt="">550 SqFt</span>
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
                                <h3 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Ruposi Bangla Cottage</a></h3>
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
                
            </div>
            
        </div>
    </div>
    <!--New property section end-->
@endsection
