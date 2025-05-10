<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->

@stack('styles')
@stack('css')


<!--Begin::Google Tag Manager -->
<script>
    // (function(w, d, s, l, i) {
    //     w[l] = w[l] || [];
    //     w[l].push({
    //         'gtm.start': new Date().getTime(),
    //         event: 'gtm.js'
    //     });
    //     var f = d.getElementsByTagName(s)[0],
    //         j = d.createElement(s),
    //         dl = l != 'dataLayer' ? '&l=' + l : '';
    //     j.async = true;
    //     j.src =
    //         '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
    //     f.parentNode.insertBefore(j, f);
    // })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
</script>
<!--End::Google Tag Manager -->
