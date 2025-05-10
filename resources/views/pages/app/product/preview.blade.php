@extends('layouts.app-landing')

@section('app-content')
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container  container-fluid ">

            <form method="post" action="{{ route('cart.add-to-cart') }}"
                  class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
                @csrf

                <input name="product_id" value="{{ $product->id }}" hidden="hidden">

                <div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">

                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Product Details</h2>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-10">
                                <div class="fv-row">
                                    <label class="form-label">Product Photo</label>
                                </div>

                                <a class="d-block overlay h-100" data-fslightbox="lightbox-hot-sales"
                                   href="{{ asset('media/stock/600x600/img-42.jpg') }}" target="_blank">
                                    <div
                                        class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-200px h-100"
                                        style="background-image:url('{{ $product->image }}')">
                                    </div>

                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="ki-duotone ki-eye fs-3x text-white"><span class="path1"></span><span
                                                class="path2"></span><span class="path3"></span></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">

                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ ucwords($product->name) }} </h2>
                                <span class="ms-3 fw-bold text-muted">( {{\Akaunting\Money\Money::IDR($product->price) }} ) </span>
                            </div>
                            <div class="card-toolbar">
                                <span class="ms-3 fw-bold text-muted">( {{$product->summary->average_rating }} )</span>

                                <div class="rating-label me-2 checked">
                                    @for($i = 0; $i < round($product->summary->average_rating, 1); $i++)
                                        <i class="bi bi-star fs-1"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-10">
                                <div>
                                    <label class="form-label">{!! $product->description !!}</label>

                                    <table class="table align-middle gs-0 gy-4 my-0">
                                        <thead>
                                        <tr>
                                            <th class="w-25"></th>
                                            <th class="w-50px"></th>
                                            <th class="w-100px0px"></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr data-kt-pos-element="item" data-kt-pos-item-price="13.5">
                                            <td class="pe-0">
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">Quantities</span>
                                                </div>
                                            </td>

                                            <td class="pe-0">
                                                <div class="position-relative d-flex align-items-center"
                                                     data-kt-dialer="true" data-kt-dialer-min="1"
                                                     data-kt-dialer-max="10"
                                                     data-kt-dialer-step="1" data-kt-dialer-decimals="0">

                                                    <button type="button"
                                                            class="btn btn-icon btn-sm btn-light btn-icon-gray-500"
                                                            data-kt-dialer-control="decrease">
                                                        <i class="fa-solid fa-minus"></i></button>

                                                    <input type="text"
                                                           class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px"
                                                           placeholder="Amount" name="quantity" readonly="" value="1">

                                                    <button type="button"
                                                            class="btn btn-icon btn-sm btn-light btn-icon-gray-500"
                                                            data-kt-dialer-control="increase">
                                                        <i class="fa-solid fa-plus"></i></button>
                                                </div>
                                            </td>

                                            <td class="text-end">
                                                <span class="text-muted" data-kt-pos-element="item-total">{{
                                                    $product->stock }} Item Left</span>
                                            </td>
                                        </tr>
                                        </tbody>

                                    </table>

                                </div>

                                <div class="d-flex justify-content-end mb-5">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="me-5 text-muted">{{$product->summary->total_selling }} Terjual</span>
                                    </div>

                                    <a href="{{ route('products.index') }}" id="kt_ecommerce_edit_order_cancel"
                                       class="btn btn-light me-5">
                                        Cancel
                                    </a>

                                    <button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-primary">
                                    <span class="indicator-label">
                                        Add To Cart
                                    </span>
                                        <span class="indicator-progress">
                                        Please wait... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>

            @php
                $user = null;
                if (auth()->check()){
                $user = auth()->user();
                }
            @endphp

            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Comment and Review</h2>
                    </div>
                </div>

                <div class="card-body pb-0">

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            @if($user instanceof \App\Models\User)
                                <div class="card mb-5 mb-xl-8">
                                    <div class="card-body pb-0">
                                        <form action="{{ route('rating.give-rating') }}" method="post"
                                              class="ql-quil ql-quil-plain pb-3">
                                            @csrf
                                            <input hidden="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center flex-grow-1">
                                                    <div class="symbol symbol-45px me-5">
                                                        <img src="{{ asset('media/svg/avatars/blank.svg') }}" alt="">
                                                    </div>

                                                    <div class="d-flex flex-column">
                                                        <a href="#"
                                                           class="text-gray-900 text-hover-primary fs-6 fw-bold">
                                                            {{$user->name }}</a>

                                                        <span class="text-gray-500 fw-bold">{{ $user->email }}</span>
                                                    </div>
                                                </div>

                                                <div class="my-0">
                                                    <button type="submit"
                                                            class="btn btn-sm btn-color-primary btn-active-light-primary">
                                                        REVIEW
                                                    </button>
                                                </div>
                                            </div>


                                            <div class="rating mt-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <label class="rating-label mx-3" for="kt_rating_2_input_{{ $i }}">
                                                        <i class="bi bi-star fs-2"></i>
                                                    </label>
                                                    <input class="rating-input" name="rating" value="{{ $i }}"
                                                           type="radio" id="kt_rating_2_input_{{ $i }}"/>
                                                @endfor
                                            </div>

                                            <div id="kt_forms_widget_1_editor" class="py-6 ql-container ql-snow">
                                                <textarea class="form-control" data-kt-autosize="true" name="comment"
                                                          placeholder="Write Your Comment"></textarea>
                                            </div>

                                            <div class="separator"></div>

                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6 col-12">
                            @foreach($reviews as $review)
                                <div class="card mb-5 mb-xl-8">
                                    <div class="card-body pb-0">
                                        <div class="d-flex align-items-center mb-5">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="symbol symbol-45px me-5">
                                                    <img src="{{ asset('media/svg/avatars/blank.svg') }}" alt="">
                                                </div>

                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">
                                                        {{ $review->user->name }}
                                                    </a>

                                                    <span
                                                        class="text-gray-500 fw-bold">{{ $review->user->email }}</span>
                                                </div>
                                            </div>

                                            <div class="my-0">
                                                <button type="button"
                                                        class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">
                                                    <i class="ki-duotone ki-category fs-6"><span
                                                            class="path1"></span><span
                                                            class="path2"></span><span class="path3"></span><span
                                                            class="path4"></span></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <p class="text-gray-800 fw-normal mb-5">
                                                {{ $review->comment }}
                                            </p>

                                            <div class="d-flex align-items-center mb-5">
                                                <a href="#"
                                                   class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                                    <div class="rating">
                                                        @for($i = 0; $i < $review->rating; $i++)
                                                            <div class="rating-label me-2 checked">
                                                                <i class="bi bi-star fs-1"></i>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="separator mb-4"></div>

                                    </div>
                                </div>
                            @endforeach
                            {{ $reviews->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
