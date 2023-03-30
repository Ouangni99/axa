<x-auth.auth-layout :breadcrumbTrail="$breadcrumbTrail">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{ route('dashboard.create') }}">
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-color fw-bolder mb-3">@php echo ucfirst(__('sign-in.sign-in-title')); @endphp</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-500 fw-semibold fs-6">@php echo ucfirst(__('sign-in.sign-in-description')); @endphp</div>
                <!--end::Subtitle=-->
            </div>
            <!--end::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="@php echo ucfirst(__('sign-in.email-input.input')); @endphp" name="email" autocomplete="off" class="form-control bg-transparent"/>
                <!--end::Email-->
            </div>
            <!--end::Input group=-->
            <div class="fv-row mb-3">
                <!--begin::Password-->
                <input type="password" placeholder="@php echo ucfirst(__('sign-in.pwd-input.input')); @endphp" name="password" autocomplete="off" class="form-control bg-transparent" />
                <!--end::Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                <div></div>
                <!--begin::Link-->
                <a class="text-color" href="{{route('password.request')}}">@php echo ucfirst(__('sign-in.forget')); @endphp</a>
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary sign-in-btn">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">@php echo ucfirst(__('button.sign-in')); @endphp</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">@php echo ucfirst(__('sign-in.wait')); @endphp
                    <span class="spinner-border spinner-border-sm align-middle ms-2 "></span></span>
                    <!--end::Indicator progress-->
                </button>
            </div>
            <!--end::Submit button-->
            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6">@php echo ucfirst(__('sign-in.already')); @endphp
            <a href="{{route('register')}}" class="text-color">@php echo ucfirst(__('sign-in.already-account')); @endphp</a></div>
            <!--end::Sign up-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
    {{-- <x-auth.footer/> --}}

</x-auth.auth-layout>
