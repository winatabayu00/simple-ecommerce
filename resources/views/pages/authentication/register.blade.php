@extends('layouts.guest')

@section('content')
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-lg-row-fluid">
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ asset('media/logos/logo1.png') }}" alt="" />
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ asset('media/logos/logo1.png') }}" alt="" />

                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">

                </h1>

                <div class="text-gray-600 fs-base text-center fw-semibold">

                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                    <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                        <form class="form w-100" method="post">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="fw-bolder mb-3">
                                    {{ __('Daftar') }}
                                </h1>
                            </div>



                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7"></span>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="{{ __('Nama') }}" name="name" autocomplete="off"
                                       class="form-control bg-transparent" value="{{ old('name') }}"/>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="{{ __('Email') }}" name="email" autocomplete="off"
                                       class="form-control bg-transparent" value="{{ old('email') }}"/>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="{{ __('Nomor Telepon') }}" name="phone" autocomplete="off"
                                       class="form-control bg-transparent" value="{{ old('phone') }}"/>
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fv-row mb-3">
                                <input type="password" placeholder="{{ __('Password') }}" name="password" autocomplete="off"
                                       class="form-control bg-transparent" />
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fv-row mb-3">
                                <input type="password" placeholder="{{ __('Konfirmasi Password') }}" name="password_confirmation" autocomplete="off"
                                       class="form-control bg-transparent" />
                                @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>

                                <a href="#" class="link-primary">
                                    {{--Forgot Password ?--}}
                                </a>
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">

                                    <span class="indicator-label">
                                        {{ __('Sign In') }}</span>
                                </button>
                            </div>

                        </form>

                    </div>

                    <div class=" d-flex flex-stack">
                        <div class="me-10">

                        </div>

                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">2024&copy;</span>
                            <a href="/" target="_blank" class="text-gray-800 text-hover-primary">{{ env('APP_NAME') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
