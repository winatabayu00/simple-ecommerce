@extends('layouts.app-landing')

@section('app-content')
    <div class="mb-lg-n15 position-relative z-index-2">
        <div class="container">
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <div class="card-body p-lg-20">
                    <div class="text-center mb-5 mb-lg-10">
                        <h3 class="fs-2hx text-gray-900 mb-5" id="portfolio" data-kt-scroll-offset="{default: 100, lg: 250}">Produk Kami</h3>
                    </div>

                    <div class="row g-10">
                        <div class="col-lg-6">
                            <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="{{ asset('media/stock/600x600/img-23.jpg') }}">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('{{ asset('media/stock/600x600/img-23.jpg') }}')">
                                </div>

                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-outline ki-eye fs-3x text-white"></i>            </div>
                            </a>
                        </div>

                        <div class="col-lg-6">
                            <div class="row g-10 mb-10">
                                <div class="col-lg-6">
                                    <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('media/stock/600x600/img-22.jpg') }}">
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('{{ asset('media/stock/600x600/img-22.jpg') }}')">
                                        </div>

                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                            <i class="ki-outline ki-eye fs-3x text-white"></i>                    </div>
                                    </a>
                                </div>

                                <div class="col-lg-6">
                                    <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('media/stock/600x600/img-21.jpg') }}">
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('{{ asset('media/stock/600x600/img-21.jpg') }}')">
                                        </div>

                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                            <i class="ki-outline ki-eye fs-3x text-white"></i>                    </div>
                                    </a>
                                </div>
                            </div>

                            <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('media/stock/600x400/img-20.jpg') }}">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('{{ asset('media/stock/600x600/img-20.jpg') }}')">
                                </div>

                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-outline ki-eye fs-3x text-white"></i>            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
