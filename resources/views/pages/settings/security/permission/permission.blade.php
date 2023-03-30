@php
// Shared variables
$PermissionDataTableID          = 'permissionDataTableID';
$PermissionModalID              = 'permissionModalID';
$PermissionContentModalID       = 'permissionContentModalID';
$PermissionBTNID                = [
    'load'                      => 'loadFormPermission',
    'refresh'                   => 'refreshDataTablePermission',
];
@endphp

<x-layout.app-layout :breadcrumbTrail="$breadcrumbTrail">
    <input type="hidden" id="prefix" value="{{substr(Request::route()->getPrefix(), 3)}}">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid pt-0">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <!--begin::Content container-->
                    <div id="kt_app_content_container" class="app-container container-xxl">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223"
                                                    width="8.15546" height="2" rx="1"
                                                    transform="rotate(45 17.0365 15.1223)"
                                                    fill="currentColor" />
                                                <path
                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" data-kt-docs-table-filter="search"
                                            class="form-control form-control-solid w-250px ps-15"
                                            placeholder="Recherche ...." />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end"
                                        data-kt-docs-table-toolbar="base">

                                         <!--begin::Column Visibility-->
                                         <x-button.column-visibility/>
                                         <!--end::Column Visibility-->

                                        <!--begin::Filter-->
                                        <x-button.filter/>
                                        <!--end::Filter-->

                                        <!--begin::Add Permission kt_modal_add_customer-->
                                        <x-button.add :modalID="$PermissionModalID" :attribueID="$PermissionBTNID['load']">
                                            Ajout d'une permission
                                        </x-button.add>
                                        <!--end::Add Permission-->

                                        <!--begin::Refresh-->
                                        <x-button.refresh :attribueID="$PermissionBTNID['refresh']"/>
                                        <!--end::Refresh-->

                                        <!--begin::Import-->
                                        <x-button.import/>
                                        <!--end::Import-->

                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5"
                                    id="{{$PermissionDataTableID}}">
                                    <!--begin::Table head-->
                                    <thead class="table-bg">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-900 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        data-kt-check="true"
                                                        data-kt-check-target="#kt_customers_table .form-check-input"
                                                        value="1" />
                                                </div>
                                            </th>
                                            <th class="min-w-125px">Nom de la permission</th>
                                            <th class="min-w-125px">Description</th>
                                            <th class="min-w-125px">Date de création</th>
                                            <th class="min-w-125px">Statut</th>
                                            <th class="text-center min-w-70px">Actions</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-800">
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Modals-->

                        <!--begin::Modal - Permission - Add-->
                        <div class="modal fade" id="{{$PermissionModalID}}" tabindex="-1"
                            aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content" id="{{$PermissionContentModalID}}">
                                </div>
                                <!--end::Modal content-->
                            </div>
                        </div>
                        <!--end::Modal - Permission - Add-->

                        <!--end::Modals-->
                    </div>
                    <!--end::Content container-->
                </div>
                <!--end::Content-->
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</x-layout.app-layout>
