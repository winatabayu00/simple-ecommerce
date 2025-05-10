<div class="fv-row mb-8">
    <!--begin::Email-->
    <label class="required" for="filter_date_start">Date Start</label>
    <input class="form-control date-range-picker" name="filter_date_start" placeholder="{{ __('general.pick_a_date') }}"
           value="{{ request()->input('filter_date_start') }}" id="filter_date_start"/>

    @error('filter_date_start')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="fv-row mb-8">
    <!--begin::Email-->
    <label class="required" for="filter_date_end">Date End</label>
    <input class="form-control date-range-picker" name="filter_date_end" placeholder="{{ __('general.pick_a_date') }}"
           value="{{ request()->input('filter_date_end', now()->toDateString()) }}" id="filter_date_end"/>

    @error('filter_date_end')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

@push('js')
    <script>
        $(".date-range-picker").flatpickr();
    </script>
@endpush
