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
        // dd($cssFilesRessources);
   @endphp

   <!--begin::css-->
   <x-resources.resources-css :css="$cssFilesRessources"/>
   <!--end::css-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center">
    <!--begin::Theme mode setup on page load-->
    <x-layout.partials.theme-mode.init />
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <x-auth.left/>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <!--begin::Wrapper-->
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">

                        <!--begin::Slott-->
                        {{ $slot }}
                        <!--end::Slott-->

                        <!--begin::Footer-->
                        {{-- <x-auth.footer/> --}}
                        <!--end::Footer-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ URL::to('') }}";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <x-skeleton.global-j-s />
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{ asset('assets/js/authentication/sign-up/general.js') }}"></script> --}}
    <x-resources.resources-js :js="$jsFilesRessources"/>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
