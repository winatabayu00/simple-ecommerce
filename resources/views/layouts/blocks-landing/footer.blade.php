<div class="mb-0">
    <div class="landing-curve landing-dark-color ">
        <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                fill="currentColor"></path>
        </svg>
    </div>

    <div class="landing-dark-bg pt-20">
        <div class="container">
            <div class="row py-10 py-lg-20">
                <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                    <div class="rounded landing-dark-border p-9">
                        <h2 class="text-white">Lokasi</h2>

                        <span class="fw-normal fs-4 text-gray-700">
                            Jl. Raya Menganti, Pengampon, Setro, Kec. Menganti, Kabupaten Gresik, Jawa Timur, Indonesia
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <div class="landing-dark-separator"></div>

        <div class="container">
            <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                <div class="d-flex align-items-center order-2 order-md-1">

                    <span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="{{ route('home') }}">
								&copy; 2025 {{ env('APP_NAME') }}.
							</span>
                </div>

                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                    <li class="menu-item">
                        <a href="{{ route('home') }}" class="menu-link px-2">Beranda</a>
                    </li>

                    <li class="menu-item mx-5">
                        <a href="{{ route('about-us') }}"
                           class="menu-link px-2">Tentang Kami</a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('products.index') }}" class="menu-link px-2">Produk Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
