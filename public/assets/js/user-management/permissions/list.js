"use strict";

// Class definition
var PermissionDatatablesServerSide = function () {
    // Shared variables
    var dt;

    // Shared another variables
    var PermissionDataTableID = 'permissionDataTableID',
        PermissionModalID = 'permissionModalID',
        PermissionContentModalID = 'permissionContentModalID',
        PermissionFormID = 'permissionFormID',
        PermissionBTNID = {
            'load'      : 'loadFormPermission',
            'refresh'   : 'refreshDataTablePermission',
            'delete'    : 'deletePermission',
            'update'    : 'updatePermission',
            'submit'    : 'submitPermission',
            'edit'      : 'editPermission',
            'toggle'    : 'togglePermission',
        },
        PermissionRemoteData = {
            'form'      : 'formPermission',
            'set'       : 'setPermission',
            'delete'    : 'deletePermission',
            'get'       : 'getPermission',
            'toggle'    : 'togglePermission',

        };

    // SET TOASTR SETUP
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toastr-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // get route prefix
    let prefix = $('#prefix').val();
    let statusID;

    // Private functions
    var initDatatable = function () {
        dt = $(`#${PermissionDataTableID}`).DataTable({
            language: {
                info: "Affichage de _START_ - _END_ sur _TOTAL_",
                infoEmpty: "Aucune donnée disponible",
                search: "Rechercher:",
                processing: "Chargement...",
                paginate: {
                    first: "Premier",
                    last: "Dernier",
                    next: "Suivant",
                    previous: "Précédent",
                },
                zeroRecords: "Aucun enregistrement trouvé",
                loadingRecords: "Chargement...",
                buttons: {
                    colvis: 'Visibilité'
                },
            },
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[5, 'asc']],
            // stateSave: true,²
            // select: {
            //     style: 'multi',
            //     selector: 'td:first-child input[type="checkbox"]',
            //     className: 'row-selected'
            // },
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: 'POST',
                url: hostUrl + '/' + lang + '/' + prefix + '/' + PermissionRemoteData.get,
                dataType: "json",
                data: function(d) {
                    d.status = statusID;
                },
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'description' },
                { data: 'created_at' },
                { data: 'status' },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    render: function (data) {
                        return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="${data}" />
                            </div>`;
                    }
                },
                {
                    targets: 1,
                    orderable: false,
                    render: function (data) {
                        return `<span class="text-primary">${data.toUpperCase()}</span>`;
                    }
                },
                {
                    targets: 2,
                    orderable: false,
                    render: function (data) {
                        return `<span class="">${data.charAt(0).toUpperCase() + data.slice(1)}</span>`;
                    }
                },
                {
                    targets: 4,
                    orderable: false,
                    render: function (data) {
                        var status = {
                            1: {
                                title: "Activé",
                                state: "badge badge-light-success fs-7 fw-bold p-2",
                            },
                            2: {
                                title: "Désactivé",
                                state: "badge badge-light-danger fs-7 fw-bold p-2",
                            },
                        };
                        return `<span class="${status[data].state}">${status[data].title}</span>`;
                    }
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-center',
                    render: function (data, type, row) {
                        var status = {
                            1: {
                                title:'Désactiver',
                                // title:'Activer',
                            },
                            2: {
                                title:'Activer',
                                // title:'Désactiver',
                            },
                        };
                        return `
                            <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3 ${PermissionBTNID.load}" data-bs-toggle="modal" data-bs-target="#${PermissionModalID}" data-kt-docs-table-filter="edit_row" data-kt-row-id="${data.id}">
                                        Modifier
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3 ${PermissionBTNID.delete}" data-kt-row-id="${data.id}">
                                        Suprimer
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3 ${PermissionBTNID.toggle}" data-kt-row-id="${data.id}" data-kt-row-value="${data.status}">
                                    ${status[data.status].title}
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        `;
                    },
                },
            ],
        });

        // Re-init functions on every table re-draw
        dt.on('draw', function () {
            KTMenu.createInstances();
        });
    }

    // Hook export buttons
    var exportButtons = () => {

        const documentTitle = 'Customer Orders Report';
        var buttons = new $.fn.dataTable.Buttons(`#${PermissionDataTableID}`, {
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle
                }
            ]
        }).container().appendTo($('#kt_datatable_example_buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#kt_datatable_example_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }

    // Search Datatable
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        // let filterStatus = document.querySelectorAll('[data-kt-docs-table-filter="status"]');
        // const filterButton = document.querySelector('[data-kt-docs-table-filter="filter"]');
        // let status = $('.form-select').find(':selected');
        // let status  = $('.form-select').find(':selected').text();

        $('.form-select').on('select2:select', function (e) {
            var data = e.params.data;
                statusID = data.id;
                // console.log(statusID);
                // dt.search(statusID).draw();
                dt.draw();
        });

        // Filter datatable on submit
        // filterButton.addEventListener('click', function () {
            // Get filter values
            // let filterStatus = '';

            // Get payment value
            // filterStatus.forEach(r => {
            //     if (r.selected) {
            //         filterStatus = r.value;
            //     }

            //     // Reset payment value if "All" is selected
            //     if (filterStatus === '0') {
            //         filterStatus = '';
            //     }
            // });

            // console.log(status);

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            // dt.search(paymentValue).draw();
            // dt.search(paymentValue).draw();
        // });
    }

    // load form after user click
    $(document).on('click', `.${PermissionBTNID.load}`, function (event) {

        // preventDefault
        event.preventDefault();

        // line id
        let rowID = $(this).attr('data-kt-row-id');

        // Get all the required data
        let formElement = $(`#${PermissionFormID}`),
            formData = new FormData(formElement[0]);

        // append to form data
        formData.append("rowID", rowID);

        // SET REQUEST
        $.ajax({
            method: 'post',
            url: hostUrl + '/' + lang + '/' + prefix + '/' + PermissionRemoteData.form,
            processData: false,
            contentType: false,
            // CSRF verification
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: formData,
        }).done(function (response) {
            $(`#${PermissionModalID} #${PermissionContentModalID}`).html(response);
        })
            .fail(function () {
                alert("error");
            })

    })

    // submit form data after user click
    $(document).on('click', `#${PermissionBTNID.submit}`, function (event) {

        // preventDefault
        event.preventDefault();

        // call submitPermission function
        submitPermission();

    })

    // submit form data after user tape enter
    $(document).on('submit', `#${PermissionFormID}`, function (event) {

        // preventDefault
        event.preventDefault();

        // call submitPermission function
        submitPermission();

    })

    // function to submit Permission form data
    let submitPermission = function submitPermissionFormData() {

        // get submit BTN
        let submitButton = document.querySelector(`#${PermissionBTNID.submit}`);

        // Show loading indication
        submitButton.setAttribute('data-kt-indicator', 'on');

        // Disable button to avoid multiple click
        submitButton.disabled = true;

        // Get all the required data
        let formElement = $(`#${PermissionFormID}`),
            formData = new FormData(formElement[0]);

        // SET REQUEST
        $.ajax({
            method: 'post',
            url: hostUrl + '/' + lang + '/' + prefix + '/' + PermissionRemoteData.set,
            processData: false,
            contentType: false,
            // CSRF verification
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: formData,
            dataType: 'json',
        }).done(function (response) {
            if (response) {
                if (response.status === '400') {

                    // Hide loading indication
                    submitButton.removeAttribute('data-kt-indicator');
                    toastr.error(response.message);

                    // Disable button to avoid multiple click
                    submitButton.disabled = false;

                }else if (response.status === '500') {
                    // faire autre chose
                    let messageContent = response.message;
                    // console.log(messageContent);
                    $.each(messageContent, function(index, value) {
                        // Will stop running after "three"
                        toastr.error(value[0]);
                    });

                    // Hide loading indication
                    submitButton.removeAttribute('data-kt-indicator');

                    // Disable button to avoid multiple click
                    submitButton.disabled = false;

                }else {

                    // hide modal
                    $(`#${PermissionModalID}`).modal('hide');

                    // Hide loading indication
                    submitButton.removeAttribute('data-kt-indicator');
                    toastr.success(response.message);

                    // Disable button to avoid multiple click
                    submitButton.disabled = false;

                    // reloading
                    dt.draw();
                }
            }
        })
        .fail(function (response) {
        })
    }

    // refresh data table after user click
    $(document).on('click', `#${PermissionBTNID.refresh}`, function (event) {

        // console.log('dhsh');
        // preventDefault
        event.preventDefault();

        // reloading
        dt.draw();

    })

    // delete row in data tabe after user clik
    $(document).on('click', `.${PermissionBTNID.delete}`, function (event) {

        // preventDefault
        event.preventDefault();

        // line id
        let permissionID = $(this).attr('data-kt-row-id');

        // swal init
        Swal.fire({
            text: "Êtes-vous sûr de vouloir supprimer ?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Oui, supprimer !",
            cancelButtonText: "Non, annuler",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then(function (result) {
            if(result.isConfirmed){
                $.ajax({
                    method: 'post',
                    url: hostUrl + '/' + lang + '/' + prefix + '/' + PermissionRemoteData.delete,
                    // CSRF verification
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                        'permissionID' : permissionID
                    },
                }).done(function (response) {
                    if (response) {
                            dt.draw();
                            toastr.success(response.message);
                        // });
                    } else  {
                        toastr.error(response.message);
                    }
                })
                .fail(function (response) {
                })
            }

        });

    })

    // disable row in data tabe after user clik
    $(document).on('click',`.${PermissionBTNID.toggle}`, function(event){

        // preventDefault
        event.preventDefault();

        // line id
        let permissionID = $(this).attr('data-kt-row-id');
        let statusValue = $(this).attr('data-kt-row-value');

        // swal init
        Swal.fire({
            text: "Êtes-vous sûr de vouloir effectuer cette action ?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Oui, effectuer !",
            cancelButtonText: "Non, annuler",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then(function (result) {
            if(result.isConfirmed){
                $.ajax({
                    method: 'post',
                    url: hostUrl + '/' + lang + '/' + prefix + '/' + PermissionRemoteData.toggle,
                    // CSRF verification
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                        'permissionID' : permissionID,
                        'statusValue' : statusValue,
                    },
                  }).done(function(response) {
                        if (response) {
                            toastr.success(response.message);
                            dt.draw();
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "Opps une erreur lors du traitement",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, c'est bon!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                  })
                  .fail(function(response) {
                    // toastr.error('Opps une erreur !');
                  })
            }
        });

    })

    // culunm visibility
    var columnsVisibility = () => {

        new $.fn.dataTable.Buttons(`#${PermissionDataTableID}`, {
            // buttons: [
            buttons: [{
                extend: 'colvis',
                className: 'btn-theme-light-primary',
                text: `<span class="svg-icon svg-icon-1 svg-icon-primary">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"/>
                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"/>
                </svg>
                    </span>`,
            },]
        }).container().appendTo($('div.column-visibility'));

        $(document).on('click', '#test-colvis', function (e) {
            e.preventDefault();

            // Get clicked export value
            const target = document.querySelector('.buttons-collection.buttons-colvis');

            // Trigger click event on hidden datatable export buttons
            target.click();
        });
    }

    // Public methods
    return {
        init: function () {
            initDatatable();
            exportButtons();
            columnsVisibility();
            handleSearchDatatable();
            handleFilterDatatable();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    PermissionDatatablesServerSide.init();
});

