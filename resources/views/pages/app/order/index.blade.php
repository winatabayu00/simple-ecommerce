@extends('layouts.app-landing')

@section('app-content')
    <div class="d-flex flex-column flex-column-fluid">

        <div id="kt_app_toolbar" class="app-toolbar  pt-6 pb-2 ">

            <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex align-items-stretch ">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                            My Orders
                        </h1>

                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-fluid ">
                <div class="card card-flush">
                    <div class="card-body pt-0">

                        <div id="kt_ecommerce_sales_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                            <div id="" class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable"
                                       id="kt_ecommerce_sales_table" style="width: 100%;">

                                    <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                        <th class="text-start min-w-70px dt-orderable-asc dt-orderable-desc"
                                            data-dt-column="3" rowspan="1" colspan="1"
                                            aria-label="Status: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Date Order</span><span
                                                class="dt-column-order"></span></th>

                                        <th class="text-start min-w-70px dt-orderable-asc dt-orderable-desc"
                                            data-dt-column="3" rowspan="1" colspan="1"
                                            aria-label="Status: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Total Price</span><span
                                                class="dt-column-order"></span></th>
                                        <th class="text-start min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                            data-dt-column="4" rowspan="1" colspan="1"
                                            aria-label="Total: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Total Items</span><span
                                                class="dt-column-order"></span></th>

                                        <th class="text-start min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                            data-dt-column="4" rowspan="1" colspan="1"
                                            aria-label="Total: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Status</span><span
                                                class="dt-column-order"></span></th>

                                        <th class="text-start min-w-100px dt-orderable-none" data-dt-column="7"
                                            rowspan="1" colspan="1" aria-label="Actions"><span
                                                class="dt-column-title">Actions</span><span
                                                class="dt-column-order"></span></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php
                                    $grandTotal = 0;
                                    @endphp
                                    @foreach($orders as $order)

                                        @php
                                        $order->loadCount('orderItems');
                                        @endphp
                                        <tr>
                                            <td class="text-start dt-type-date" data-order="2025-04-29">
                                                <span class="fw-bold">{{ $order->created_at }}</span>
                                            </td>
                                            <td class="text-start pe-0 dt-type-numeric">
                                                <span class="fw-bold">{{ \Akaunting\Money\Money::IDR($order->total) }}</span>
                                            </td>
                                            <td class="text-start dt-type-date" data-order="2025-04-29">
                                                <span class="fw-bold">{{ $order->order_items_count }}</span>
                                            </td>
                                            <td class="text-start pe-0" data-order="Cancelled">
                                                <div class="badge badge-light-danger">{{ $order->status }}</div>
                                            </td>
                                            <td class="text-start">
                                                <a href="{{ route('my-order.detail', ['order' => $order->id]) }}" class="btn btn-icon btn-light-twitter btn-sm me-3">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
