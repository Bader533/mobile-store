@extends('dashboard.index')

@section('title', __('site.installments'))

@section('page_name', __('site.installments'))

@section('name', $name->order->customer->customer_name)

@section('css')

@endsection

@section('content')
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
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-customer-table-filter="search" id="search_order"
                                class="form-control form-control-solid w-250px ps-15"
                                placeholder="{{ __('site.search_order') }}" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <!--begin::Add customer-->
                            <a href="{{ route('monthyinstallment.printDraft', $name->id) }}"
                                class="btn btn-light-primary me-3">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2"
                                            rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                        <path
                                            d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->{{ __('site.print') }}
                            </a>

                            <a href="{{ route('check.print', $name->id) }}" class="btn btn-light-primary me-3">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2"
                                            rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                        <path
                                            d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->{{ __('site.print_check') }}
                            </a>

                            {{-- check --}}
                            @can(['Create-Edit-Check'])
                                <a @if (is_null($name->checks)) href="{{ route('check.create', $name->id) }}" @else
                            href="{{ route('check.edit', $name->id) }}" @endif
                                    class="btn btn-light-primary me-3">

                                    <!--end::Svg Icon-->{{ __('site.add_check') }}
                                </a>
                            @endcan
                            <a class="btn btn-primary">{{ __('site.total_installments') }} :
                                {{ $monthyInstallment->count() }}</a>
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->

                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="table-responsive card-body pt-0" id="content_table">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                {{-- <th class="min-w-125px">{{__('site.id')}}</th> --}}
                                <th class="min-w-125px">{{ __('site.installment_number') }}</th>
                                <th class="min-w-125px">{{ __('site.customer') }}</th>
                                <th class="min-w-125px">{{ __('site.collector') }}</th>
                                <th class="min-w-125px">{{ __('site.pay_date') }}</th>
                                <th class="min-w-125px">{{ __('site.paid_date') }}</th>
                                <th class="min-w-125px">{{ __('site.price') }}</th>
                                <th class="min-w-125px">{{ __('site.status') }}</th>
                                @canany(['Paid-invoice'])
                                    <th class="text-end min-w-70px">Actions</th>
                                @endcanany
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600" id="table_order">
                            @if (!$monthyInstallment->isEmpty())
                                @foreach ($monthyInstallment as $monthy)
                                    <tr>

                                        <!--begin::Name=-->
                                        <td>
                                            <h3 class="fs-4 fw-semibold mb-0 ms-4">{{ $monthy->installment_number }}
                                            </h3>
                                        </td>
                                        <td>{{ $monthy->customer->customer_name }}</td>
                                        <td>{{ $monthy->object->name ?? '---' }}</td>
                                        <!--end::Name=-->
                                        <!--begin::Email=-->
                                        <td data-bs-target="license">
                                            <a class="text-gray-600 text-hover-primary mb-1">
                                                {{ date('Y-m-d', strtotime($monthy->pay_date)) }}</a>
                                        </td>
                                        <!--end::Email=-->

                                        <!--begin::Date=-->
                                        @if ($monthy->paid_date == null)
                                            <td>---</td>
                                        @else
                                            <td>{{ date('Y-m-d', strtotime($monthy->paid_date)) }}</td>
                                        @endif

                                        <td>{{ $monthy->price }}</td>
                                        <td>
                                            @if ($monthy->status == 'waiting')
                                                <div class="badge badge-light-warning">
                                                    Waiting
                                                </div>
                                            @elseif($monthy->status == 'paid late')
                                                <div class="badge badge-light-danger fw-bold">
                                                    Paid Late
                                                </div>
                                            @elseif($monthy->status == 'paid on time')
                                                <div class="badge badge-light-success">
                                                    Paid On Time
                                                </div>
                                            @elseif($monthy->status == 'paid early')
                                                <div class="badge badge-light-primary">
                                                    Paid Early
                                                </div>
                                            @elseif($monthy->status == 'late')
                                                <div class="badge badge-light-dark">
                                                    Late
                                                </div>
                                            @endif
                                        </td>


                                        <!--begin::Action=-->
                                        @canany(['Paid-invoice'])
                                            <td class="text-end">

                                                <!--begin::Edit-->
                                                @can('Paid-invoice')
                                                    <a @if (Auth::guard('customer')->check()) href="{{ route('customer-monthyinstallment.edit', $monthy->id) }}" @else
                                    href="{{ route('monthyinstallment.edit', $monthy->id) }}" @endif
                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                        data-bs-toggle="tooltip" title="{{ __('site.show') }}"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                    fill="currentColor" />
                                                                <path opacity="0.3"
                                                                    d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                @endcan
                                                <!--end::Edit-->


                                            </td>
                                        @endcanany
                                        <!--end::Action=-->
                                    </tr>
                                    <tr class="child-row">
                                        @foreach ($monthy->contract->order->notes as $item)
                                            <td></td>
                                            <td colspan="2">{{ $item->object->name }}</td>
                                            <td colspan="2">{{ $item->note }}</td>
                                            <td colspan="2">
                                                <a data-bs-toggle="modal" data-bs-target="#kt_modal_update_role"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-1"
                                                    data-bs-target="#kt_modal_update_address">
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        title="{{ __('site.edit') }}">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3"
                                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </a>

                                                <a onclick="confirmDelete('{{ $item->id }}',this)"
                                                    class="btn btn-icon btn-active-light-danger w-30px h-30px me-3"
                                                    data-bs-toggle="tooltip" title="Delete"
                                                    data-kt-customer-payment-method="delete">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.5"
                                                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.5"
                                                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>

                                                <!--begin::Modal - Update role-->
                                                <div class="modal fade" id="kt_modal_update_role" tabindex="-1"
                                                    aria-hidden="true">
                                                    <!--begin::Modal dialog-->
                                                    <div class="modal-dialog modal-dialog-centered mw-750px">
                                                        <!--begin::Modal content-->
                                                        <div class="modal-content">
                                                            <!--begin::Modal header-->
                                                            <div class="modal-header">
                                                                <!--begin::Modal title-->
                                                                <h2 class="fw-bold">{{ __('site.add_note') }}</h2>
                                                                <!--end::Modal title-->
                                                                <!--begin::Close-->
                                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                    data-kt-roles-modal-action="close">
                                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                    <span class="svg-icon svg-icon-1">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect opacity="0.5" x="6"
                                                                                y="17.3137" width="16"
                                                                                height="2" rx="1"
                                                                                transform="rotate(-45 6 17.3137)"
                                                                                fill="currentColor" />
                                                                            <rect x="7.41422" y="6"
                                                                                width="16" height="2"
                                                                                rx="1"
                                                                                transform="rotate(45 7.41422 6)"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <!--end::Close-->
                                                            </div>
                                                            <!--end::Modal header-->
                                                            <!--begin::Modal body-->
                                                            <div class="modal-body scroll-y mx-5 my-7">
                                                                <!--begin::Form-->
                                                                <form id="kt_modal_update_role_form" class="form">
                                                                    <!--begin::Scroll-->
                                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                                        id="kt_modal_update_role_scroll"
                                                                        data-kt-scroll="true"
                                                                        data-kt-scroll-activate="{default: false, lg: true}"
                                                                        data-kt-scroll-max-height="auto"
                                                                        data-kt-scroll-dependencies="#kt_modal_update_role_header"
                                                                        data-kt-scroll-wrappers="#kt_modal_update_role_scroll"
                                                                        data-kt-scroll-offset="300px">
                                                                        <!--begin::Input group-->
                                                                        <div class="fv-row mb-10">
                                                                            <!--begin::Label-->
                                                                            <label class="fs-5 fw-bold form-label mb-2">
                                                                                <span
                                                                                    class="required">{{ __('site.note') }}</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <input class="form-control form-control-solid"
                                                                                placeholder="{{ __('site.note') }}"
                                                                                name="note" id="note"
                                                                                value="{{ $item->note }}" />
                                                                            <!--end::Input-->
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                    </div>
                                                                    <!--end::Scroll-->
                                                                    <!--begin::Actions-->
                                                                    <div class="text-center pt-15">
                                                                        <button type="reset" class="btn btn-light me-3"
                                                                            data-kt-roles-modal-action="cancel">Discard</button>
                                                                        <button type="button"
                                                                            onclick="updateNote('{{ $item->id }}')"
                                                                            class="btn btn-primary">
                                                                            <span class="">Submit</span>
                                                                        </button>
                                                                    </div>
                                                                    <!--end::Actions-->
                                                                </form>
                                                                <!--end::Form-->
                                                            </div>
                                                            <!--end::Modal body-->
                                                        </div>
                                                        <!--end::Modal content-->
                                                    </div>
                                                    <!--end::Modal dialog-->
                                                </div>
                                                <!--end::Modal - Update role-->

                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" align="center">{{ __('site.no_data_found') }}</td>
                                </tr>
                            @endif
                        </tbody>
                        <tbody class="fw-semibold text-gray-600" id="table_order_2">

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <div style="float: right">
                                    {{ $monthyInstallment->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/custom/account/security/license-usage.js') }}"></script>
    <script>
        $('#search_order').on('keyup', function() {

            $value = $(this).val();

            if ($value) {
                $('#table_order').hide();
                $('#table_order_2').show();

                $.ajax({
                    type: 'get',
                    url: "{{ route('month-installment.search') }}",
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        $('#table_order_2').html(data);


                    },
                });
            } else {
                $('#table_order').show();
                $('#table_order_2').hide();
            }

        }); //end live search

        function updateNote(id) {
            axios.put('/note/' + id, {
                    note: document.getElementById('note').value,
                })
                .then(function(response) {
                    Swal.fire({
                        text: "Form has been successfully submitted!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function(result) {
                        location.reload();
                    });
                    toastr.success(response.data.message);
                }).catch(function(error) {
                    console.log(error);
                    toastr.error(error.response.data.message)
                });
        } //end update note

        function confirmDelete(id, reference) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performDelete(id, reference);
                }
            });
        } //end message confirm delete

        function performDelete(id, reference) {
            axios.delete('/note/' + id)
                .then(function(response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                    $("#kt_customers_table").load(window.location.href + " #kt_customers_table");
                })
                .catch(function(error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        } //end detete note

        $(document).ready(function() {
            $(".child-row").hide();

            $("#kt_customers_table tbody tr").on("click", function() {
                $(this).next(".child-row").toggle();

            });
        });
    </script>

@endsection
