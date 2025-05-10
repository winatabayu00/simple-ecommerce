<div id="{{ "{$drawerId}_id" }}" class="bg-body drawer drawer-end drawer-off" data-kt-drawer="true"
     data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"
     data-kt-drawer-toggle="#{{ $drawerId }}" data-kt-drawer-close="#{{ "{$drawerId}_close" }}"
     style="width: 500px !important;">

    <div class="card w-100 border-0 rounded-0" id="kt_drawer_chat_messenger">

        <x-forms.card>
            <x-slot:header>
                <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                    <div class="card-title">
                        <div class="d-flex justify-content-center flex-column me-3">
                            <a href="#"
                               class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $headerTitle }}</a>
                        </div>
                    </div>

                    <div class="card-toolbar">

                        <div class="btn btn-sm btn-icon btn-active-color-primary" id="{{ "{$drawerId}_close" }}">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot:formId>
                {{ (!empty($formType) && $formType == 'filter') ? 'form-filter' : null }}
            </x-slot>

            <x-slot:headerTitle>
                {{ $headerTitle }}
            </x-slot>

            <x-slot:formTargetUrl>
                {{ $formTargetUrl ?? null }}
            </x-slot>

            <x-slot:formContent>
                {{ $formContent }}
            </x-slot>

            <x-slot:footer>
                {{ $footer ?? null }}
            </x-slot>
        </x-forms.card>

    </div>
</div>
