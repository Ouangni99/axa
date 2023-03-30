    <base href="{{ URL::to('') }}" />
    <title>{{ end($breadcrumb['menu-item']) }} - Xsel Services </title>
    <meta charset="utf-8" />
    <meta name="description" content=" XSEL Services est une entreprise composée d'ingénieurs et de techniciens pointus du domaine de l'Informatique"/>
    <meta name="keywords" content="XSEL Services est une entreprise composée d'ingénieurs et de techniciens pointus du domaine de l'Informatique"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-mini.png') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!--start::intl-tel-input-->
    <link rel="stylesheet" href="{{asset('assets/intl-tel-input-17.0.19/build/css/intlTelInput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/intl-tel-input-17.0.19/build/css/custom.css')}}">

    <!--start::custom theme-->
    <link href="{{ asset('assets/css/theme/custom.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('assets/css/theme/custom-auth.css') }}" rel="stylesheet" type="text/css" /> --}}

    <!--csrf-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

