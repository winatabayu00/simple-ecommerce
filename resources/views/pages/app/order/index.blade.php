@extends('layouts.app-landing')

@section('app-content')
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Toolbar/Header Section -->
        <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-shopping-bag fs-2 text-primary me-3"></i>
                            <h1 class="page-heading d-flex text-dark fw-bold fs-2 flex-column justify-content-center my-0">
                                Pesanan Saya
                            </h1>
                        </div>
                        <span class="text-muted fs-6 fw-semibold mt-1">Riwayat pesanan yang telah Anda buat</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card card-flush mb-5 shadow-sm">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative">
                                <i class="fa-solid fa-list-check fs-2 text-primary me-2"></i>
                                <span class="fs-4 fw-bold">Daftar Pesanan</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-4" id="kt_ecommerce_sales_table">
                                <thead>
                                    <tr class="fw-bold text-gray-800 border-bottom border-gray-200 text-uppercase">
                                        <th class="min-w-150px ps-4">Tanggal Pesanan</th>
                                        <th class="min-w-150px text-end">Total Harga</th>
                                        <th class="min-w-100px text-end">Jumlah Item</th>
                                        <th class="min-w-100px text-end">Status</th>
                                        <th class="min-w-100px text-end pe-4">Aksi</th>
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
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-calendar-day fs-4 text-primary me-2"></i>
                                                <span class="fw-bold text-gray-800">{{ $order->created_at->format('d M Y, H:i') }}</span>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge badge-light-success fs-7 fw-bold">
                                                {{ \Akaunting\Money\Money::IDR($order->total) }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <div class="badge badge-light-primary rounded-circle p-2 me-2">
                                                    <span class="fw-bold">{{ $order->order_items_count }}</span>
                                                </div>
                                                <span class="fw-semibold text-gray-600">item</span>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            @php
                                                $statusClass = 'light-danger';
                                                $statusIcon = 'fa-times-circle';

                                                if (strtolower($order->status) == 'completed') {
                                                    $statusClass = 'light-success';
                                                    $statusIcon = 'fa-check-circle';
                                                } elseif (strtolower($order->status) == 'processing') {
                                                    $statusClass = 'light-warning';
                                                    $statusIcon = 'fa-clock';
                                                } elseif (strtolower($order->status) == 'pending') {
                                                    $statusClass = 'light-primary';
                                                    $statusIcon = 'fa-hourglass-half';
                                                }
                                            @endphp
                                            <div class="badge badge-{{ $statusClass }} d-inline-flex align-items-center px-3 py-2">
                                                <i class="fa-solid {{ $statusIcon }} fs-7 me-1"></i>
                                                <span class="fw-bold">{{ $order->status }}</span>
                                            </div>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="{{ route('my-order.detail', ['order' => $order->id]) }}"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                                <i class="fa-solid fa-eye fs-5"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if(count($orders) == 0)
                        <div class="text-center py-10">
                            <img src="{{ asset('media/illustrations/sketchy-1/5.png') }}" alt="Empty Orders" class="mw-100 mh-200px">
                            <div class="mt-5">
                                <h3 class="fs-2 fw-bolder text-gray-800 mb-3">Belum Ada Pesanan</h3>
                                <p class="text-gray-600 fs-6 mb-5">Anda belum melakukan pemesanan apapun</p>
                                <a href="{{ route('products.index') }}" class="btn btn-primary btn-flex">
                                    <i class="fa-solid fa-cart-plus fs-4 me-2"></i>
                                    Belanja Sekarang
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
@endpush

@push('css')
<style>
    /* Enhanced hover effects */
    .table-row-gray-100 tr:hover {
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    /* Badge styling */
    .badge {
        font-weight: 500;
    }

    /* Button styling */
    .btn-flex {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush
