<button type="button" class="btn btn-light-primary me-3 {{ $attribueID }}" data-bs-toggle="modal" data-kt-row-id='0' data-bs-target="#{{ $modalID }}">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
    <span class="svg-icon svg-icon-2">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                fill="currentColor"></rect>
            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
        </svg>

    </span>
    <!--end::Svg Icon-->{{ $slot }}
</button>
