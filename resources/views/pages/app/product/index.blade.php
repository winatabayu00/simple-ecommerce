@extends('layouts.app-landing')

@section('app-content')
    <!-- Header Section -->
    <div class="card card-flush mb-5">
        <div class="card-body py-5">
            <div class="d-flex align-items-center">
                <div class="symbol symbol-45px me-5">
                    <i class="bi bi-grid text-primary fs-2x"></i>
                </div>
                <div class="d-flex flex-column">
                    <h1 class="text-gray-900 fw-bold fs-2 mb-1">Katalog Produk</h1>
                    <span class="text-muted fw-semibold fs-6">Temukan produk terbaik untuk kebutuhan Anda</span>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-xl-row">
        <!-- Filter Sidebar -->
        <div class="d-flex flex-row-fluid">
            <div class="row d-flex flex-row-fluid">
                <!-- Enhanced Filter Card -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card card-flush shadow-sm h-xl-100">
                        <div class="card-header bg-light-primary pt-6 pb-3">
                            <div class="card-title">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-funnel text-primary fs-2 me-3"></i>
                                    <h3 class="fw-bold text-primary mb-0 fs-4">Filter Produk</h3>
                                </div>
                            </div>
                        </div>

                        <form>
                            <div class="card-body py-4">
                                <!-- Popular Filter Section -->
                                <div class="mb-8">
                                    <div class="separator separator-content my-6">
                                        <span class="w-225px text-gray-500 fw-semibold fs-7">KATEGORI POPULER</span>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" value="recommended"
                                               id="flexRadioCheckDefault1" @checked(request()->input('hot') == 'recommended')
                                               name="hot">
                                        <label class="form-check-label fw-semibold text-gray-700" for="flexRadioCheckDefault1">
                                            <i class="bi bi-award text-warning me-2"></i>Rekomendasi
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" value="best_seller"
                                               id="flexRadioCheckDefault2" @checked(request()->input('hot') == 'best_seller')
                                               name="hot">
                                        <label class="form-check-label fw-semibold text-gray-700" for="flexRadioCheckDefault2">
                                            <i class="bi bi-trophy text-success me-2"></i>Penjualan Terbanyak
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" value="most_popular"
                                               id="flexRadioCheckDefault3" @checked(request()->input('hot') == 'most_popular')
                                               name="hot">
                                        <label class="form-check-label fw-semibold text-gray-700" for="flexRadioCheckDefault3">
                                            <i class="bi bi-fire text-danger me-2"></i>Sangat Populer
                                        </label>
                                    </div>
                                </div>

                                <!-- Rating Filter Section -->
                                <div class="mb-8">
                                    <div class="separator separator-content my-6">
                                        <span class="w-225px text-gray-500 fw-semibold fs-7">RATING MINIMUM</span>
                                    </div>

                                    <div class="rating mt-3 mb-4">
                                        @for($i = 1; $i <= 5; $i++)
                                            <label class="rating-label mx-1 cursor-pointer" for="kt_rating_2_input_{{ $i }}">
                                                <i class="bi bi-star-fill fs-3 text-warning"></i>
                                            </label>
                                            <input class="rating-input d-none" name="rating" value="{{ $i }}"
                                                   type="radio" id="kt_rating_2_input_{{ $i }}"/>
                                        @endfor
                                    </div>

                                    <!-- Rating Display -->
                                    <div class="rating mt-3">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i > request()->input('rating', 0))
                                                <div class="rating-label mx-1">
                                                    <i class="bi bi-star fs-3 text-muted"></i>
                                                </div>
                                            @else
                                                <div class="rating-label mx-1">
                                                    <i class="bi bi-star-fill fs-3 text-warning"></i>
                                                </div>
                                            @endif
                                        @endfor
                                        <span class="ms-3 text-muted fw-semibold">
                                                    {{ request()->input('rating', 0) > 0 ? request()->input('rating') . ' bintang ke atas' : 'Pilih rating minimum' }}
                                                </span>
                                    </div>
                                </div>

                                <!-- Price Range Section -->
                                <div class="mb-4">
                                    <div class="separator separator-content my-6">
                                        <span class="w-225px text-gray-500 fw-semibold fs-7">RENTANG HARGA</span>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <label class="form-label fw-semibold text-gray-700 mb-3">Atur Skala Harga</label>
                                        <div id="kt_slider_basic" class="mb-5"></div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-light-success p-3 rounded text-center">
                                                    <div class="fw-semibold text-success fs-7 mb-1">Minimum</div>
                                                    <div class="fw-bold text-gray-800 fs-6" id="kt_slider_basic_min"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="bg-light-primary p-3 rounded text-center">
                                                    <div class="fw-semibold text-primary fs-7 mb-1">Maximum</div>
                                                    <div class="fw-bold text-gray-800 fs-6" id="kt_slider_basic_max"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="min_price" id="filter-min-price" value="{{ request()->input('min_price') }}">
                                        <input type="hidden" name="max_price" id="filter-max-price" value="{{ request()->input('max_price') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer bg-light py-4">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-light-danger btn-sm">
                                        <i class="bi bi-arrow-clockwise me-1"></i>Reset Filter
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="bi bi-check2 me-1"></i>Terapkan Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="col-xl-8 col-lg-7">
                    <!-- Top 5 Featured Products -->
                    <div class="card card-flush mb-5">
                        <div class="card-header bg-light-warning pt-6 pb-3">
                            <div class="card-title">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-star-fill text-warning fs-2 me-3"></i>
                                    <h3 class="fw-bold text-warning mb-0 fs-4">Produk Unggulan</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <div class="row g-4">
                                @foreach($products as $key => $product)
                                    @continue($key >= 5)
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <a href="{{ route('products.preview', ['product' => $product->id]) }}" class="text-decoration-none">
                                            <div class="card card-flush h-100 hover-elevate-up shadow-sm">
                                                <div class="card-body text-center p-4">
                                                    <!-- Product Image -->
                                                    <div class="position-relative mb-4">
                                                        <img src="{{ $product->image }}"
                                                             class="rounded-3 w-100 h-150px object-fit-cover"
                                                             alt="{{ $product->name }}"/>
                                                        <div class="position-absolute top-0 end-0 m-2">
                                                            <span class="badge badge-light-success">Unggulan</span>
                                                        </div>
                                                    </div>

                                                    <!-- Product Info -->
                                                    <div class="mb-3">
                                                        <h5 class="fw-bold text-gray-800 text-hover-primary fs-6 mb-2 text-truncate">
                                                            {{ $product->name }}
                                                        </h5>
                                                        <span class="text-muted fw-semibold fs-7 d-block mb-2">
                                                                    <i class="bi bi-box me-1"></i>Stock {{ $product->stock }}
                                                                </span>

                                                        <!-- Rating -->
                                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                                            <div class="rating me-2">
                                                                @for($i = 0; $i < round($product->summary->average_rating, 1); $i++)
                                                                    <i class="bi bi-star-fill text-warning fs-7"></i>
                                                                @endfor
                                                                @for($i = round($product->summary->average_rating, 1); $i < 5; $i++)
                                                                    <i class="bi bi-star text-muted fs-7"></i>
                                                                @endfor
                                                            </div>
                                                            <span class="text-muted fw-semibold fs-8">
                                                                        ({{ $product->summary->average_rating }})
                                                                    </span>
                                                        </div>

                                                        <span class="text-muted fw-semibold fs-8">
                                                                    {{ $product->summary->total_selling }} Terjual
                                                                </span>
                                                    </div>

                                                    <!-- Price -->
                                                    <div class="text-center">
                                                                <span class="text-success fw-bold fs-5">
                                                                    {{ \Akaunting\Money\Money::IDR($product->price) }}
                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- All Products -->
                    <div class="card card-flush">
                        <div class="card-header pt-6 pb-3">
                            <div class="card-title">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-grid-3x3-gap text-primary fs-2 me-3"></i>
                                    <h3 class="fw-bold text-primary mb-0 fs-4">Semua Produk</h3>
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <span class="badge badge-light-primary fs-7">{{ count($products) }} Produk</span>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <div class="row g-4">
                                @foreach($products as $product)
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <a href="{{ route('products.preview', ['product' => $product->id]) }}" class="text-decoration-none">
                                            <div class="card card-flush h-100 hover-elevate-up shadow-sm">
                                                <div class="card-body text-center p-4">
                                                    <!-- Product Image -->
                                                    <div class="mb-4">
                                                        <img src="{{ $product->image }}"
                                                             class="rounded-3 w-100 h-150px object-fit-cover"
                                                             alt="{{ $product->name }}"/>
                                                    </div>

                                                    <!-- Product Info -->
                                                    <div class="mb-3">
                                                        <h6 class="fw-bold text-gray-800 text-hover-primary fs-7 mb-2 text-truncate">
                                                            {{ $product->name }}
                                                        </h6>
                                                        <span class="text-muted fw-semibold fs-8 d-block mb-2">
                                                                    <i class="bi bi-box me-1"></i>Stock {{ $product->stock }}
                                                                </span>

                                                        <!-- Rating -->
                                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                                            <div class="rating me-2">
                                                                @for($i = 0; $i < round($product->summary->average_rating, 1); $i++)
                                                                    <i class="bi bi-star-fill text-warning fs-8"></i>
                                                                @endfor
                                                                @for($i = round($product->summary->average_rating, 1); $i < 5; $i++)
                                                                    <i class="bi bi-star text-muted fs-8"></i>
                                                                @endfor
                                                            </div>
                                                            <span class="text-muted fw-semibold fs-9">
                                                                        ({{ $product->summary->average_rating }})
                                                                    </span>
                                                        </div>

                                                        <span class="text-muted fw-semibold fs-8">
                                                                    {{ $product->summary->total_selling }} Terjual
                                                                </span>
                                                    </div>

                                                    <!-- Price -->
                                                    <div class="text-center">
                                                                <span class="text-success fw-bold fs-6">
                                                                    {{ \Akaunting\Money\Money::IDR($product->price) }}
                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var slider = document.querySelector("#kt_slider_basic");
        var valueMin = document.querySelector("#kt_slider_basic_min");
        var valueMax = document.querySelector("#kt_slider_basic_max");
        var filterMinPrice = document.querySelector("#filter-min-price");
        var filterMaxPrice = document.querySelector("#filter-max-price");

        let minPrice = parseInt("{{ request()->input('min_price', 100000) }}");
        let maxPrice = parseInt("{{ request()->input('max_price', 100000000) }}");

        noUiSlider.create(slider, {
            start: [minPrice, maxPrice],
            connect: true,
            range: {
                "min": 100000,
                "max": 100000000,
            },
            format: {
                to: function (value) {
                    return Math.round(value);
                },
                from: function (value) {
                    return Number(value);
                }
            }
        });

        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });

        slider.noUiSlider.on("update", function (values, handle) {
            const rawValue = Math.round(values[handle]);
            const formattedValue = formatter.format(rawValue);
            if (handle) {
                valueMax.innerHTML = formattedValue;
                filterMaxPrice.value = rawValue;
            } else {
                filterMinPrice.value = rawValue;
                valueMin.innerHTML = formattedValue;
            }
        });

        // Enhanced interaction for rating selection
        document.querySelectorAll('.rating-label').forEach(function(label) {
            label.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
                this.style.transition = 'transform 0.2s ease';
            });
            label.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Add hover effect for product cards
        document.querySelectorAll('.hover-elevate-up').forEach(function(card) {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
                this.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '';
            });
        });
    </script>
@endpush
