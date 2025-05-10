<!--begin::Header-->
<div id="kt_app_header" class="app-header d-flex flex-column flex-stack">

    <!--begin::Header main-->
    <div class="d-flex flex-stack flex-grow-1">

        <div class="app-header-logo d-flex align-items-center ps-lg-12" id="kt_app_header_logo">
            <!--begin::Sidebar toggle-->
            <div id="kt_app_sidebar_toggle"
                class="app-sidebar-toggle btn btn-sm btn-icon bg-body btn-color-gray-600 btn-active-color-primary w-30px h-30px ms-n2 d-none d-lg-flex me-4"
                data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                data-kt-toggle-name="app-sidebar-minimize">

                <!--begin::Svg Icon | path: icons/duotune/text/txt012.svg-->
                <span class="svg-icon svg-icon-6"><svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="2" rx="1" transform="matrix(-1 0 0 1 16 0)"
                            fill="currentColor" />
                        <rect width="16" height="2" rx="1" transform="matrix(-1 0 0 1 16 6)"
                            fill="currentColor" />
                        <rect width="16" height="2" rx="1" transform="matrix(-1 0 0 1 16 12)"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Sidebar toggle-->

            <!--begin::Sidebar mobile toggle-->
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px d-flex d-lg-none me-2 ms-3"
                id="kt_app_sidebar_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Sidebar mobile toggle-->

            <!--begin::Logo-->
            <a href="{{ route('admin.dashboard.index') }}" class="app-sidebar-logo">
                <img alt="Logo" src="{{ asset('images/logos/Pasar_Solar.png') }}" class="h-50px theme-light-show" />
                <img alt="Logo" src="{{ asset('images/logos/Pasar_Solar.png') }}"
                    class="h-50px theme-dark-show" />
            </a>
            <!--end::Logo-->
        </div>

        <!--begin::Navbar-->
        @include('layouts.blocks.navbar')
        <!--end::Navbar-->
    </div>
</div>
    <!--end::Header main-->
