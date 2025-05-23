@extends('layouts.app')

@section('page-content')
    <div id="kt_app_content" class="app-content  flex-column-fluid ">


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-end py-5 gap-2 gap-md-5">
                    <!--begin::Add product-->
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                        Add Product
                    </a>
                    <!--end::Add product-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">

                <!--begin::Table-->
                <div id="kt_ecommerce_products_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                    <div id="" class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable"
                               id="kt_ecommerce_products_table" style="width: 100%;">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-200px dt-orderable-asc dt-orderable-desc" data-dt-column="1"
                                    rowspan="1" colspan="1" aria-label="Product: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">Product</span><span
                                        class="dt-column-order"></span></th>
                                <th class="text-end min-w-70px dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                    data-dt-column="3" rowspan="1" colspan="1" aria-label="Qty: Activate to sort"
                                    tabindex="0"><span class="dt-column-title" role="button">Qty</span><span
                                        class="dt-column-order"></span></th>
                                <th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                    data-dt-column="4" rowspan="1" colspan="1" aria-label="Price: Activate to sort"
                                    tabindex="0"><span class="dt-column-title" role="button">Price</span><span
                                        class="dt-column-order"></span></th>
                                <th class="text-end min-w-100px dt-orderable-asc dt-orderable-desc"
                                    data-dt-column="5" rowspan="1" colspan="1" aria-label="Rating: Activate to sort"
                                    tabindex="0"><span class="dt-column-title" role="button">Rating</span><span
                                        class="dt-column-order"></span></th>
                                <th class="text-end min-w-70px dt-orderable-none" data-dt-column="7" rowspan="1"
                                    colspan="1" aria-label="Actions"><span
                                        class="dt-column-title">Actions</span><span class="dt-column-order"></span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a type="button"
                                               class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                      style="background-image:url({{ $product->image }});"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a type="button"
                                                   class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $product->name }}</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">{{ $product->stock }}</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="25">
                                        <span
                                            class="fw-bold ms-3">{{ \Akaunting\Money\Money::IDR($product->price) }}</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="rating-5">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-outline ki-star fs-6"></i>
                                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-outline ki-star fs-6"></i>
                                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-outline ki-star fs-6"></i>
                                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-outline ki-star fs-6"></i>
                                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-outline ki-star fs-6"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                           class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-outline ki-down fs-5 ms-1"></i> </a>
                                        <!--begin::Menu-->
                                        <div
                                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.products.edit', ['product' =>$product->id]) }}"
                                                   class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3"
                                                   data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Products-->
    </div>
    <!--end::Content container-->
@endsection
