<div class="toolbar py-2 bg-dark" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="app-container container-fluid  d-flex align-items-center">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3  mb-5 mb-lg-0 ">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-white fw-bold my-1 fs-3">
                {{$breadcrumb['menu-title']}}
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->

                <!--begin::Description-->
                <small class="text-muted fs-7 fw-semibold my-1 ms-1">
                    {{end($breadcrumb['menu-item'])}} </small>
                <!--end::Description-->
            </h1>
            <!--end::Title-->

        </div>
        <!--begin::Page title-->
        <div class="flex-grow-1 flex-shrink-0 me-5">

        </div>
        <!--end::Page title-->

        <!--begin::Action group-->

        <div class="d-flex align-items-center flex-wrap">
            <!--begin::Wrapper-->
            {{-- <div class="flex-shrink-0 me-2">
                <ul class="nav" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light active fw-semibold fs-7 px-4 me-1"
                            data-bs-toggle="tab" href="#" aria-selected="true"
                            role="tab">Jour</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-semibold fs-7 px-4 me-1"
                            data-bs-toggle="tab" href="" aria-selected="false" tabindex="-1"
                            role="tab">Mois</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-semibold fs-7 px-4"
                            data-bs-toggle="tab" href="#" aria-selected="false" tabindex="-1"
                            role="tab">Année</a>
                    </li>
                </ul>
            </div> --}}
            <!--end::Wrapper-->
            <!--begin::Wrapper-->
            <div class="d-flex align-items-center">
                <!--begin::Daterangepicker-->
                {{-- <a href="#"
                    class="btn btn-sm btn-bg-light btn-color-gray-500 btn-active-color-primary me-2"
                    id="kt_dashboard_daterangepicker" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    data-bs-trigger="hover" data-bs-original-title="Select dashboard daterange"
                    data-kt-initialized="1">
                    <span class="fw-semibold me-1"
                        id="kt_dashboard_daterangepicker_title">Aujourd'hui:</span>
                    <span class="fw-bold" id="kt_dashboard_daterangepicker_date">{{Carbon\Carbon::now()->format('d-F-Y')}}</span>
                </a> --}}
                <!--end::Daterangepicker-->

                <!--begin::Actions-->
                <div class="d-flex align-items-center">
                    <button type="button"
                        class="btn btn-sm btn-icon btn-color-primary btn-active-light btn-active-color-primary"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
                        <!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->
                        <span class="svg-icon svg-icon-2x"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z"
                                    fill="currentColor"></path>
                                <rect x="11" y="19" width="10" height="2"
                                    rx="1" transform="rotate(-90 11 19)" fill="currentColor">
                                </rect>
                                <rect x="7" y="13" width="10" height="2"
                                    rx="1" fill="currentColor"></rect>
                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor">
                                </path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Action group-->
    </div>
    <!--end::Container-->
</div>
