<div class="app-navbar-item ms-2 ms-lg-6" id="kt_header_user_menu_toggle">
    <!--begin::Menu wrapper-->
    <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-lg-45px show menu-dropdown"
        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
        data-kt-menu-placement="bottom-end">
        <img src="{{ asset('media/svg/avatars/blank.svg') }}" alt="user">
    </div>

    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
        data-kt-menu="true"
        style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-77.7778px, 70px);"
        data-popper-placement="bottom-end">

        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="{{ asset('media/svg/avatars/blank.svg') }}">
                </div>
                <!--end::Avatar-->

                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bold d-flex align-items-center fs-5">
                        {{ activeUser()?->name ?? 'Minefore User' }} <span
                            class="badge badge-light-success fw-bold fs-8 ms-2 px-2 py-1">Pro</span>
                    </div>

                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                        {{ activeUser()?->email ?? 'Minefore Email' }} </a>
                </div>
                <!--end::Username-->
            </div>
        </div>
        <!--end::Menu item-->

        @if(auth()->check() && !auth()->user()->isAdmin())

        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->

        <div class="menu-item px-5">
            <a href="{{ route('cart.index') }}" class="menu-link px-5">
                <span class="menu-title">
                    Cart

                    <span class="position-absolute translate-middle-y top-50 end-0 ms-5">
                        <i class="ki-outline ki-night-day theme-light-show fs-2"></i> <i
                            class="ki-outline ki-moon theme-dark-show fs-2"></i> </span>
                </span>
            </a>

        </div>

            <div class="menu-item px-5">
            <a href="{{ route('my-order.index') }}" class="menu-link px-5">
                <span class="menu-title">
                    My Orders

                    <span class="position-absolute translate-middle-y top-50 end-0 ms-5">
                        <i class="ki-outline ki-night-day theme-light-show fs-2"></i> <i
                            class="ki-outline ki-moon theme-dark-show fs-2"></i> </span>
                </span>
            </a>

        </div>

        @endif

        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->

        <!--begin::Menu item-->
        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
            data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
            <a href="#" class="menu-link px-5">
                <span class="menu-title">
                    Mode

                    <span class="position-absolute translate-middle-y top-50 end-0 ms-5">
                        <i class="ki-outline ki-night-day theme-light-show fs-2"></i> <i
                            class="ki-outline ki-moon theme-dark-show fs-2"></i> </span>
                </span>
            </a>

            <!--begin::Menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold fs-base w-150px py-4"
                data-kt-menu="true" data-kt-element="theme-mode-menu">
                <!--begin::Menu item-->
                <div class="menu-item my-0 px-3">
                    <a href="#" class="menu-link active px-3 py-2" data-kt-element="mode" data-kt-value="light">
                        <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-outline ki-night-day fs-2"></i> </span>
                        <span class="menu-title">
                            Light
                        </span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item my-0 px-3">
                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                        <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-outline ki-moon fs-2"></i> </span>
                        <span class="menu-title">
                            Dark
                        </span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item my-0 px-3">
                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                        <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-outline ki-screen fs-2"></i> </span>
                        <span class="menu-title">
                            System
                        </span>
                    </a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu-->

        </div>
        <!--end::Menu item-->

        <!--begin::Menu item-->
        <form action="{{ route('auth.logout') }}" method="post">
            <div class="menu-item px-5">

                @csrf
                @method('DELETE')
                <button class="menu-link px-5 btn btn-outline-danger text-danger btn-active-color-gray-100">
                    Sign Out
                </button>

            </div>
        </form>

        <!--end::Menu item-->
    </div>
    <!--begin::User account menu-->

    <!--end::User account menu-->
    <!--end::Menu wrapper-->
</div>
