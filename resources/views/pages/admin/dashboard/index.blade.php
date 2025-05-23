@extends('layouts.app')

@section('page-content')
<!--begin::Row-->
<div class="row gx-5 gx-xl-10 mb-xl-10">
    <!--begin::Col-->
    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">

        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
            <div class="card-header pt-5">
                <div class="card-title d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Rp.</span>

                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ number_format($total_incomes ?? 0) }}</span>

                    </div>

                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Total Pendapatan Bulan Ini</span>
                </div>
            </div>

        </div>

        <div class="card card-flush h-md-50 mb-xl-10">
            <div class="card-header pt-5">
                <div class="card-title d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ number_format($total_sales ?? 0) }}</span>

                    </div>

                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Penjualan Bulan Ini</span>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">
        <div class="card card-flush  h-md-50 mb-5 mb-xl-10">
            <div class="card-header pt-5">
                <div class="card-title d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Rp.</span>

                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ number_format($average_incomes ?? 0) }}</span>

                    </div>

                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Rata Rata Pendapatan Perhari</span>
                </div>
            </div>

            <div class="card-body d-flex align-items-end px-0 pb-0">
                <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
            </div>
        </div>


        <div class="card card-flush h-md-50 mb-xl-10">
            <div class="card-header pt-5">
                <div class="card-title d-flex flex-column">
                    <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ number_format($total_customers ?? 0) }}</span>

                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Customer</span>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
        <div class="card h-md-100">
            <div class="card-header align-items-center border-0">
                <h3 class="fw-bold text-gray-900 m-0">Order Terbaru</h3>

                <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">

                    <i class="ki-duotone ki-dots-square fs-1"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                </button>

            </div>

            <div class="card-body pt-2">
                <div id="kt_ecommerce_sales_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                    <div class="table-responsive">
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
                                        <a href="{{ route('admin.orders.detail', ['order' => $order->id]) }}" class="btn btn-icon btn-light-twitter btn-sm me-3">
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

<div class="row gy-5 g-xl-10">
    <div class="col-12 mb-xl-10">

        <div class="card card-flush overflow-hidden h-md-100">
            <div class="card-header py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-900">Penjualan Bulan Ini</span>
                    <span class="text-gray-500 mt-1 fw-semibold fs-6"></span>
                </h3>
            </div>

            <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                <div class="px-9 mb-5">
                    <div class="d-flex mb-2">
                        <span class="fs-4 fw-semibold text-gray-500 me-1">Rp. </span>
                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ number_format($total_incomes ?? 0) }}</span>
                    </div>
                </div>

                <div id="kt_apexcharts_3" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
            </div>
        </div>
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
@endsection

@push('js')
    <script>
        const chartCategories = @json($chartData['categories']);
        const chartSeries = @json($chartData['series']);

        var element = document.getElementById('kt_apexcharts_3');

        var baseColor = '#3699FF';
        var lightColor = '#E1F0FF';
        var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--kt-gray-500');
        var borderColor = KTUtil.getCssVariableValue('--kt-gray-200');

        var options = {
            series: [{
                name: 'Total Income',
                data: chartSeries
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {

            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 1
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseColor]
            },
            xaxis: {
                categories: chartCategories,
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function (val) {
                        return 'Rp. ' + val.toLocaleString('id-ID')
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(element, options);
        chart.render();
    </script>
@endpush
