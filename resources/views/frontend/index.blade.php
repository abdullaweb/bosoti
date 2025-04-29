@extends('frontend.master')

@section('frontend_title')
    <title>Home - Bosoti Real Estate</title>
    <meta name="description" content="">
@endsection

@section('frontend_content')

    <!--Hero Section start-->
    @include('frontend.home.slider')
    <!--Hero Section end-->

     <!--Search Section section start-->
     <div class="search-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50 fade-left-scroll">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Find Your Home</h1>
                        <div class="underline"></div>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            
            <div class="row">
                <div class="col">
                    
                    <!--Property Search start-->
                    <div class="property-search">

                        <form action="#">

                            <div>
                                <select class="nice-select">
                                    <option>All Cities</option>
                                    <option>Athina</option>
                                    <option>Austin</option>
                                    <option>Baytown</option>
                                    <option>Brampton</option>
                                    <option>Cedar Hill</option>
                                    <option>Chester</option>
                                    <option>Chicago</option>
                                    <option>Coleman</option>
                                    <option>Corpus Christi</option>
                                    <option>Dallas</option>
                                    <option>distrito federal</option>
                                    <option>Fayetteville</option>
                                    <option>Galveston</option>
                                    <option>Jersey City</option>
                                    <option>Los Angeles</option>
                                    <option>Midland</option>
                                    <option>New York</option>
                                    <option>Odessa</option>
                                    <option>Reno</option>
                                    <option>San Angelo</option>
                                    <option>San Antonio</option>
                                </select>
                            </div>


                            <div>
                                <select class="nice-select">
                                    <option>Type</option>
                                    <option>Apartment</option>
                                    <option>Cafe</option>
                                    <option>House</option>
                                    <option>Restaurant</option>
                                    <option>Store</option>
                                    <option>Villa</option>
                                </select>
                            </div>

                            <div>
                                <select class="nice-select">
                                    <option>Status</option>
                                    <option>Upcoming</option>
                                    <option>Ongoing</option>
                                    <option>Ready</option>
                                </select>
                            </div>

                            <div>
                                <button>search</button>
                            </div>

                        </form>

                    </div>
                    <!--Property Search end-->
                    
                </div>
            </div>
            
        </div>
    </div>
    <!--Search Section section end-->
    
    <!--Section Title start-->
            <div class="row pt-100">
                <div class="col-md-12 mb-xs-30">
                    <div class="section-title center">
                        <h1>Our Projects</h1>
                        <div class="underline"></div>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
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

    <!--Feature property section start-->
    <div class="property-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50 fade-left-scroll">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Feature Property</h1>
                        <div class="underline"></div>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                <div class="property-carousel section slider-space-30">

                    <!--Property start-->
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-1.jpg" alt=""></a>
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
                                    <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">568 E 1st Ave, Mirpur</span>
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
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <span class="label">Feature</span>
                                <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-2.jpg" alt=""></a>
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
                                    <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">450 E 1st Ave, Uttara</span>
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
                    <div class="property-item col">
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
                                    <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">215 L AH Rod, Banani</span>
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
                    <div class="property-item col">
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
                                    <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">12 EA 1st Ave, Gulshan</span>
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
                    <div class="property-item col">
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
                                    <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">668 L 2nd Ave, Motijheel</span>
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
                    <div class="property-item col">
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
                                    <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">12 1st Ave, Uttara</span>
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
                <!--Property Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--Feature property section end-->

    <!--Services section start-->
    <div class="service-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20 fade-left-scroll">
        <div class="container">
        
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Our Services</h1>
                        <div class="underline"></div>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row row-30 align-items-center">
                <div class="col-lg-5 col-12 mb-30">
                    <div class="property-slider-2">
                        <div class="property-2">
                            <div class="property-inner">
                                <a href="{{ route('frontend.property.details', 'property-details') }}" class="image"><img src="frontend/assets/images/property/property-13.jpg" alt=""></a>
                                <div class="content">
                                    <h4 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Friuli-Venezia Giulia</a></h4>
                                    <span class="location">568 E 1st Ave, Uttara</span>
                                    <h4 class="type">Rent <span>$550 <span>Month</span></span></h4>
                                    <ul>
                                        <li>6 Bed</li>
                                        <li>4 Bath</li>
                                        <li>3 Garage</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="property-2">
                            <div class="property-inner">
                                <a href="{{ route('frontend.property.details', 'property-details') }}" class="image"><img src="frontend/assets/images/property/property-14.jpg" alt=""></a>
                                <div class="content">
                                    <h4 class="title"><a href="{{ route('frontend.property.details', 'property-details') }}">Marvel de Villa</a></h4>
                                    <span class="location">450 E 1st Ave, New Palton</span>
                                    <h4 class="type">Rent <span>$550 <span>Month</span></span></h4>
                                    <ul>
                                        <li>6 Bed</li>
                                        <li>4 Bath</li>
                                        <li>3 Garage</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="row row-20">

                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="frontend/assets/images/service/service-1.png" alt=""></div>
                                        <h4>Buy Property</h4>
                                    </div>
                                    <div class="content">
                                        <p>Bosoti - Real Estate for elit, seddo eiumod tempor dolor sit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->

                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="frontend/assets/images/service/service-2.png" alt=""></div>
                                        <h4>Sale Property</h4>
                                    </div>
                                    <div class="content">
                                        <p>Bosoti - Real Estate  best theme for elit, seddo eiumod tempor dolor sit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->

                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="frontend/assets/images/service/service-3.png" alt=""></div>
                                        <h4>Rent Property</h4>
                                    </div>
                                    <div class="content">
                                        <p>Bosoti - Real Estate  best theme for elit, seddo eiumod tempor dolor sit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->

                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="frontend/assets/images/service/service-4.png" alt=""></div>
                                        <h4>Mortgage Property</h4>
                                    </div>
                                    <div class="content">
                                        <p>Bosoti - Real Estate  best theme for elit, seddo eiumod tempor dolor sit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->

                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--Services section end-->

    <!--New property section start-->
    <div class="property-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10 fade-left-scroll">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Newly Added Property</h1>
                        <div class="underline"></div>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property start-->
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-1.jpg" alt=""></a>
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
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">568 E 1st Ave, Mirpur</span>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">Feature</span>
                            <a href="{{ route('frontend.property.details', 'property-details') }}"><img src="frontend/assets/images/property/property-2.jpg" alt=""></a>
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
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">450 E 1st Ave, Mirpur</span>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
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
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">215 L AH Rod, Mirpur</span>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
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
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">12 EA 1st Ave, Mirpur</span>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
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
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">668 L 2nd Ave, Uttara</span>
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
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
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
                                <span class="location"><img src="frontend/assets/images/icons/marker.png" alt="">12 1st Ave, Uttara</span>
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
    
    <!--Brand section start-->
   @include('frontend.home.client')
    <!--Brand section end-->
@endsection
