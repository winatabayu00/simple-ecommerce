@extends('layouts.app-landing')

@section('app-content')
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Toolbar/Header Section -->
        <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-receipt fs-2 text-primary me-3"></i>
                            <h1 class="page-heading d-flex text-dark fw-bold fs-2 flex-column justify-content-center my-0">
                                Detail Pesanan #{{ $order->id }}
                            </h1>
                        </div>
                        <span class="text-muted fs-6 fw-semibold mt-1">Informasi lengkap tentang pesanan Anda</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('my-order.index') }}" class="btn btn-light-primary btn-sm btn-flex">
                            <i class="fa-solid fa-arrow-left fs-7 me-1"></i>
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!-- Order Summary Section -->
                <div class="d-flex flex-column flex-xl-row gap-5 mb-5">
                    <!-- Order Details Card -->
                    <div class="card card-flush py-4 flex-row-fluid shadow-sm">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-clipboard-list fs-2 text-primary me-2"></i>
                                    <h3 class="fw-bold m-0">Informasi Pesanan</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-calendar-day fs-4 text-gray-500 me-2"></i> Tanggal Pesanan
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">{{ \Illuminate\Support\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-credit-card fs-4 text-gray-500 me-2"></i> Metode Pembayaran
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                <span class="badge badge-light-primary">Online</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-money-bill-wave fs-4 text-gray-500 me-2"></i> Total Harga
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                <span class="badge badge-light-success fs-6">{{ \Akaunting\Money\Money::IDR($order->total) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-tag fs-4 text-gray-500 me-2"></i> Status
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
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
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Details Card -->
                    <div class="card card-flush py-4 flex-row-fluid shadow-sm">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-user fs-2 text-primary me-2"></i>
                                    <h3 class="fw-bold m-0">Informasi Pelanggan</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-user-circle fs-4 text-gray-500 me-2"></i> Nama
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <a href="#" class="text-gray-800 text-hover-primary">
                                                        {{ $order->user->name }}
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-envelope fs-4 text-gray-500 me-2"></i> Email
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                <a href="#" class="text-gray-800 text-hover-primary">
                                                    {{ $order->user->email }}
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address Card -->
                    <div class="card card-flush py-4 flex-row-fluid shadow-sm">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-map-marker-alt fs-2 text-primary me-2"></i>
                                    <h3 class="fw-bold m-0">Alamat Pengiriman</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="bg-light-primary rounded p-5">
                                @if($order->address)
                                    <p class="text-gray-800 mb-0">{{ $order->address }}</p>
                                @else
                                    <p class="text-muted mb-0">Tidak ada alamat pengiriman</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items Section -->
                <div class="card card-flush shadow-sm mb-5">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-box-open fs-2 text-primary me-2"></i>
                                <h3 class="fw-bold m-0">Daftar Produk</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-4">
                                <thead>
                                    <tr class="fw-bold text-gray-800 border-bottom border-gray-200 text-uppercase">
                                        <th class="min-w-200px ps-4">Produk</th>
                                        <th class="min-w-100px text-end">Harga</th>
                                        <th class="min-w-70px text-end">Jumlah</th>
                                        <th class="min-w-100px text-end">Subtotal</th>
                                        <th class="min-w-100px text-end pe-4">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php
                                    $grandTotal = 0;
                                @endphp
                                @foreach($order->orderItems as $orderItem)
                                    @php
                                        $subtotal = (string)$orderItem->product->price * $orderItem->quantity;
                                        $grandTotal += $subtotal;
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50px symbol-square overflow-hidden me-3">
                                                    <a href="{{ route('products.preview', ['product' => $orderItem->product_id]) }}">
                                                        <div class="symbol-label bg-light">
                                                            <img src="{{ $orderItem->product->image }}"
                                                                 alt="{{ $orderItem->product->name }}"
                                                                 class="w-100 h-100 object-fit-cover">
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="d-flex flex-column">
                                                    <a href="{{ route('products.preview', ['product' => $orderItem->product_id]) }}"
                                                       class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">
                                                        {{ $orderItem->product->name }}
                                                    </a>
                                                    <span class="text-muted fs-7">ID: #{{ $orderItem->product_id }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge badge-light-success fs-7 fw-bold">
                                                {{ \Akaunting\Money\Money::IDR($orderItem->product->price) }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <span class="fw-bold text-dark">{{ $orderItem->quantity }}</span>
                                        </td>
                                        <td class="text-end">
                                            <span class="fw-bold text-primary">
                                                {{ \Akaunting\Money\Money::IDR($subtotal, true) }}
                                            </span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="{{ route('products.preview', ['product' => $orderItem->product_id]) }}"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Produk">
                                                <i class="fa-solid fa-eye fs-5"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tfoot>
                                    <tr class="border-top border-gray-200">
                                        <td colspan="3" class="text-end pe-3 fs-5 fw-bold text-dark">Total Pembayaran:</td>
                                        <td class="text-end fs-5 fw-bolder text-primary">{{ \Akaunting\Money\Money::IDR($grandTotal, true) }}</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
    /* Product image styling */
    .object-fit-cover {
        object-fit: cover;
    }

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
