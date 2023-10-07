@extends('dashboard.index')

@section('title', __('site.contract'))

@section('page_name', __('site.contract'))

@section('name', __('site.all_contract'))

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
                            <input type="text" data-kt-customer-table-filter="search" id="search_contract"
                                class="form-control form-control-solid w-250px ps-15"
                                placeholder="{{ __('site.search_contract') }}" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    {{-- <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Add customer-->
                        <a href="{{route('order.create')}}" class="btn btn-primary">{{__('site.add_order')}}</a>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->

                    <!--end::Group actions-->
                </div> --}}
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

                                <th class="min-w-125px">{{ __('site.id') }}</th>
                                <th class="min-w-125px">{{ __('site.customer') }}</th>
                                <th class="min-w-125px">{{ __('site.price') }}</th>
                                <th class="min-w-125px">{{ __('site.presenter') }}</th>
                                <th class="min-w-125px">{{ __('site.installment_months') }}</th>
                                <th class="min-w-125px">{{ __('site.installment_amount') }}</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600" id="table_contract">
                            @if (!$contracts->isEmpty())
                                @foreach ($contracts as $contract)
                                    <tr>
                                        <!--begin::Name=-->
                                        <td>
                                            <a
                                                class="text-gray-800 text-hover-primary mb-1">{{ $contract->getContractId() }}</a>
                                        </td>
                                        <!--end::Name=-->
                                        <!--begin::Email=-->
                                        <td data-bs-target="license">
                                            <a
                                                class="text-gray-600 text-hover-primary mb-1">{{ $contract->order->customer->customer_name }}</a>
                                        </td>
                                        <!--end::Email=-->

                                        <!--begin::Date=-->
                                        <td>{{ $contract->order->product->price }}</td>
                                        <td>{{ $contract->order->presenter }}</td>
                                        <td>{{ $contract->order->installment_month }}</td>
                                        <td>{{ $contract->order->installment_amount }}</td>
                                        <!--end::Date=-->

                                        <!--begin::Action=-->
                                        <td class="text-end">

                                            <!--begin::Edit-->
                                            <a @if (Auth::guard('customer')->check()) href="{{ route('monthyinstallment-customer.index', $contract->id) }}" @else
                                    href="{{ route('contract.show', $contract->id) }}" @endif
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
                                            <!--end::Edit-->


                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" align="center">{{ __('site.no_data_found') }}</td>
                                </tr>
                            @endif
                        </tbody>
                        <tbody class="fw-semibold text-gray-600" id="table_contract_2">

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <div style="float: right">
                                    {{ $contracts->links('pagination::bootstrap-4') }}
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
        $('#search_contract').on('keyup', function() {

            $value = $(this).val();

            if ($value) {
                $('#table_contract').hide();
                $('#table_contract_2').show();

                $.ajax({
                    type: 'get',
                    url: "{{ route('contract.search') }}",
                    data: {
                        'search': $value
                    },
                    success: function(data) {

                        $('#table_contract_2').html(data);


                    },
                });
            } else {
                $('#table_contract').show();
                $('#table_contract_2').hide();
            }

        }); //end live search
    </script>

@endsection
