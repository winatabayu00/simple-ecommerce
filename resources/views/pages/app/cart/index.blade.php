@extends('layouts.app-landing')

@section('app-content')
    <div class="d-flex flex-column flex-column-fluid">

        <div id="kt_app_toolbar" class="app-toolbar  pt-6 pb-2 ">

            <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex align-items-stretch ">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                            My Cart
                        </h1>

                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-fluid ">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">

                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <div class="btn btn-primary btn-sm">
                                <form action="{{ route('cart.checkout') }}" method="post">
                                    @csrf
                                    <button href="#" class="btn btn-primary btn-sm">
                                        Checkout
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">

                        <div id="kt_ecommerce_sales_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                            <div id="" class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable"
                                       id="kt_ecommerce_sales_table" style="width: 100%;">
                                    <colgroup>
                                        <col data-dt-column="2" style="width: 230.503px;">
                                        <col data-dt-column="3" style="width: 98.8715px;">
                                        <col data-dt-column="4" style="width: 107.326px;">
                                        <col data-dt-column="5" style="width: 108.837px;">
                                        <col data-dt-column="7" style="width: 112.847px;">
                                    </colgroup>
                                    <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-175px dt-orderable-asc dt-orderable-desc" data-dt-column="2"
                                            rowspan="1" colspan="1" aria-label="Customer: Activate to sort"
                                            tabindex="0"><span class="dt-column-title"
                                                               role="button">Product</span><span
                                                class="dt-column-order"></span></th>
                                        <th class="text-end min-w-70px dt-orderable-asc dt-orderable-desc"
                                            data-dt-column="3" rowspan="1" colspan="1"
                                            aria-label="Status: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Price</span><span
                                                class="dt-column-order"></span></th>
                                        <th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                            data-dt-column="4" rowspan="1" colspan="1"
                                            aria-label="Total: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Quantity</span><span
                                                class="dt-column-order"></span></th>
                                        <th class="text-end min-w-100px dt-type-date dt-orderable-asc dt-orderable-desc"
                                            data-dt-column="5" rowspan="1" colspan="1"
                                            aria-label="Date Added: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Sub Total</span><span
                                                class="dt-column-order"></span></th>
                                        <th class="text-end min-w-100px dt-orderable-none" data-dt-column="7"
                                            rowspan="1" colspan="1" aria-label="Actions"><span
                                                class="dt-column-title">Actions</span><span
                                                class="dt-column-order"></span></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php
                                        $grandTotal = 0;
                                    @endphp
                                    @foreach($carts as $cart)

                                        @php
                                            $subtotal = (string)$cart->product->price * $cart->quantity;
                                            $grandTotal += $subtotal;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <a href="{{ route('products.preview', ['product' => $cart->product_id]) }}">
                                                            <div class="symbol-label">
                                                                <img
                                                                    src="{{ $cart->product->image }}"
                                                                    alt="{{ $cart->product->name }}" class="w-100">
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="ms-5">
                                                        <a href="{{ route('products.preview', ['product' => $cart->product_id]) }}"
                                                           class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                            {{ $cart->product->name }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end pe-0" data-order="Cancelled">
                                                <div
                                                    class="badge badge-light-danger">{{ \Akaunting\Money\Money::IDR($cart->product->price) }}</div>
                                            </td>
                                            <td class="text-end pe-0 dt-type-numeric">
                                                <span class="fw-bold">{{ $cart->quantity }}</span>
                                            </td>
                                            <td class="text-end dt-type-date" data-order="2025-04-29">
                                                <span
                                                    class="fw-bold">{{ \Akaunting\Money\Money::IDR($subtotal, true) }}</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('products.preview', ['product' => $cart->product_id]) }}"
                                                   class="btn btn-icon btn-light-twitter btn-sm me-3">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <div class="btn btn-icon btn-light-twitter btn-sm me-3">
                                                    <form
                                                        action="{{ route('cart.remove-from-cart', ['cartItem' => $cart->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button href="#" class="btn btn-icon btn-light-facebook btn-sm">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                    <tfoot>
                                    <tr class="fw-bold text-dark">
                                        <td colspan="4" class="text-end">Grand Total:</td>
                                        <td>{{ \Akaunting\Money\Money::IDR($grandTotal, true) }}</td>
                                    </tr>
                                    </tfoot>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
