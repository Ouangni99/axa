<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <!--Props start-->
    @props([
        'breadcrumbTrail',
    ])
    <x-skeleton.head :breadcrumb="$breadcrumbTrail"/>
    @php
        $currentRoute = \App\Classes\Ressources::current_route();
        $jsFilesRessources = \App\Classes\Ressources::jsFilesArray($currentRoute,'js');
        $cssFilesRessources = \App\Classes\Ressources::jsFilesArray($currentRoute,'css');
        // exit;
   @endphp

    <!--begin::css-->
    <x-resources.resources-css :css="$cssFilesRessources"/>
    <!--end::css-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
    data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">

    <!--Props start-->
    {{-- @props([
        'breadcrumbTrail',
    ]) --}}
    <!--Props end-->
    {{-- @php dd($breadcrumb)@endphp --}}

    <!--layout-partial:partials/theme-mode/_init.html-->
    <x-layout.partials.theme-mode.init />
    <!--layout-partial:layout/partials/_page-loader.html-->
    <x-layout.partials.page-loader.page-loader />
    <!--layout-partial:layout/_default.html-->
    {{-- <x-layout.main/> --}}
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
            <!--layout-partial:layout/partials/_header.html-->
            <x-layout.partials.header.main-header :breadcrumb="$breadcrumbTrail"/>

            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                <!--begin::Side bar-->
                <x-layout.partials.side-bar.side-bar :breadcrumb="$breadcrumbTrail"/>
                <!--end::Side bar-->

                <!--begin::Sub menu-->
                <x-layout.partials.sub-menu.v_1 :breadcrumb="$breadcrumbTrail"/>
                <!--end::Sub menu-->

                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--layout-partial:layout/partials/_content.html-->
                        {{ $slot }}
                    </div>
                    <!--end::Content wrapper-->
                    <x-layout.partials.footer.main-footer />
                </div>
                <!--end:::Main-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    <!--layout-partial:partials/_drawers.html-->
    <x-layout.partials.drawers.main-drawers />
    <!--layout-partial:partials/_scrolltop.html-->
    <x-layout.partials.scroll.scroll-top />
    <!--begin::Modals-->
    <!--layout-partial:partials/modals/_upgrade-plan.html-->
    <x-layout.partials.modal.upgrade-plan />
    <!--layout-partial:partials/modals/_view-users.html-->
    <x-layout.partials.modal.view-users />
    <!--layout-partial:partials/modals/users-search/_main.html-->
    <x-layout.partials.modal.user-search.main />
    <!--layout-partial:partials/modals/_invite-friends.html-->
    <x-layout.partials.modal.invite-freinds />
    <!--end::Modals-->
    <!--begin::Javascript-->
    {{-- <script>
        var hostUrl = "{{ URL::to('') }}";
        // var lang = {{ LaravelLocalization::getCurrentLocale() }};
        var lang = "{{ LaravelLocalization::getCurrentLocale() }}";
    </script> --}}

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <x-skeleton.global-j-s />
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used for this page only)-->
    {{-- <script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script> --}}
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script> --}}
    <x-resources.resources-js :js="$jsFilesRessources"/>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
