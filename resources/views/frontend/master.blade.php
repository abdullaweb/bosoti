<!doctype html>
<html class="no-js" lang="zxx">

@include('frontend.body.head')

<body>

    <div id="main-wrapper">

        <!--Header section start-->
        @include('frontend.body.header')
        <!--Header section end-->


        @yield('frontend_content')

        <!--Footer section start-->
        @include('frontend.body.footer')
        <!--Footer section end-->
    </div>

    @include('frontend.body.script')

</body>

</html>
