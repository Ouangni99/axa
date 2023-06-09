<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
    <span class="svg-icon svg-icon-2">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                fill="currentColor" />
        </svg>
    </span>
    <!--end::Svg Icon-->Filtre
</button>
<!--begin::Menu 1-->

<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
    <!--begin::Header-->
    <div class="px-7 py-5">
        <div class="fs-4 text-dark fw-bold">Options de filtres</div>
    </div>
    <!--end::Header-->
    <!--begin::Separator-->
    <div class="separator border-gray-200"></div>
    <!--end::Separator-->
    <!--begin::Content-->
    <div class="px-7 py-5">
        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fs-5 fw-semibold mb-3">Statut:</label>
            <!--end::Label-->
            <!--begin::Input-->
            <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                data-placeholder="Sélectionner une option" data-kt-docs-table-filter="month"
                data-dropdown-parent="#kt-toolbar-filter">
                <option></option>
                <option value="0" selected>Tout</option>
                <option value="1">Activé</option>
                <option value="2">Désactivé</option>
            </select>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        {{-- <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true"
                data-kt-docs-table-filter="reset">Fermer</button>
            <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                data-kt-docs-table-filter="filter">Appliquer</button>
        </div> --}}
        <!--end::Actions-->
    </div>
    <!--end::Content-->
</div>
<!--end::Menu 1-->
