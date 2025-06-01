@extends('layouts.app-landing')

@section('app-content')

    <div class="d-flex flex-column flex-column-fluid">

        <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">

            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-2 flex-column justify-content-center my-0">
                            Keranjang Belanja
                        </h1>
                        <span class="text-muted fs-6 fw-semibold mt-1">Produk yang Anda pilih untuk dibeli</span>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card card-flush mb-5 shadow-sm">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative">
                                <i class="fa-solid fa-cart-shopping fs-2 text-primary me-2"></i>
                                <span class="fs-4 fw-bold">Daftar Produk</span>
                            </div>
                        </div>

                        <div class="card-toolbar">
                            <button type="button" class="btn btn-primary btn-flex" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                                <i class="fa-solid fa-credit-card fs-4 me-2"></i>
                                Checkout
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-4" id="kt_ecommerce_sales_table">
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
                                    @foreach($carts as $cart)
                                        @php
                                            $subtotal = (string)$cart->product->price * $cart->quantity;
                                            $grandTotal += $subtotal;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px symbol-square overflow-hidden me-3">
                                                        <a href="{{ route('products.preview', ['product' => $cart->product_id]) }}">
                                                            <div class="symbol-label bg-light">
                                                                <img src="{{ $cart->product->image }}"
                                                                     alt="{{ $cart->product->name }}"
                                                                     class="w-100 h-100 object-fit-cover">
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="d-flex flex-column">
                                                        <a href="{{ route('products.preview', ['product' => $cart->product_id]) }}"
                                                           class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">
                                                            {{ $cart->product->name }}
                                                        </a>
                                                        <span class="text-muted fs-7">ID: #{{ $cart->product_id }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge badge-light-success fs-7 fw-bold">
                                                    {{ \Akaunting\Money\Money::IDR($cart->product->price) }}
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <span class="fw-bold text-dark">{{ $cart->quantity }}</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="fw-bold text-primary">
                                                    {{ \Akaunting\Money\Money::IDR($subtotal, true) }}
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end flex-shrink-0">
                                                    <a href="{{ route('products.preview', ['product' => $cart->product_id]) }}"
                                                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-2"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Produk">
                                                        <i class="fa-solid fa-eye fs-5"></i>
                                                    </a>
                                                    <form action="{{ route('cart.remove-from-cart', ['cartItem' => $cart->id]) }}"
                                                          method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                                class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus dari Keranjang">
                                                            <i class="fa-solid fa-trash fs-5"></i>
                                                        </button>
                                                    </form>
                                                </div>
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

                        @if(count($carts) == 0)
                        <div class="text-center py-10">
                            <img src="{{ asset('media/illustrations/sketchy-1/5.png') }}" alt="Empty Cart" class="mw-100 mh-200px">
                            <div class="mt-5">
                                <h3 class="fs-2 fw-bolder text-gray-800 mb-3">Keranjang Anda Kosong</h3>
                                <p class="text-gray-600 fs-6 mb-5">Anda belum menambahkan produk apapun ke keranjang</p>
                                <a href="{{ route('products.index') }}" class="btn btn-primary btn-flex">
                                    <i class="fa-solid fa-cart-plus fs-4 me-2"></i>
                                    Belanja Sekarang
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                @if(count($carts) > 0)
                <div class="card card-flush shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Ringkasan Belanja</span>
                            <span class="text-gray-500 mt-1 fw-semibold fs-7">Detail total pembayaran</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column gap-5">
                            <div class="d-flex justify-content-between">
                                <span class="fw-semibold text-gray-600">Subtotal</span>
                                <span class="fw-bold text-dark">{{ \Akaunting\Money\Money::IDR($grandTotal, true) }}</span>
                            </div>
                            <div class="separator separator-dashed"></div>
                            <div class="d-flex justify-content-between">
                                <span class="fw-semibold text-gray-600">Total</span>
                                <span class="fw-bolder text-primary fs-5">{{ \Akaunting\Money\Money::IDR($grandTotal, true) }}</span>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary btn-flex" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                                    <i class="fa-solid fa-credit-card fs-4 me-2"></i>
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>



    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fw-bolder">Konfirmasi Pembelian</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('cart.checkout') }}" method="post" id="kt_checkout_form">
                    @csrf
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_checkout_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_checkout_header" data-kt-scroll-wrappers="#kt_modal_checkout_scroll" data-kt-scroll-offset="300px">

                            <!--begin::Payment Method-->
                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Metode Pembayaran</label>
                                <select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#kt_modal_1" data-placeholder="Pilih metode pembayaran" data-allow-clear="true" name="payment_method">
                                    <option></option>
                                    @foreach($paymentMethods as $paymentMethod)
                                        <option value="{{ $paymentMethod->value }}" @selected(old('payment_method') == $paymentMethod->value)>{{ $paymentMethod->label() }}</option>
                                    @endforeach
                                </select>
                                <div class="text-muted fs-7 mt-2">Pilih metode pembayaran yang Anda inginkan</div>
                            </div>
                            <!--end::Payment Method-->

                            <!--begin::Phone Number-->
                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Nomor Yang Bisa Dihubungi</label>
                                <input type="number" class="form-control form-control-solid" placeholder="Masukkan nomor telepon" name="phone" value="{{ old('phone') }}">
                                <div class="text-muted fs-7 mt-2">Nomor telepon aktif untuk konfirmasi pesanan</div>
                            </div>
                            <!--end::Phone Number-->

                            <!--begin::Shipping Address-->
                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Lokasi Pengiriman</label>
                                <textarea class="form-control form-control-solid" rows="3" placeholder="Masukkan alamat lengkap" name="address">{{ old('address') }}</textarea>
                                <div class="text-muted fs-7 mt-2">Alamat lengkap untuk pengiriman pesanan</div>
                            </div>
                            <!--end::Shipping Address-->

                            <!--begin::Notes-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Catatan</label>
                                <textarea class="form-control form-control-solid" rows="3" placeholder="Catatan tambahan (opsional)" name="notes">{{ old('notes') }}</textarea>
                                <div class="text-muted fs-7 mt-2">Catatan tambahan untuk pesanan Anda (opsional)</div>
                            </div>
                            <!--end::Notes-->

                            <!--begin::Order Summary-->
                            <div class="separator separator-dashed my-8"></div>

                            <div class="rounded border p-5 mt-5">
                                <h3 class="fs-5 fw-bold mb-3">Ringkasan Pesanan</h3>

                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-gray-600">Total Item:</span>
                                        <span class="fw-semibold text-gray-800">{{ count($carts) }} Produk</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-gray-600">Total Pembayaran:</span>
                                        <span class="fw-bold text-primary">{{ \Akaunting\Money\Money::IDR($grandTotal, true) }}</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Order Summary-->
                        </div>
                        <!--end::Scroll-->
                    </div>

                    <div class="modal-footer flex-center">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">
                            <i class="fa-solid fa-times fs-4 me-2"></i>
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary" id="kt_checkout_submit">
                            <span class="indicator-label">
                                <i class="fa-solid fa-check fs-4 me-2"></i>
                                Proses Pesanan
                            </span>
                            <span class="indicator-progress">
                                Mohon tunggu... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@push('js')
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Submit button indicator
    const button = document.getElementById('kt_checkout_submit');
    if (button) {
        button.addEventListener('click', function() {
            button.setAttribute('data-kt-indicator', 'on');

            // Form will be submitted naturally, this just shows the indicator
            setTimeout(function() {
                button.removeAttribute('data-kt-indicator');
            }, 2000);
        });
    }
</script>
@endpush

@push('css')
<style>
    /* Product image styling */
    .object-fit-cover {
        object-fit: cover;
    }

    /* Enhanced hover effects */
    .btn-flex {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    /* Table row hover effect */
    .table-row-gray-100 tr:hover {
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }
</style>
@endpush
@endsection
