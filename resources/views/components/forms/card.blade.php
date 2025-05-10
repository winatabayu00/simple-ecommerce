<div class="card mb-5 mb-xl-10">

    @if(empty(trim(($header ?? null))))
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
             aria-expanded="true">

            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ $headerTitle }}</h3>
            </div>

        </div>
    @else
        {{ $header }}
    @endunless


    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ $formTargetUrl ?? null }}" id="{{ $formId ?? null }}"
          novalidate="novalidate">
        {{ $formMethod ?? null }}


        <div class="card-body border-top p-9">
            {{ $formContent }}
        </div>

        @if(empty(trim($footer ?? null)))
            @include('components.card.card-footer-submit')
        @else
            {{ $footer }}
        @endunless


    </form>

</div>

</div>
