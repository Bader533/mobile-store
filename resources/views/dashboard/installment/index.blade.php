@extends('dashboard.index')

@section('title', __('site.installment'))

@section('page_name', __('site.installment'))

@section('name', __('site.all_installment'))

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
                    {{-- @can('Create-Installment')
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <!--begin::Add customer-->
                                <a href="{{ route('installment.create') }}"
                                    class="btn btn-primary">{{ __('site.add_installment') }}</a>
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->

                            <!--end::Group actions-->
                        </div>
                    @endcan --}}
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="table-responsive card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                {{-- <th class="min-w-125px">{{__('site.id')}}</th> --}}
                                <th class="min-w-125px">{{ __('site.name') }}</th>
                                <th class="min-w-125px">{{ __('site.formule') }}</th>
                                <th class="min-w-125px">{{ __('site.created_at') }}</th>
                                @canany(['Update-Installment', 'Show-Installment'])
                                    <th class="text-end min-w-70px">Actions</th>
                                @endcanany
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600" id="table_installment">
                            @if (!$installments->isEmpty())
                                @foreach ($installments as $installment)
                                    <tr>
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $installment->id }}" />
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Name=-->
                                        <td>
                                            <a class="text-gray-800 text-hover-primary mb-1">{{ $installment->name }}</a>
                                        </td>
                                        <!--end::Name=-->
                                        <!--begin::Email=-->
                                        <td data-bs-target="license">
                                            <a class="text-gray-600 text-hover-primary mb-1">{{ $installment->formule }}</a>
                                        </td>
                                        <!--end::Email=-->
                                        <!--begin::Date=-->
                                        <td>{{ date('m/d/Y', strtotime($installment->created_at)) }}</td>
                                        <!--end::Date=-->
                                        <!--begin::Action=-->
                                        @canany(['Update-Installment', 'Show-Installment'])
                                            <td class="text-end">

                                                <!--begin::Edit-->
                                                @can('Update-Installment')
                                                    <a href="{{ route('installment.edit', $installment->id) }}"
                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
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
                                                @endcan
                                                <!--end::Edit-->

                                            </td>
                                        @endcanany
                                        <!--end::Action=-->
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" align="center">{{ __('site.no_data_found') }}</td>
                                </tr>
                            @endif
                        </tbody>
                        <tbody class="fw-semibold text-gray-600" id="table_installment_2">

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <div style="float: right">
                                    {{ $installments->links('pagination::bootstrap-4') }}
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
                $('#table_installment').hide();
                $('#table_installment_2').show();

                $.ajax({
                    type: 'get',
                    url: "{{ route('installment.search') }}",
                    data: {
                        'search': $value
                    },
                    success: function(data) {

                        // console.log(data);
                        $('#table_installment_2').html(data);


                    },
                });
            } else {
                $('#table_installment').show();
                $('#table_installment_2').hide();
            }

        }); //end live search
    </script>

@endsection
