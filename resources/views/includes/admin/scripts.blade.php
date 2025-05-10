<script>
    var hostUrl = "{{ asset('') }}";
    // window.addEventListener('load', () => {
    //     console.clear();
    // });
</script>

<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>

{{--<script src="{{ cachedAsset('js/widgets.bundle.js') }}"></script>--}}
{{--<script src="{{ cachedAsset('js/custom/widgets.js') }}"></script>--}}

@stack('script')
@stack('js')
