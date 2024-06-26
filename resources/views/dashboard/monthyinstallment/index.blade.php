@extends('dashboard.index')

@section('title', __('site.installments'))

@section('page_name', __('site.installments'))

@section('name', __('site.all_monthy_installment'))

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
                            <input type="text" data-kt-customer-table-filter="search" id="search_installment"
                                class="form-control form-control-solid w-250px ps-15"
                                placeholder="{{ __('site.search_installment') }}" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select id="status_installment" class="form-select form-select-solid" data-control="select2"
                                data-hide-search="true" data-placeholder="Status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="waiting">{{ __('site.waiting') }}</option>
                                <option value="late">{{ __('site.late') }}</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a class="btn btn-primary">{{ __('site.total_installments') }} :
                            {{ $monthyInstallmentCount }}</a>
                        <!--end::Add product-->
                    </div>

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="table-responsive card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                {{-- <th class="min-w-125px">{{__('site.id')}}</th> --}}
                                <th class="min-w-125px">{{ __('site.installment_number') }}</th>
                                <th class="min-w-125px">{{ __('site.customer') }}</th>
                                <th class="min-w-125px">{{ __('site.phone') }}</th>
                                <th class="min-w-125px">{{ __('site.pay_date') }}</th>
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
                                        <td>{{ $monthy->customer->phone_number }}</td>
                                        <!--end::Name=-->
                                        <!--begin::Email=-->
                                        <td data-bs-target="license">
                                            <a class="text-gray-600 text-hover-primary mb-1">
                                                {{ date('Y-m-d', strtotime($monthy->pay_date)) }}</a>
                                        </td>
                                        <!--end::Email=-->


                                        <td>{{ $monthy->price }}</td>
                                        <td>
                                            @if ($monthy->status == 'waiting')
                                                <div class="badge badge-light-warning">
                                                    {{ __('site.waiting') }}
                                                </div>
                                            @elseif($monthy->status == 'paid late')
                                                <div class="badge badge-light-danger fw-bold">
                                                    {{ __('site.paidlate') }}
                                                </div>
                                            @elseif($monthy->status == 'paid on time')
                                                <div class="badge badge-light-success">
                                                    {{ __('site.paidontime') }}
                                                </div>
                                            @elseif($monthy->status == 'paid early')
                                                <div class="badge badge-light-primary">
                                                    {{ __('site.paidearly') }}
                                                </div>
                                            @elseif($monthy->status == 'late')
                                                <div class="badge badge-light-dark">
                                                    {{ __('site.late') }}
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
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
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
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_role_{{ $item->id }}"
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
                                                <div class="modal fade" id="kt_modal_update_role_{{ $item->id }}"
                                                    tabindex="-1" aria-hidden="true">
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
    <script>
        $('#search_installment').on('keyup', function() {

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

                        // console.log(data);
                        $('#table_order_2').html(data);


                    },
                });
            } else {
                $('#table_order').show();
                $('#table_order_2').hide();
            }

        }); //end live search

        $('#status_installment').on('change', function() {

            $value = $(this).val();

            if ($value !== 'all') {
                $('#table_order').hide();
                $('#table_order_2').show();

                $.ajax({
                    type: 'get',
                    url: "{{ route('month-installment.search.status') }}",
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

        }); //end live search status

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
                        if (result.isConfirmed) {
                            $('#kt_modal_update_role_' + id).modal('hide');
                            location.reload();
                        }
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
