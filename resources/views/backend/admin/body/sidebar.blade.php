<div class="main-sidebar sidebar-style-2">

    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">
                <img alt="image" src="{{ asset('frontend/assets/images/bosoti-logo.png') }}" class="header-logo" />
                <span class="logo-name fs-6">Bosoti</span>
            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="menu-header">Main</li>

            <li class="dropdown {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.slider.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="image"></i>
                    <span>Sliders</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.slider.list') }}">Slider List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.about-us.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="user"></i>
                    <span>About Us</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.about-us.list') }}">About Us</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.location.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="map-pin"></i>
                    <span>Location</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.location.list') }}">Location</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.project.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="home"></i>
                    <span>Projects</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.project.list') }}">Projects</a></li>
                    <li><a class="nav-link" href="{{ route('admin.project-unit.list') }}">Project Unit</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.property.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="map-pin"></i>
                    <span>Property</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.property.list') }}">Property</a></li>
                    <li><a class="nav-link" href="{{ route('admin.property-unit.list') }}">Property Unit</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.client.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="users"></i>
                    <span>Clients</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.client.list') }}">Clients</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.contact.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="mail"></i>
                    <span>Contact</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.contact.list') }}">Contact Message List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.setting.font-awesome') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="settings"></i>
                    <span>Settings</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.setting.edit', siteSetting()->id) }}">Site Setting</a></li>
                    {{-- <li><a class="nav-link" href="{{ route('admin.setting.font-awesome') }}">FontAwesome List</a></li> --}}
                </ul>
            </li>

        </ul>

    </aside>

</div>
