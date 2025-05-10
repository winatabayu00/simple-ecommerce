<x-forms.card>
    <x-slot:headerTitle>
        {{ __('address.saved_address') }}
    </x-slot>

    <x-slot:formMethod>
        @method('PUT')
    </x-slot>

    <x-slot:formTargetUrl>
        {{ $formTargetUrl }}
    </x-slot>

    <x-slot:formContent>
        <div class="row mb-6">
            <label
                class="col-lg-4 col-form-label fw-semibold fs-6">
                {{ __('address.address') }}
            </label>

            <div class="col-lg-8">
                @include('components.address.select-geo-location', ['required_address' => true])
            </div>
        </div>
    </x-slot>
</x-forms.card>
