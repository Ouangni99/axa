<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/intl-tel-input-17.0.19/build/js/intlTelInput.js')}}"></script>
<script>
    var hostUrl = "{{ URL::to('') }}";
    // var lang = {{ LaravelLocalization::getCurrentLocale() }};
    var lang = "{{ LaravelLocalization::getCurrentLocale() }}";
</script>
