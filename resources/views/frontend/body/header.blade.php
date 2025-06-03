<header class="header header-sticky">
    <div class="header-bottom menu-center">
        <div class="container">
            <div class="row justify-content-between">

                <!--Logo start-->
                <div class="col mt-10 mb-10">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            {{-- <img src="{{ asset('frontend/assets/images/bosoti-logo.png') }}" alt="Logo" class="w-75"> --}}
                            <img src="{{ asset(siteSetting()->header_logo)  }}" alt="Logo" class="w-75">
                        </a>
                    </div>
                </div>
                <!--Logo end-->

                <!--Menu start-->
                <div class="col d-none d-lg-flex">
                    <nav class="main-menu">
                        <ul>
                            <li class="{{ request()->is('/') ? 'active' : '' }}">
                                <a href="{{ url('/') }}" class="">Home</a>
                            </li>
                            <li class="{{ request()->routeIs('frontend.about-us') ? 'active' : '' }}">
                                <a href="{{ route('frontend.about-us') }}">
                                    About
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('frontend.property.list') ? 'active' : '' }}">
                                <a href="{{ route('frontend.property.list') }}">Properties</a>
                            </li>
                            <li class="{{ request()->routeIs('frontend.project.list') ? 'active' : '' }}">
                                <a href="{{ route('frontend.project.list') }}">Projects</a>
                            </li>
                            <li class="{{ request()->routeIs('frontend.contact-us') ? 'active' : '' }}">
                                <a href="{{ route('frontend.contact-us') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--Menu end-->

                <!--User start-->
                <div class="col mr-sm-50 mr-xs-50 d-none">
                    <div class="header-user">
                        <a href="login-register.html" class="user-toggle"><i class="pe-7s-user"></i><span>Login or Register</span></a>
                    </div>
                </div>
                <!--User end-->
            </div>

            <!--Mobile Menu start-->
            <div class="row">
                <div class="col-12 d-flex d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
            <!--Mobile Menu end-->

        </div>
    </div>
</header>
