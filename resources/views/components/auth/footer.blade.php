<div class="w-lg-500px d-flex flex-stack">
    <!--begin::Languages-->
    <div class="me-10 border border-primary rounded-4">
        <!--begin::Toggle-->
        <button class="btn btn-flex btn-color-gray-700 btn-active-color-primary rotate fs-base"
            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
            data-kt-menu-offset="0px, 0px">
            <span data-kt-element="current-lang-name" class="me-1">Langue</span>
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
            <span class="svg-icon svg-icon-5 svg-icon-muted rotate-180 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </button>
        <!--end::Toggle-->
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7"
            data-kt-menu="true" id="kt_auth_lang_menu">
            <!--begin::Menu item-->
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                {{-- @php var_dump($localeCode); @endphp --}}
                <div class="menu-item px-3">
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                        class="menu-link d-flex px-5 {{ $localeCode === LaravelLocalization::getCurrentLocale() ? 'active' : '' }}">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{ asset($properties['image']) }}"
                                alt="" />
                        </span>
                        {{ $properties['native'] }}
                    </a>
                </div>
            @endforeach
            <!--end::Menu item-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Languages-->
    <!--begin::Links-->
    <div class="d-flex fw-semibold text-primary fs-base gap-5" style="margin-right: 20px;">
        <a class="text-color" href="javascript:;">@php echo ucfirst(__('sign-up.term')); @endphp</a>
        <a class="text-color" href="javascript:;">@php echo ucfirst(__('sign-up.contacts')); @endphp</a>
    </div>
    <!--end::Links-->
</div>
