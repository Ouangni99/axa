<x-auth.auth-layout>
    <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
        <!--begin::Form-->
        <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
            id="kt_password_reset_form">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">
                    @php echo ucfirst(__('forgot-pwd.title')); @endphp
                </h1>
                <!--end::Title-->

                <!--begin::Link-->
                <div class="text-muted fs-6">
                    @php echo ucfirst(__('forgot-pwd.description')); @endphp
                </div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->

            <!--begin::Input group--->
            <div class="fv-row mb-8 fv-plugins-icon-container">
                <!--begin::Email-->
                <input type="text" placeholder="@php echo ucfirst(__('forgot-pwd.email-input.input')); @endphp" name="email" autocomplete="off"
                    class="form-control bg-transparent">
                <!--end::Email-->
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>

            <!--begin::Actions-->
            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">
                        @php echo ucfirst(__('button.submit')); @endphp</span>
                    <!--end::Indicator label-->

                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">
                        @php echo ucfirst(__('forgot-pwd.wait')); @endphp <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    <!--end::Indicator progress-->
                </button>

                <a href="{{route('login')}}"
                    class="btn btn-light">@php echo ucfirst(__('button.discard')); @endphp</a>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->

    </div>
</x-auth.auth-layout>
