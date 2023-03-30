@php
    // Shared variables
    $PermissionFormID               = 'permissionFormID';
    $PermissionBTNID                = [
        'submit'                        => 'submitPermission',
        'discard'                       => 'discardPermission',
    ];

    // get form data
    $name = (!empty($formData)) ? trim($formData->name) : '';
    $title = (!empty($formData)) ? trim($formData->name) : 'Ajouter une permission';
    $description = (!empty($formData)) ? trim($formData->description) : '';
    $permissionID = (!empty($formData)) ? intval($formData->id) : 0;

@endphp

<form id={{$PermissionFormID}}>
    @csrf
    <!--begin::Hidden input -->
    <input type="hidden" name="id" id="permissionID" value="{{$permissionID}}">
    <!--end::Hidden input -->

    <!--begin::Modal header-->
    <div class="modal-header">
        <!--begin::Modal title-->
        <h2 class="fw-bold text-uppercase">{{ $title }}</h2>
        <!--end::Modal title-->
        <!--begin::Close-->
        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Close-->
    </div>
    <!--end::Modal header-->

    <!--begin::Modal body-->
    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
        <!--begin::Form-->
        <form id="kt_modal_add_permission_form" class="form" action="#">
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mb-2">
                    <span class="required">Nom de la permission</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-solid" placeholder="Entrer le nom de la permission"
                    name="name" value="{{$name}}"/>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mb-2">
                    <span>Description</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea class="form-control form-control-solid" placeholder="Laissez une description ici" id="floatingTextarea1" name="description"
                    rows="5" style="resize:none">{{$description}}</textarea>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Modal body-->

    <div class="d-flex justify-content-center">
        <div class="modal-footer text-center">
            <!--begin::Actions-->
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" id="{{$PermissionBTNID['discard']}}">@php echo ucfirst(__('button.discard')); @endphp</button>
            <button type="submit" class="btn btn-primary" id="{{$PermissionBTNID['submit']}}">
                <span class="indicator-label">@php echo ucfirst(__('button.submit')); @endphp</span>
                <span class="indicator-progress">@php echo ucfirst(__('button.wait')); @endphp
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Actions-->
        </div>
    </div>
</form>
