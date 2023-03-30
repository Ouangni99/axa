<x-layout.app-layout :breadcrumbTrail="$breadcrumbTrail">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--layout-partial:partials/widgets/cards/_widget_20.html-->
                    <x-layout.partials.widgets.cards.widget_20 />
                    <!--layout-partial:partials/widgets/cards/_widget_7.html-->
                    <x-layout.partials.widgets.cards.widget_7 />

                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--layout-partial:partials/widgets/cards/_widget_17.html-->
                    <x-layout.partials.widgets.cards.widget_17 />


                    <!--layout-partial:partials/widgets/lists/_widget_26.html-->
                    <x-layout.partials.widgets.cards.widget_26 />

                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xxl-6">
                    <!--layout-partial:partials/widgets/engage/_widget_10.html-->
                    <x-layout.partials.widgets.cards.widget_10 />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</x-layout.app-layout>
