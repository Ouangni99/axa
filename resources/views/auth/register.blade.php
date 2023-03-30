<x-auth.auth-layout :breadcrumbTrail="$breadcrumbTrail">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="{{ route('dashboard.create') }}"
            method="POST">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">@php echo ucfirst(__('sign-up.sign-up-title')); @endphp</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-500 fw-semibold fs-6">@php echo ucfirst(__('sign-up.sign-up-description')); @endphp</div>
                <!--end::Subtitle=-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8 row">
                <div class="col-md-5">
                    <!--begin::Last name-->
                        <input type="text" placeholder="@php echo ucfirst(__('sign-up.full-fname-input.input')); @endphp" name="fname" autocomplete="off"
                        class="form-control bg-transparent" />
                    <!--end::Last name-->
                </div>
                <div class="col-md-7">
                    <!--begin::First name-->
                        <input type="text" placeholder="@php echo ucfirst(__('sign-up.full-lname-input.input')); @endphp" name="lname" autocomplete="off"
                        class="form-control bg-transparent" />
                    <!--end::First name-->
                </div>
            </div>
            <!--begin::Input group-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="@php echo ucfirst(__('sign-up.email-input.input')); @endphp" name="email" autocomplete="off"
                    class="form-control bg-transparent" />
                <!--end::Email-->
            </div>
            <!--begin::Input group-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8 row">
                <!--begin::Phone-->
                <input type="tel" id="phone" placeholder="@php echo ucfirst(__('sign-up.phone-input.input')); @endphp" name="phone" autocomplete="off"
                    class="form-control bg-transparent" />
                <!--end::Phone-->
            </div>
            <!--begin::Input group-->
            <div class="fv-row mb-8" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input class="form-control bg-transparent" type="password" placeholder="@php echo ucfirst(__('sign-up.pwd-input.input')); @endphp"
                            name="password" autocomplete="off" />
                        <span class="btn btn-sm btn-icon position-translate-middle top-50 end-0 me-n2"
                            data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                    </div>
                    <!--end::Input wrapper-->
                    <!--begin::Meter-->
                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                        </div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                        </div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                        </div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                    <!--end::Meter-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Hint-->
                <div class="text-muted">@php echo ucfirst(__('sign-up.pwd-security')); @endphp</div>
                <!--end::Hint-->
            </div>
            <!--end::Input group=-->
            <!--end::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Repeat Password-->
                <input placeholder="@php echo ucfirst(__('sign-up.pwd-input-repeater.input')); @endphp" name="password_confirmation" type="password" autocomplete="off"
                    class="form-control bg-transparent" />
                <!--end::Repeat Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Accept-->
            <div class="fv-row mb-8">
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                    <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">@php echo ucfirst(__('sign-up.terms')); @endphp</span>
                </label>
            </div>
            <!--end::Accept-->
            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">@php echo ucfirst(__('button.sign-up')); @endphp</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">@php echo ucfirst(__('sign-up.wait')); @endphp
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
            </div>
            <!--end::Submit button-->
            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6">@php echo ucfirst(__('sign-up.already')); @endphp <a
                    href="{{route('login')}}"class="link-primary fw-semibold">@php echo ucfirst(__('sign-up.already-account')); @endphp</a>
            </div>
            <!--end::Sign up-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
</x-auth.auth-layout>
