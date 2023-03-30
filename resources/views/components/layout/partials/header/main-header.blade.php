@php
    $userInfo = \App\Classes\User::_getUserConnectedData();
@endphp
<!--begin::Header-->
<div id="kt_app_header" class="app-header ">
    <!--begin::Header container-->
    <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between "
        id="kt_app_header_container">
        <!--begin::Sidebar mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2 svg-icon-md-1"><svg width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Sidebar mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="?page=index" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg') }}" class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_wrapper'}"
                class="page-title d-flex flex-column justify-content-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    {{ end($breadcrumb['menu-item']) }}
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard.create') }}" class="text-muted text-hover-primary">
                            {{ $breadcrumb['menu-title'] }} </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    {{-- <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li> --}}
                    <!--end::Item-->
                    <!--begin::Item-->
                    {{-- <li class="breadcrumb-item text-muted">
                        Dashboards </li> --}}
                    <!--end::Item-->
                    @foreach ($breadcrumb['menu-item'] as $item)
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            {{ $item }} </li>
                    @endforeach
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

            <!--layout-partial:layout/partials/header/_navbar.html-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                <!--begin::Search-->
                {{-- <div class="app-navbar-item align-items-stretch ms-1 ms-md-3">
                    <x-layout.partials.search.main-drop-down />
                </div> --}}
                <!--end::Search-->
                <!--begin::Activities-->
                <div class="app-navbar-item ms-1 ms-md-3">
                    <!--begin::Drawer toggle-->
                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline bg-transparent w-40px h-40px"
                        id="kt_activities_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-md-1"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="8" y="9" width="3" height="10" rx="1.5"
                                    fill="currentColor" />
                                <rect opacity="0.5" x="13" y="5" width="3" height="14"
                                    rx="1.5" fill="currentColor" />
                                <rect x="18" y="11" width="3" height="8" rx="1.5"
                                    fill="currentColor" />
                                <rect x="3" y="13" width="3" height="6" rx="1.5"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Drawer toggle-->
                </div>
                <!--end::Activities-->
                <!--begin::Notifications-->
                <div class="app-navbar-item ms-1 ms-md-3">
                    <!--begin::Menu- wrapper-->
                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline bg-transparent w-40px h-40px position-relative"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">

                        <!--begin::Svg Icon | path: icons/duotune/general/gen007.svg-->
                        <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <span
                            class="bullet bullet-dot bg-primary h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>

                    </div>
                    <!--layout-partial:partials/menus/_notifications-menu.html-->
                    <x-layout.partials.menus.notifications-menu />
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Notifications-->
                <!--begin::Chat-->
                <div class="app-navbar-item ms-1 ms-md-3">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline bg-transparent w-40px h-40px"
                        id="kt_drawer_chat_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-md-1"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z"
                                    fill="currentColor" />
                                <rect x="6" y="12" width="7" height="2" rx="1"
                                    fill="currentColor" />
                                <rect x="6" y="7" width="12" height="2" rx="1"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Chat-->
                <!--begin::My apps links-->
                <div class="app-navbar-item ms-1 ms-md-3">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline bg-transparent w-40px h-40px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-md-1"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="9" height="9" rx="2"
                                    fill="currentColor" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9"
                                    rx="2" fill="currentColor" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                    rx="2" fill="currentColor" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9"
                                    rx="2" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--layout-partial:partials/menus/_my-apps-menu.html-->
                    <x-layout.partials.menus.my-apps-menu />

                    <!--end::Menu wrapper-->
                </div>
                <!--end::My apps links-->
                <!--begin::Theme mode-->
                <div class="app-navbar-item ms-1 ms-md-3">
                    <!--layout-partial:partials/theme-mode/_main.html-->
                    <x-layout.partials.theme-mode.main />

                </div>
                <!--end::Theme mode-->
                <!--begin::User menu-->
                <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="d-flex align-items-center border border-dashed border-gray-300 rounded p-2"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">

                        <!--begin::User-->
                        <div class="cursor-pointer symbol me-3 symbol-35px symbol-lg-45px">
                            {{-- <img class="" src="{{asset('assets/media/avatars/300-1.jpg')}}" alt="user"> --}}
                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-30-131017/core/html/src/media/icons/duotune/communication/com006.svg-->
                            <span class="svg-icon svg-icon-info svg-icon-2hx"><svg width="18" height="18"
                                    viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                        fill="currentColor" />
                                    <path
                                        d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                        fill="currentColor" />
                                    <rect x="7" y="6" width="4" height="4"
                                        rx="2" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::User-->

                        <!--begin:Info-->
                        <div class="me-4">
                            {{-- <a href="javascript:;" class="text-gray-400 fs-6 fw-bold">{{ $userInfo['fname'] }}</a> --}}

                            <a href="javascript:;"
                                class="text-dark  fs-7 fw-bold d-block text-uppercase"><span>@</span>{{ $userInfo['lname'] }}</a>
                        </div>
                        <!--end:Info-->

                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-gray-500 pt-1"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->

                    </div>
                    <!--layout-partial:partials/menus/_user-account-menu.html-->
                    <x-layout.partials.menus.user-account-menu />
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
                <!--begin::Header menu toggle-->
                <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
                    <div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-35px h-md-35px"
                        id="kt_app_header_menu_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-md-1"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->

        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->
