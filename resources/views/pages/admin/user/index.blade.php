@extends('layouts.app')

@section('page-content')
    <div id="kt_app_content" class="app-content  flex-column-fluid ">


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-fluid ">

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
                                    <span class="dt-column-title" role="button">Nama</span><span
                                        class="dt-column-order"></span></th>
                                <th class="text-start min-w-70px dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                    data-dt-column="3" rowspan="1" colspan="1" aria-label="Qty: Activate to sort"
                                    tabindex="0"><span class="dt-column-title" role="button">Email</span><span
                                        class="dt-column-order"></span></th>
                                <th class="text-start min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                    data-dt-column="4" rowspan="1" colspan="1" aria-label="Price: Activate to sort"
                                    tabindex="0"><span class="dt-column-title" role="button">Nomor HP</span><span
                                        class="dt-column-order"></span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
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
