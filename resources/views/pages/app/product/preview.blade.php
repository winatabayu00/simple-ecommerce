@extends('layouts.app-landing')

@section('app-content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!-- Product Header -->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!-- Product Image -->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-150px symbol-lg-200px mb-4 position-relative">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-100 h-200px object-fit-cover rounded">
                                <div class="position-absolute top-0 start-0 p-3">
                                    <span class="badge badge-primary shadow">Produk</span>
                                </div>
                            </div>
                            <div class="d-flex flex-center flex-wrap mb-5">
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-shopping-bag fs-2 me-2 text-primary"></i>
                                        <div class="fs-6 fw-bold text-gray-700">{{ $product->summary->total_selling }} Terjual</div>
                                    </div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-box fs-2 me-2 text-success"></i>
                                        <div class="fs-6 fw-bold text-gray-700">{{ $product->stock }} Stok</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <h2 class="text-gray-900 fs-2 fw-bold me-3">{{ ucwords($product->name) }}</h2>
                                        <span class="badge badge-light-success fs-base">
                                            <i class="fa-solid fa-check-circle fs-5 text-success me-1"></i>
                                            {{ \Akaunting\Money\Money::IDR($product->price) }}
                                        </span>
                                    </div>

                                    <div class="d-flex flex-wrap fw-semibold mb-4">
                                        <div class="d-flex align-items-center text-gray-500 me-5 mb-2">
                                            <i class="fa-solid fa-star fs-6 me-1 text-warning"></i>
                                            <span class="fs-7">{{ $product->summary->average_rating }} Rating</span>
                                        </div>
                                        <div class="rating">
                                            @for($i = 0; $i < round($product->summary->average_rating, 1); $i++)
                                                <div class="rating-label checked">
                                                    <i class="fa-solid fa-star fs-6 text-warning"></i>
                                                </div>
                                            @endfor
                                            @for($i = round($product->summary->average_rating, 1); $i < 5; $i++)
                                                <div class="rating-label">
                                                    <i class="fa-regular fa-star fs-6 text-muted"></i>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="separator my-5"></div>

                                <!-- Product Description -->
                                <div class="mb-5">
                                    <h3 class="fw-bold text-gray-800 mb-3">Deskripsi Produk</h3>
                                    <div class="text-gray-700 fw-semibold fs-6">
                                        {!! $product->description !!}
                                    </div>
                                </div>

                                <!-- Add to Cart Form -->
                                <form method="post" action="{{ route('cart.add-to-cart') }}" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                                    @csrf
                                    <input name="product_id" value="{{ $product->id }}" hidden="hidden">

                                    <div class="d-flex flex-column flex-md-row gap-5 align-items-md-center mb-7">
                                        <div class="d-flex align-items-center me-3">
                                            <span class="fs-4 fw-bold text-gray-700 me-3">Jumlah:</span>

                                            <div class="position-relative d-flex align-items-center" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1" data-kt-dialer-decimals="0">
                                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                                    <i class="fa-solid fa-circle-minus fs-1"></i>
                                                </button>

                                                <input type="text" class="form-control form-control-solid w-70px text-center" placeholder="1" name="quantity" readonly value="1">

                                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                                    <i class="fa-solid fa-circle-plus fs-1"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <span class="badge badge-light-info fs-7">
                                            Tersedia: {{ $product->stock }} item
                                        </span>
                                    </div>

                                    <div class="d-flex gap-3">
                                        <a href="{{ route('products.index') }}" class="btn btn-light-primary btn-flex">
                                            <i class="fa-solid fa-arrow-left fs-3 me-2"></i>
                                            Kembali
                                        </a>

                                        <button type="submit" class="btn btn-primary btn-flex" id="kt_add_to_cart_submit">
                                            <span class="indicator-label">
                                                <i class="fa-solid fa-cart-plus fs-3 me-2"></i>
                                                Tambah ke Keranjang
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
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="card card-flush mb-0">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Ulasan Pelanggan</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-7">{{ count($reviews) }} Ulasan dari Pembeli</span>
                    </h3>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center position-relative">
                            <i class="fa-solid fa-magnifying-glass fs-3 position-absolute ms-4"></i>
                            <input type="text" class="form-control form-control-sm form-control-solid w-200px ps-12" placeholder="Cari ulasan...">
                        </div>
                    </div>
                </div>

                <div class="card-body pt-5">
                    <!-- Add Review Form -->
                    @if(auth()->check())
                        <div class="d-flex flex-column mb-8">
                            <div class="border border-dashed border-gray-300 rounded p-6 mb-6">
                                <form action="{{ route('rating.give-rating') }}" method="post" class="form">
                                    @csrf
                                    <input hidden="hidden" name="product_id" value="{{$product->id}}">

                                    <div class="d-flex flex-column mb-8">
                                        <div class="d-flex align-items-center mb-5">
                                            <div class="symbol symbol-35px me-3">
                                                <img src="{{ asset('media/svg/avatars/blank.svg') }}" alt="Avatar">
                                            </div>
                                            <div>
                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">{{ auth()->user()->name }}</a>
                                                <span class="text-muted d-block fs-7">{{ auth()->user()->email }}</span>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <label class="form-label fw-semibold">Beri Rating:</label>
                                            <div class="rating mb-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <label class="rating-label me-2" for="kt_rating_2_input_{{ $i }}">
                                                        <i class="fa-solid fa-star fs-2 text-gray-300 rating-icon"></i>
                                                    </label>
                                                    <input class="rating-input d-none" name="rating" value="{{ $i }}" type="radio" id="kt_rating_2_input_{{ $i }}"/>
                                                @endfor
                                            </div>
                                        </div>

                                        <textarea class="form-control form-control-solid mb-5" name="comment" rows="4" placeholder="Tulis ulasan Anda di sini..."></textarea>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa-solid fa-paper-plane fs-7 me-1"></i>
                                                Kirim Ulasan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif

                    <!-- Customer Reviews -->
                    <div class="mb-0">
                        <div class="separator separator-dashed my-8"></div>

                        @foreach($reviews as $review)
                            <div class="d-flex mb-7">
                                <div class="symbol symbol-35px me-5">
                                    <img src="{{ asset('media/svg/avatars/blank.svg') }}" alt="Avatar">
                                </div>

                                <div class="d-flex flex-column flex-grow-1">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold me-3">{{ $review->user->name }}</a>
                                        <span class="text-muted fs-8 me-auto">{{ $review->created_at->diffForHumans() }}</span>

                                        <div class="rating">
                                            @for($i = 0; $i < $review->rating; $i++)
                                                <div class="rating-label checked">
                                                    <i class="fa-solid fa-star fs-7 text-warning"></i>
                                                </div>
                                            @endfor
                                            @for($i = $review->rating; $i < 5; $i++)
                                                <div class="rating-label">
                                                    <i class="fa-regular fa-star fs-7 text-muted"></i>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>

                                    <p class="text-gray-800 fs-7 fw-normal mb-2">{{ $review->comment }}</p>
                                </div>
                            </div>
                            @if(!$loop->last)
                                <div class="separator separator-dashed my-8"></div>
                            @endif
                        @endforeach

                        <div class="d-flex flex-center">
                            {{ $reviews->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Enhanced rating star interactions
        document.querySelectorAll('.rating-label').forEach(function(label, index) {
            label.addEventListener('mouseenter', function() {
                const ratingValue = index + 1;
                document.querySelectorAll('.rating-icon').forEach(function(star, i) {
                    if (i <= index) {
                        star.classList.add('text-warning');
                        star.classList.remove('text-gray-300');
                        star.classList.remove('fa-regular');
                        star.classList.add('fa-solid');
                    } else {
                        star.classList.add('text-gray-300');
                        star.classList.remove('text-warning');
                        star.classList.remove('fa-solid');
                        star.classList.add('fa-regular');
                    }
                });
            });
        });

        // Submit button indicator
        const button = document.getElementById('kt_add_to_cart_submit');
        button.addEventListener('click', function() {
            button.setAttribute('data-kt-indicator', 'on');

            // Simulate form submission and remove indicator after 1.5 seconds
            setTimeout(function() {
                button.removeAttribute('data-kt-indicator');
            }, 1500);
        });
    </script>
@endpush

@push('css')
    <style>
        /* Enhanced rating hover effects */
        .rating-label {
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .rating-label:hover {
            transform: scale(1.2);
        }

        /* Product image styling */
        .object-fit-cover {
            object-fit: cover;
        }

        /* Custom dialer styling */
        [data-kt-dialer="true"] {
            border: 1px solid var(--kt-gray-300);
            border-radius: 0.475rem;
            padding: 0.5rem 2.5rem;
        }

        /* Enhance hover effects */
        .btn-flex {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush
