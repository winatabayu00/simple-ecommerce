@extends('layouts.app-landing')

@section('app-content')
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <div class="d-flex flex-column flex-xl-row">
                <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">

                    <div class="row">
                        <div class="col-4 card card-xl-stretch mb-5 mb-xl-8 w-250px">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">Filters</span>
                                </h3>
                            </div>
                            <!--end::Header-->


                            <form>
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <div class="separator separator-content my-15">HOT</div>
                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" value="recommended"
                                               id="flexRadioCheckDefault1" @checked(request()->input('hot') == 'recommended')
                                               name="hot">
                                        <label class="form-check-label" for="flexRadioCheckDefault1">
                                            Recommended
                                        </label>
                                    </div>

                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" value="best_seller"
                                               id="flexRadioCheckDefault2" @checked(request()->input('hot') == 'best_seller')
                                               name="hot">
                                        <label class="form-check-label" for="flexRadioCheckDefault2">
                                            Best Seller
                                        </label>
                                    </div>

                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" value="most_popular"
                                               id="flexRadioCheckDefault3" @checked(request()->input('hot') == 'most_popular')
                                               name="hot">
                                        <label class="form-check-label" for="flexRadioCheckDefault3">
                                            Most Popular
                                        </label>
                                    </div>

                                    <div class="separator separator-content my-15">By Rates</div>
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

                                    <div class="separator separator-content my-15">General</div>
                                    <!--begin::Input wrapper-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="">BY Stock</span>

                                            <span class="ms-1" data-bs-toggle="tooltip" title="Select an option.">
                                        <i class="ki-duotone ki-information text-gray-500 fs-7"><span
                                                class="path1"></span><span
                                                class="path2"></span><span class="path3"></span></i>
                                    </span>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Buttons-->
                                        <div class="d-flex flex-stack gap-5 mb-3">
                                            <button type="button" class="btn btn-light-primary"
                                                    data-kt-docs-advanced-forms="interactive" data-value="<5">< 5
                                            </button>
                                            <button type="button" class="btn btn-light-primary"
                                                    data-kt-docs-advanced-forms="interactive" data-value="5-10">5 - 10
                                            </button>
                                            <button type="button" class="btn btn-light-primary"
                                                    data-kt-docs-advanced-forms="interactive" data-value=">10">> 10
                                            </button>
                                        </div>
                                        <!--begin::Buttons-->

                                        <input type="text" readonly hidden="hidden"
                                               class="form-control form-control-solid" placeholder="Enter Amount"
                                               name="amount"/>
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
        const options = document.querySelectorAll('[data-kt-docs-advanced-forms="interactive"]');
        const inputEl = document.querySelector('[name="amount"]');
        options.forEach(option => {
            option.addEventListener('click', e => {
                e.preventDefault();

                inputEl.value = option.getAttribute('data-value');
            });
        });
    </script>
@endpush
