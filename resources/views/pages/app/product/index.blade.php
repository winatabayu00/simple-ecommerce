@extends('layouts.app-landing')

@section('app-content')
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <div class="d-flex flex-column flex-xl-row">
                <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">

                    <div class="row">
                        <div class="col-4 card card-xl-stretch mb-5 mb-xl-8 w-250px">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">Filters</span>
                                </h3>
                            </div>


                            <form>
                                <div class="card-body py-3">
                                    <div class="separator separator-content my-15">Populer</div>
                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" value="recommended"
                                               id="flexRadioCheckDefault1" @checked(request()->input('hot') == 'recommended')
                                               name="hot">
                                        <label class="form-check-label" for="flexRadioCheckDefault1">
                                            Rekomendasi
                                        </label>
                                    </div>

                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" value="best_seller"
                                               id="flexRadioCheckDefault2" @checked(request()->input('hot') == 'best_seller')
                                               name="hot">
                                        <label class="form-check-label" for="flexRadioCheckDefault2">
                                            Penjualan Terbanyak
                                        </label>
                                    </div>

                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" value="most_popular"
                                               id="flexRadioCheckDefault3" @checked(request()->input('hot') == 'most_popular')
                                               name="hot">
                                        <label class="form-check-label" for="flexRadioCheckDefault3">
                                            Sangat Populer
                                        </label>
                                    </div>

                                    <div class="separator separator-content my-15">Rating</div>
                                    <div class="rating mt-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <label class="rating-label mx-3" for="kt_rating_2_input_{{ $i }}">
                                                <i class="bi bi-star fs-2"></i>
                                            </label>
                                            <input class="rating-input" name="rating" value="{{ $i }}"
                                                   type="radio" id="kt_rating_2_input_{{ $i }}"/>
                                        @endfor
                                    </div>

                                    <hr>
                                    <div class="rating mt-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i > request()->input('rating', 0))
                                                <div class="rating-label">
                                                    <label class=" mx-3" for="kt_rating_2_input_{{ $i }}">
                                                        <i class="bi bi-star fs-2"></i>
                                                    </label>
                                                </div>

                                            @else
                                                <label class="rating-label mx-3" for="kt_rating_2_input_{{ $i }}">
                                                    <i class="bi bi-star fs-2"></i>
                                                </label>
                                            @endif

                                        @endfor
                                    </div>

                                    <div class="separator separator-content my-15">Lainnya</div>
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <div class="mb-0">
                                            <label class="form-label">Skala Harga</label>
                                            <div id="kt_slider_basic"></div>

                                            <div class="pt-5">
                                                <div class="fw-semibold mb-2">Min: <span id="kt_slider_basic_min"></span></div>
                                                <div class="fw-semibold mb-2">Max: <span id="kt_slider_basic_max"></span></div>
                                                <input hidden="hidden" name="min_price" id="filter-min-price" value="{{ request()->input('min_price') }}" >
                                                <input hidden="hidden" name="max_price" id="filter-max-price" value="{{ request()->input('max_price') }}" >
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Save & Update
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <div class="col 8 card  card-flush card-p-0 bg-transparent border-0 ">
                            <div class="card-body">
                                <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">

                                    @foreach($products as $product)
                                        <a href="{{ route('products.preview', ['product' => $product->id]) }}">
                                            <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
                                                <div class="card-body text-center">
                                                    <img src="{{ $product->image }}"
                                                         class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px"
                                                         alt=""/>

                                                    <div class="mb-2">
                                                        <div class="text-center">
                                                <span
                                                    class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">
                                                    {{ $product->name }}
                                                </span>
                                                            <span class="text-gray-400 fw-semibold d-block fs-6 mt-n1">
                                                    Stock {{ $product->stock }}
                                                </span>


                                                            <div class="rating-label me-2 checked">
                                                                @for($i = 0; $i < round($product->summary->average_rating, 1); $i++)
                                                                    <i class="bi bi-star fs-1"></i>
                                                                @endfor
                                                            </div>
                                                            <span class="ms-3 fw-bold text-muted">(
                                                    {{$product->summary->average_rating }} ) {{$product->summary->total_selling }} Terjual</span>

                                                        </div>
                                                    </div>

                                                    <span class="text-success text-end fw-bold fs-1">{{
                                            \Akaunting\Money\Money::IDR($product->price) }}</span>
                                                </div>
                                            </div>
                                        </a>

                                    @endforeach

                                </div>
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
    </script>
@endpush
