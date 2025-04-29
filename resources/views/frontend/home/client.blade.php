@php
    $clients = App\Models\Client::get();
@endphp
<div class="brand-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50 fade-left-scroll">
    <div class="container">
        
        <!--Section Title start-->
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="section-title center">
                    <h1>Our Partners</h1>
                    <div class="underline"></div>
                </div>
            </div>
        </div>
        <!--Section Title end-->

        <div class="row">
            
            <!--Brand Slider start-->
            <div class="brand-carousel section slider-space-30">
                @foreach ($clients as $client)
                    <div class="brand col"><img src="{{ asset($client->client_image) }}" alt="Client Image"></div>
                @endforeach
            </div>
            <!--Brand Slider end-->
            
        </div>
        
    </div>
</div>