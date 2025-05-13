@extends('layouts.guest')

@section('content')
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <!--begin::Image-->
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ asset('media/logos/logo1.png') }}" alt="" />
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ asset('media/logos/logo1.png') }}" alt="" />
                <!--end::Image-->

                <!--begin::Title-->
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">

                </h1>
                <!--end::Title-->

                <!--begin::Text-->
                <div class="text-gray-600 fs-base text-center fw-semibold">

                </div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--begin::Aside-->

        <!--begin::Body-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <!--begin::Wrapper-->
            <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                        <!--begin::Form-->
                        <form class="form w-100" action="{{ route('auth.login') }}" method="post">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="fw-bolder mb-3">
                                    {{ __('Sign In') }}
                                </h1>
                                <!--end::Title-->

                                <!--begin::Subtitle-->
                                <div class=" fw-semibold fs-6">
                                    {{ __('Sign to your account') }}
                                </div>
                                <!--end::Subtitle--->
                            </div>
                            <!--begin::Heading-->

                            <!--begin::Login options-->

                            <!--end::Login options-->

                            <!--begin::Separator-->
                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">{{ __('with Email') }}</span>
                            </div>
                            <!--end::Separator-->

                            <!--begin::Input group--->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="{{ __('Email') }}" name="email" autocomplete="off"
                                       class="form-control bg-transparent" value="{{ old('email') }}"/>
                                <!--end::Email-->
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--end::Input group--->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="{{ __('Password') }}" name="password" autocomplete="off"
                                       class="form-control bg-transparent" />
                                <!--end::Password-->
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Input group--->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>

                                <!--begin::Link-->
                                <a href="#" class="link-primary">
                                    {{--Forgot Password ?--}}
                                </a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">

                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">
                                        {{ __('Sign In') }}</span>
                                    <!--end::Indicator label-->
                                </button>
                            </div>
                            <!--end::Submit button-->

                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Footer-->
                    <div class=" d-flex flex-stack">
                        <div class="me-10">

                        </div>

                        <!--begin::Links-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">2024&copy;</span>
                            <a href="/" target="_blank" class="text-gray-800 text-hover-primary">{{ env('APP_NAME') }}</a>
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->
    </div>
@endsection
