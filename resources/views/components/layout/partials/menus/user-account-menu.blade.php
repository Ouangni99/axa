@php
    $userInfo = \App\Classes\User::_getUserConnectedData();
@endphp
<!--begin::User account menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
    data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
                {{-- <img alt="Logo" src="{{ asset('assets/media/avatars/300-1.jpg') }}" /> --}}
                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-30-131017/core/html/src/media/icons/duotune/communication/com013.svg-->
                <span class="svg-icon svg-icon-3hx svg-icon-info"><svg width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                            fill="currentColor" />
                        <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Avatar-->
            <!--begin::Username-->
            <div class="d-flex flex-column">
                <div class="d-flex align-items-center fs-6">
                    {{ $userInfo['fname'] }} {{ $userInfo['lname'] }}
                </div>
                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                    {{ $userInfo['email'] }} </a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route('profile.create') }}" class="menu-link px-5">
            Mon Profil
        </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    {{-- <div class="menu-item px-5">
        <a href="?page=apps/projects/list" class="menu-link px-5">
            <span class="menu-text">My Projects</span>
            <span class="menu-badge">
                <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
            </span>
        </a>
    </div> --}}
    <!--end::Menu item-->
    <!--begin::Menu item-->
    {{-- <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
        data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
        <a href="#" class="menu-link px-5">
            <span class="menu-title">My Subscription</span>
            <span class="menu-arrow"></span>
        </a>
        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-dropdown w-175px py-4">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="?page=account/referrals" class="menu-link px-5">
                    Referrals
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="?page=account/billing" class="menu-link px-5">
                    Billing
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="?page=account/statements" class="menu-link px-5">
                    Payments
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="?page=account/statements" class="menu-link d-flex flex-stack px-5">
                    Statements
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                        title="View your statements"></i>
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content px-3">
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked"
                            name="notifications" />
                        <span class="form-check-label text-muted fs-7">
                            Notifications
                        </span>
                    </label>
                </div>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div> --}}
    <!--end::Menu item-->
    <!--begin::Menu item-->
    {{-- <div class="menu-item px-5">
        <a href="?page=account/statements" class="menu-link px-5">
            My Statements
        </a>
    </div> --}}
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    {{-- <div class="separator my-2"></div> --}}
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
        data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
        <a href="#" class="menu-link px-5">
            <span class="menu-title position-relative">Langue</span>
        </a>
        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-dropdown w-175px py-4">
            <!--begin::Menu item-->
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                {{-- @php var_dump($localeCode); @endphp --}}
                <div class="menu-item px-3">
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                        class="menu-link d-flex px-5 {{ $localeCode === LaravelLocalization::getCurrentLocale() ? 'active' : '' }}">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{ asset($properties['image']) }}" alt="" />
                        </span>
                        {{ $properties['native'] }}
                    </a>
                </div>
            @endforeach
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="menu-item px-5">
            <a href="javascript:;"
                onclick="event.preventDefault();
                    this.closest('form').submit();"
                class="menu-link px-5">
                Déconnexion
            </a>
        </div>
    </form>
    <!--end::Menu item-->
</div>
<!--end::User account menu-->
