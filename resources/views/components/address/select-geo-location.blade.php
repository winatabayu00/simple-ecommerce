<div id="fieldCountry" class="fv-row mb-8" hidden="hidden">
    <!--begin::Email-->
    <label class="required" for="">{{ __('address.select_country') }}</label>
    <select id="country" class="form-select " data-control="select2" autocomplete="off" data-placeholder="{{ __('address.select_country') }}"
            name="country_id" data-allow-clear="true">
        <option></option>
    </select>

    @error('country_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div id="fieldProvince" class="fv-row mb-8" hidden="hidden">
    <!--begin::Email-->
    <label class="required" for="">{{ __('address.select_province') }}</label>
    <select id="province" class="form-select " data-control="select2" autocomplete="off" data-placeholder="{{ __('address.select_province') }}"
            name="province_id" data-allow-clear="true">
        <option></option>
    </select>

    @error('province_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div id="fieldCity" class="fv-row mb-8" hidden="hidden">
    <!--begin::Email-->
    <label class="required" for="">{{ __('address.select_city') }}</label>
    <select id="city" class="form-select " data-control="select2" autocomplete="off" data-placeholder="{{ __('address.select_city') }}"
            name="city_id" data-allow-clear="true">
        <option></option>
    </select>

    @error('city_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div id="fieldDistrict" class="fv-row mb-8" hidden="hidden">
    <!--begin::Email-->
    <label class="required" for="">{{ __('address.select_district') }}</label>
    <select id="district" class="form-select " data-control="select2" autocomplete="off" data-placeholder="{{ __('address.select_district') }}"
            name="district_id" data-allow-clear="true">
        <option></option>
    </select>

    @error('district_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div id="fieldSubDistrict" class="fv-row mb-8" hidden="hidden">
    <!--begin::Email-->
    <label class="required" for="">{{ __('address.select_sub_district') }}</label>
    <select id="subDistrict" class="form-select " data-control="select2" autocomplete="off" data-placeholder="{{ __('address.select_sub_district') }}"
            name="sub_district_id" data-allow-clear="true">
        <option></option>
    </select>

    @error('sub_district_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

@if($required_address ?? false)
    <div id="fieldAddress" class="fv-row mb-8" hidden="hidden">
        <label class="required" for="">{{ __('address.address') }}</label>
        <div class="input-group mb-3">
            <input class="form-control" type="text" name="address" value="{{ old('addresses.address') }}"
                   autocomplete="off"
                   placeholder="{{ __('address.address') }}">
        </div>

        @error('address')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
@endif

@push('js')

    @vite([
       'resources/js/select-geo-location.js'
   ])

    <script>
        window.GeoLocation = {!! json_encode([
            'app_url' => env('APP_URL'),
            'addresses' => old('addresses'),
            'csrf_token' => csrf_token(),
        ]) !!};
    </script>
@endpush
