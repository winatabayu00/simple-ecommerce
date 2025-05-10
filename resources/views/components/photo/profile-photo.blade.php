<div class="row mb-6">
    <label
        class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('general.profile_photo') }}</label>
    <div class="col-lg-8">
        <!--begin::Image input-->
        <div class="image-input image-input-outline" data-kt-image-input="true"
             style="background-image: url('{{ cachedAsset('media/svg/avatars/blank.svg') }}')">
            <!--begin::Preview existing avatar-->
            <div class="image-input-wrapper w-125px h-125px"
                 style="background-image: url({{ cachedAsset('media/svg/avatars/blank.svg') }})"></div>
            <!--end::Preview existing avatar-->

            <!--begin::Label-->
            <label
                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                aria-label="Change avatar" data-bs-original-title="Change avatar"
                data-kt-initialized="1">
                <i class="fa-solid fa-pencil fs-7"></i>
                <!--begin::Inputs-->
                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                <input type="hidden" name="avatar_remove">
                <!--end::Inputs-->
            </label>
            <!--end::Label-->

            <!--begin::Cancel-->
            <span
                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                data-kt-initialized="1">
                <i class="fa-solid fa-xmark"></i>
            </span>
            <!--end::Cancel-->

            <!--begin::Remove-->
            <span
                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                data-kt-initialized="1">
                <i class="fa-solid fa-xmark"></i>
            </span>
            <!--end::Remove-->
        </div>
        <!--end::Image input-->

        <!--begin::Hint-->
        <div class="form-text">{{ __('general.allowed_mime_type') }}</div>
        <!--end::Hint-->
    </div>
</div>
