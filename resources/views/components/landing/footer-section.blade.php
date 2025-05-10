<div class="footer-card-top">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-12 col-md-8 text-center text-md-left">
                <h1 class="title">
                    {{ __('want_to_use_our_product') }}
                </h1>
                <p>
                    {{ __('want_to_use_our_product_description') }}
                </p>
            </div>
            <div class="col-12 col-md-4 text-center text-md-right">
                <a href="{{ url('request-offer') }}" class="btn btn-primary border-radius-50 mt-20 mt-md-0">
                    {{ __('submit_an_offer') }}
                </a>
            </div>
        </div>
    </div>
</div>
<div class="footer-line mt-30 mb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>
<div class="footer-logo mb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo-navbar">
                    <div class="logo-footer mb-3 mb-md-0">
                        <img class="img-fluid"
                             src="{{ asset('images/logos/Pasar_Solar.png') }}" alt=""
                             width="200" />
                    </div>
                    <div class="logo-nav-link mb-3 mb-md-0">
                        <ul class="logo-nav-link-group">
                            <li class="logo-nav-link-group-item">
                                <a href="{{ url('/') }}" class="link"> {{ __('dashboard') }} </a>
                            </li>
                            <li class="logo-nav-link-group-item">
                                <a href="{{ url('/about') }}" class="link"> {{ __('about_us') }} </a>
                            </li>
                            <li class="logo-nav-link-group-item">
                                <a href="{{ url('/product') }}" class="link"> {{ __('product') }} </a>
                            </li>
                            <li class="logo-nav-link-group-item">
                                <a href="{{ url('/services') }}" class="link"> {{ __('service') }} </a>
                            </li>
                            <li class="logo-nav-link-group-item">
                                <a href="{{ url('/coverages') }}" class="link"> {{ __('coverage') }} </a>
                            </li>
                            <li class="logo-nav-link-group-item">
                                <a href="{{ url('/article') }}" class="link"> {{ __('article') }} </a>
                            </li>
                            <li class="logo-nav-link-group-item">
                                <a href="{{ url('/contact-us') }}" class="link">{{ __('contact_us') }}</a>
                            </li>
                        </ul>
                        <div class="logo-nav-link-mobile">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <a href="{{ url('/') }}" class="link"> {{ __('dashboard') }} </a>
                                </div>
                                <div class="col-6 mb-2">
                                    <a href="{{ url('/about') }}" class="link">{{ __('about_us') }}</a>
                                </div>
                                <div class="col-6 mb-2">
                                    <a href="{{ url('/product') }}" class="link"> {{ __('product') }} </a>
                                </div>
                                <div class="col-6 mb-2">
                                    <a href="{{ url('/services') }}" class="link">
                                        {{ __('service') }}
                                    </a>
                                </div>
                                <div class="col-6 mb-2">
                                    <a href="{{ url('/coverages') }}" class="link">
                                        {{ __('coverage') }}
                                    </a>
                                </div>
                                <div class="col-6 mb-2">
                                    <a href="{{ url('/article') }}" class="link"> {{ __('article') }} </a>
                                </div>
                                <div class="col-6 mb-2">
                                    <a href="{{ url('/contact-us') }}" class="link">
                                        {{ __('contact_us') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="logo-nav-email">
                        <a href="mailto:support@pasarsolar.com" class="text-center text-md-right">
                            <img class="img-fluid" src="{{ asset('images/default/icon-sms.svg') }}" alt=""
                                 width="15" />
                            support@pasarsolar.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-card-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="footer__copyright">
                    <nav>
                        <ul class="list-unstyled footer__copyright-links d-flex flex-wrap">
                            <li>2025 &copy; PT. Rizki Maharani Java Indonesia.</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
