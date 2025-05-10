<!--begin::Page title-->
<div class="page-title d-flex flex-column justify-content-center me-3 gap-1">
    <!--begin::Title-->
    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
        {{ $pageTitle ?? 'Untitled Page' }}
    </h1>
    <!--end::Title-->

    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
            <a href="{{ route('admin.dashboard.index') }}" class="text-white text-hover-primary">
                <i class="fa-solid fa-house"></i> </a>
        </li>
        <!--end::Item-->

        @foreach ($breadCrumbs ?? [] as $bc)
            <li class="breadcrumb-item">
                <i class="bullet bg-gray-500 w-5px h-2px"></i>
            </li>
            @if ($bc->url == '#' || empty($bc->url))
                <li class="breadcrumb-item text-dark active"><span>{{ $bc->title }}</span></li>
            @else
                <li class="breadcrumb-item text-muted">
                    <a href="{{ $bc->url }}"
                       class="text-muted"><span>{{ $bc->title }}</span></a>
                </li>
            @endif
        @endforeach

    </ul>
    <!--end::Breadcrumb-->
</div>
<!--end::Page title-->
