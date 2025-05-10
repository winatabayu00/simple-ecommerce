<!-- Modal Menu Mobile -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-menu-mobile">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header-title">
                    <div class="logo-menu">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/logos/Pasar_Solar.png') }}" class="logo-dark" alt="logo" width="150">
                        </a>
                    </div>
                    <button type="button" class="close-menu" data-dismiss="modal" aria-label="Close">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 22.5C17.5 22.5 22 18 22 12.5C22 7 17.5 2.5 12 2.5C6.5 2.5 2 7 2 12.5C2 18 6.5 22.5 12 22.5Z"
                                stroke="#E1E1E1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.16992 15.3299L14.8299 9.66992" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round" />
                            <path d="M14.8299 15.3299L9.16992 9.66992" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="modal-body pb-0">
                <div class="navbar-collapse mobile-menu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav__item {{ request()->is('/') ? 'current' : '' }} ">
                            <a href="{{ url('/') }}" class="nav__item-link">
                                {{ __('dashboard') }}                    </a>
                        </li>
                        <li class="nav__item {{ request()->is('about') ? 'current' : '' }}">
                            <a href="{{ url('/about') }}" class="nav__item-link">
                                {{ __('about_us') }}                    </a>
                        </li>
                        <li class="nav__item {{ request()->is('product') ? 'current' : '' }}">
                            <a href="{{ url('/product') }}" class="nav__item-link">
                                {{ __('product') }}                    </a>
                        </li>
                        <li class="nav__item {{ request()->is('services') ? 'current' : '' }} ">
                            <a href="{{ url('/services') }}" class="nav__item-link">
                                {{ __('service') }}                    </a>
                        </li>
                        <li class="nav__item {{ request()->is('coverages') ? 'current' : '' }}">
                            <a href="{{ url('/coverages') }}" class="nav__item-link">
                                {{ __('coverage') }}                    </a>
                        </li>
                        <li class="nav__item {{ request()->is('article') ? 'current' : '' }}">
                            <a href="{{ url('/article') }}" class="nav__item-link">
                                {{ __('article') }}                    </a>
                        </li>
                        <li class="nav__item {{ request()->is('contact-us') ? 'current' : '' }}">
                            <a href="{{ url('/contact-us') }}" class="nav__item-link">
                                {{ __('contact_us') }}                    </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="modal-footer mb-5">
                <div class="modal-footer-title">
                    <select class="form-control mb-5 lang" id="dynamic_select2" data-url="{{ url('') }}">
                        <option value="en" data-image="{{ asset('/images/lang/flag-en.png') }}" @selected(session('app_locale') == 'en')>English</option>
                        <option value="id" data-image="{{ asset('/images/lang/flag-id.png') }}" @selected(session('app_locale') == 'id')>Indonesia</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header -->
<header id="header" class="header header-white header-full">
    <nav class="navbar navbar-expand-lg sticky-navbar d-none d-sm-none d-md-none d-xl-block d-lg-block">
        <div class="container">
            <div class="menu-left-column">
                <div class="logo-menu">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{  asset('images/logos/Pasar_Solar.png')  }}" class="logo-dark" alt="logo" width="150">
                    </a>
                </div>
                <div class="menu-nav-item ml-5">
                    <button class="navbar-toggler" type="button">
                        <span class="menu-lines"><span></span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mainNavigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav__item {{ request()->is('/') ? 'current' : '' }} ">
                                <a href="{{ url('/') }}" class="nav__item-link">
                                    {{ __('dashboard') }}                    </a>
                            </li>
                            <li class="nav__item {{ request()->is('about') ? 'current' : '' }}">
                                <a href="{{ url('/about') }}" class="nav__item-link">
                                    {{ __('about_us') }}                    </a>
                            </li>
                            <li class="nav__item {{ request()->is('product') ? 'current' : '' }}">
                                <a href="{{ url('/product') }}" class="nav__item-link">
                                    {{ __('product') }}                    </a>
                            </li>
                            <li class="nav__item {{ request()->is('services') ? 'current' : '' }} ">
                                <a href="{{ url('/services') }}" class="nav__item-link">
                                    {{ __('service') }}                    </a>
                            </li>
                            <li class="nav__item {{ request()->is('coverages') ? 'current' : '' }}">
                                <a href="{{ url('/coverages') }}" class="nav__item-link">
                                    {{ __('coverage') }}                    </a>
                            </li>
                            <li class="nav__item {{ request()->is('article') ? 'current' : '' }}">
                                <a href="{{ url('/article') }}" class="nav__item-link">
                                    {{ __('article') }}                    </a>
                            </li>
                            <li class="nav__item {{ request()->is('contact-us') ? 'current' : '' }}">
                                <a href="{{ url('/contact-us') }}" class="nav__item-link">
                                    {{ __('contact_us') }}                    </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu-right-column">
                <div class="collapse navbar-collapse d-flex" id="mainNavigation">
                    <select class="form-control lang" id="dynamic_select" data-url="{{ url('') }}">
                        <option value="en" data-image="{{ asset('/images/lang/flag-en.png') }}" @selected(session('app_locale') == 'en')>English</option>
                        <option value="id" data-image="{{ asset('/images/lang/flag-id.png') }}" @selected(session('app_locale') == 'id')>Indonesia</option>
                    </select>
                </div>
            </div>

        </div>
    </nav>
    <nav class="navbar navbar-expand-lg sticky-navbar d-block d-sm-block d-md-block d-xl-none d-lg-none"
         id="navbar_top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{  asset('images/logos/Pasar_Solar.png')  }}" class="logo-dark" alt="logo" width="150">
            </a>
            <div class="register-nav">
                <button class="navbar-toggler" type="button" data-toggle="modal" data-target="#staticBackdrop">
                    <span class="menu-lines"><span></span></span>
                </button>
            </div>
        </div>
    </nav>
</header>
