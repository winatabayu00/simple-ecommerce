@extends('layouts.app')

@section('page-content')
    <div class="d-flex flex-column gap-7 gap-lg-10 m-10">
        <!--begin::Order summary-->
        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4 flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Order Details (#14534)</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                            <tbody class="fw-semibold text-gray-600">
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <i class="ki-outline ki-calendar fs-2 me-2"></i> Tanggal Order
                                    </div>
                                </td>
                                <td class="fw-bold text-end">{{ \Illuminate\Support\Carbon::parse($order->created_at)->toDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <i class="ki-outline ki-wallet fs-2 me-2"></i> Metode Pembayaran
                                    </div>
                                </td>
                                <td class="fw-bold text-end">
                                    {{ \App\Enums\PaymentMethod::tryFrom($order->payment_method)->label() }}
                                </td>
                            </tr>

                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <i class="ki-outline ki-wallet fs-2 me-2"></i> Total Harga
                                    </div>
                                </td>
                                <td class="fw-bold text-end">
                                    {{ \Akaunting\Money\Money::IDR($order->total) }}
                                </td>
                            </tr>

                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <i class="ki-outline ki-wallet fs-2 me-2"></i> Catatan
                                    </div>
                                </td>
                                <td class="fw-bold text-end">
                                    {{ $order->notes }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Order details-->

            <!--begin::Customer details-->
            <div class="card card-flush py-4  flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Customer Detail</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                            <tbody class="fw-semibold text-gray-600">
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <i class="ki-outline ki-profile-circle fs-2 me-2"></i> Nama
                                    </div>
                                </td>

                                <td class="fw-bold text-end">
                                    <div class="d-flex align-items-center justify-content-end">

                                        <!--begin::Name-->
                                        <a href="#"
                                           class="text-gray-600 text-hover-primary">
                                            {{ $order->user->name }}
                                        </a>
                                        <!--end::Name-->
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <i class="ki-outline ki-sms fs-2 me-2"></i> Email
                                    </div>
                                </td>
                                <td class="fw-bold text-end">
                                    <a href="#"
                                       class="text-gray-600 text-hover-primary">
                                        {{ $order->user->email }} </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <i class="ki-outline ki-sms fs-2 me-2"></i> Nomor HP
                                    </div>
                                </td>
                                <td class="fw-bold text-end">
                                    <a href="#"
                                       class="text-gray-600 text-hover-primary">
                                        {{ $order->phone ?? $order->user->phone }} </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Customer details-->

            <!--begin::Shipping address-->
            <div class="card card-flush py-4 flex-row-fluid ">
                <!--begin::Background-->
                <div
                    class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                    <i class="ki-solid ki-delivery" style="font-size: 13em">
                    </i>
                </div>
                <!--end::Background-->

                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Shipping Address</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    {{ $order->address ?? null }}
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Shipping address-->

        </div>
        <!--end::Order summary-->

        <!--begin::Orders-->
        <div class="d-flex flex-column gap-7 gap-lg-10">
            <!--begin::Product List-->
            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Order Items</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
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

                            <th class="text-end min-w-100px dt-type-date dt-orderable-asc dt-orderable-desc"
                                data-dt-column="5" rowspan="1" colspan="1"
                                aria-label="Date Added: Activate to sort" tabindex="0"><span
                                    class="dt-column-title" role="button">Actions</span><span
                                    class="dt-column-order"></span></th>
                        </tr>
                        </thead>

                        <tbody>
                        @php
                            $grandTotal = 0;
                        @endphp
                        @foreach($order->orderItems as $oderItems)

                            @php
                                $subtotal = (string)$oderItems->product->price * $oderItems->quantity;
                                $grandTotal += $subtotal;
                            @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="{{ route('products.preview', ['product' => $oderItems->product_id]) }}">
                                                <div class="symbol-label">
                                                    <img
                                                        src="{{ $oderItems->product->image }}"
                                                        alt="{{ $oderItems->product->name }}" class="w-100">
                                                </div>
                                            </a>
                                        </div>

                                        <div class="ms-5">
                                            <a href="{{ route('products.preview', ['product' => $oderItems->product_id]) }}"
                                               class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                {{ $oderItems->product->name }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Cancelled">
                                    <div class="badge badge-light-danger">{{ \Akaunting\Money\Money::IDR($oderItems->product->price) }}</div>
                                </td>
                                <td class="text-end pe-0 dt-type-numeric">
                                    <span class="fw-bold">{{ $oderItems->quantity }}</span>
                                </td>
                                <td class="text-end dt-type-date" data-order="2025-04-29">
                                    <span class="fw-bold">{{ \Akaunting\Money\Money::IDR($subtotal, true) }}</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('products.preview', ['product' => $oderItems->product_id]) }}" class="btn btn-icon btn-light-twitter btn-sm me-3">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr class="fw-bold text-dark">
                            <td colspan="4" class="text-end">Grand Total:</td>
                            <td >{{ \Akaunting\Money\Money::IDR($grandTotal, true) }}</td>
                        </tr>
                        </tfoot>
                        <tfoot></tfoot>
                    </table>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Product List-->            </div>
        <!--end::Orders-->
    </div>
@endsection
