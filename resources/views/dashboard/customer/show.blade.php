@extends('dashboard.index')

@section('title', __('site.details'))

@section('page_name', __('site.details'))

@section('name', $customer->customer_name)

@section('css')

@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{ asset($customer->customer_image) }}" alt="image" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ $customer->name }}</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="fs-5 fw-semibold text-muted mb-6">{{ __('site.customer') }}</div>
                                <!--end::Position-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                    href="#kt_customer_view_details" role="button" aria-expanded="false"
                                    aria-controls="kt_customer_view_details">{{ __('site.details') }}
                                    <span class="ms-2 rotate-180">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                                    <a href="{{ route('customer.edit', $customer->id) }}"
                                        class="btn btn-sm btn-light-primary">{{ __('site.edit') }}</a>
                                </span>
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <div class="fw-bold mt-5">{{ __('site.name_ar') }}</div>
                                    <div class="text-gray-600">{{ $customer->name_ar }}</div>

                                    <div class="fw-bold mt-5">{{ __('site.mother_name') }}</div>
                                    <div class="text-gray-600">{{ $customer->mother_name }}</div>
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">{{ __('site.address') }}</div>
                                    <div class="text-gray-600">{{ $customer->address }}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">{{ __('site.phone') }}</div>
                                    <div class="text-gray-600">
                                        <a class="text-gray-600 text-hover-primary">{{ $customer->phone }}</a>
                                    </div>

                                    <div class="fw-bold mt-5">{{ __('site.other_phone') }}</div>
                                    <div class="text-gray-600">
                                        <a class="text-gray-600 text-hover-primary">{{ $customer->other_phone }}</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">{{ __('site.career') }}</div>
                                    <div class="text-gray-600">{{ $customer->career }}</div>

                                    <div class="fw-bold mt-5">{{ __('site.place_of_work') }}</div>
                                    <div class="text-gray-600">{{ $customer->place_of_work }}</div>

                                    <div class="fw-bold mt-5">{{ __('site.id_number') }}</div>
                                    <div class="text-gray-600">{{ $customer->id_number }}</div>

                                    <div class="fw-bold mt-5">{{ __('site.date_of_birth') }}</div>
                                    <div class="text-gray-600">{{ $customer->date_of_birth }}</div>

                                    <div class="fw-bold mt-5">{{ __('site.place_of_birth') }}</div>
                                    <div class="text-gray-600">{{ $customer->place_of_birth }}</div>

                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_tab">{{ __('site.overview') }}</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_statements">{{ __('site.installment') }}</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_trackings">{{ __('site.tracking') }}</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_permissions">{{ __('site.permission') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_infos">{{ __('site.information') }}</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::tab-->
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{ __('site.contract') }}</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="table-responsive card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted text-uppercase gs-0">
                                                <th class="min-w-100px">{{ __('site.id') }}</th>
                                                <th>{{ __('site.product') }}</th>
                                                <th>{{ __('site.price') }}</th>
                                                <th class="min-w-100px">{{ __('site.date') }}</th>
                                                <th class="text-end min-w-100px pe-4">Actions</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                            @if (!$contracts->isEmpty())
                                                @foreach ($contracts as $contract)
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Invoice=-->
                                                        <td>
                                                            <a
                                                                class="text-gray-600 text-hover-primary mb-1">{{ $contract->getContractId() }}</a>
                                                        </td>
                                                        <!--end::Invoice=-->
                                                        <!--begin::Status=-->
                                                        <td>
                                                            {{ $contract->order->product->name_en }}
                                                        </td>
                                                        <!--end::Status=-->
                                                        <!--begin::Amount=-->
                                                        <td>&#8362;{{ $contract->order->product->price }}</td>
                                                        <!--end::Amount=-->
                                                        <!--begin::Date=-->
                                                        <td>{{ $contract->created_at }}</td>
                                                        <!--end::Date=-->
                                                        <!--begin::Action=-->
                                                        <td class="pe-0 text-end">
                                                            <a class="btn btn-sm btn-light btn-active-light-primary"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">Actions
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                                data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('monthyinstallment.index', $contract->id) }}"
                                                                        class="menu-link px-3">{{ __('site.show') }}</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                        <!--end::Action=-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" align="center">{{ __('site.no_data_found') }}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{ __('site.guarantor') }}</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="table-responsive card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5"
                                        id="kt_table_customers_payment">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted text-uppercase gs-0">
                                                <th class="min-w-100px">{{ __('site.id') }}</th>
                                                <th>{{ __('site.product') }}</th>
                                                <th>{{ __('site.price') }}</th>
                                                <th class="min-w-100px">{{ __('site.date') }}</th>
                                                <th class="text-end min-w-100px pe-4">Actions</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                            @if (!$guarantorIC->isEmpty())
                                                @foreach ($guarantorIC as $contract)
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Invoice=-->
                                                        <td>
                                                            <a
                                                                class="text-gray-600 text-hover-primary mb-1">{{ $contract->getContractId() }}</a>
                                                        </td>
                                                        <!--end::Invoice=-->
                                                        <!--begin::Status=-->
                                                        <td>
                                                            {{ $contract->order->product->name_en }}
                                                        </td>
                                                        <!--end::Status=-->
                                                        <!--begin::Amount=-->
                                                        <td>&#8362;{{ $contract->order->product->price }}</td>
                                                        <!--end::Amount=-->
                                                        <!--begin::Date=-->
                                                        <td>{{ $contract->created_at }}</td>
                                                        <!--end::Date=-->
                                                        <!--begin::Action=-->
                                                        <td class="pe-0 text-end">
                                                            <a class="btn btn-sm btn-light btn-active-light-primary"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">Actions
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                                data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('monthyinstallment.index', $contract->id) }}"
                                                                        class="menu-link px-3">{{ __('site.show') }}</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                        <!--end::Action=-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" align="center">{{ __('site.no_data_found') }}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::tab-->

                        <!--begin:::statement-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
                            <!--begin::Earnings-->
                            <div class="card mb-6 mb-xl-9">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>{{ __('site.installment') }}</h2>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-0">
                                    <!--begin::Left Section-->
                                    <div class="d-flex flex-wrap flex-stack mb-5">
                                        <!--begin::Row-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Col-->
                                            <div
                                                class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                                                <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                    <span data-kt-countup="true" data-kt-countup="true"
                                                        data-kt-countup-value="{{ $paidearly ?? '0' }}">0</span>
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="13" y="6"
                                                                width="13" height="2" rx="1"
                                                                transform="rotate(90 13 6)" fill="currentColor" />
                                                            <path
                                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">
                                                    {{ __('site.paidearly') }}</span>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div
                                                class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                                                <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                    <span class="" data-kt-countup="true"
                                                        data-kt-countup-value="{{ $paidlate ?? '0' }}">0</span>
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="11" y="18"
                                                                width="13" height="2" rx="1"
                                                                transform="rotate(-90 11 18)" fill="currentColor" />
                                                            <path
                                                                d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span
                                                    class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">{{ __('site.paidlate') }}</span>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div
                                                class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                                                <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                    <span data-kt-countup="true"
                                                        data-kt-countup-value="{{ $ontimepaid ?? '0' }}"
                                                        data-kt-countup-prefix="">0</span>
                                                    <span class="text-primary">--</span>
                                                </span>
                                                <span
                                                    class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">{{ __('site.paidontime') }}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        {{-- <a href="#" class="btn btn-sm btn-light-primary flex-shrink-0">Withdraw
                                        Earnings</a> --}}
                                    </div>
                                    <!--end::Left Section-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Earnings-->

                            <!--begin::Earnings-->
                            <div class="card mb-6 mb-xl-9">
                                <br>
                                <!--begin::Body-->
                                <div class="card-body py-0">
                                    <!--begin::Left Section-->
                                    <div class="d-flex flex-wrap flex-stack mb-5">
                                        <!--begin::Row-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Col-->
                                            <div
                                                class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                                                <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                    <span data-kt-countup="true" data-kt-countup="true"
                                                        data-kt-countup-value="{{ $paidup->count() ?? '0' }}">0</span>
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="13" y="6"
                                                                width="13" height="2" rx="1"
                                                                transform="rotate(90 13 6)" fill="currentColor" />
                                                            <path
                                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">
                                                    {{ __('site.paidup') }}</span>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div
                                                class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                                                <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                    <span class="" data-kt-countup="true"
                                                        data-kt-countup-value="{{ $unpaid ?? '0' }}">0</span>
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="11" y="18"
                                                                width="13" height="2" rx="1"
                                                                transform="rotate(-90 11 18)" fill="currentColor" />
                                                            <path
                                                                d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span
                                                    class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">{{ __('site.unpaid') }}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Left Section-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Earnings-->

                            <!--begin::Card-->
                            <div class="card pt-2 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{ __('site.invoices') }}</h2>
                                    </div>
                                    <!--end::Card title-->

                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="table-responsive card-body pt-0">
                                    <!--begin::Tab Content-->
                                    <div id="kt_referred_users_tab_content" class="tab-content">
                                        <!--begin::Tab panel-->
                                        <div id="kt_customer_details_invoices_1" class="py-0 tab-pane fade show active"
                                            role="tabpanel">
                                            <!--begin::Table-->
                                            <table id="kt_customer_details_invoices_table_1"
                                                class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                                <!--begin::Thead-->
                                                <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                                    <tr class="text-start text-muted gs-0">
                                                        <th class="min-w-100px">{{ __('site.id') }}</th>
                                                        <th class="min-w-100px">{{ __('site.price') }}</th>
                                                        <th class="min-w-100px">{{ __('site.status') }}</th>
                                                        <th class="min-w-125px">{{ __('site.date') }}</th>
                                                        <th class="min-w-100px text-end pe-7">{{ __('site.invoice') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody class="fs-6 fw-semibold text-gray-600">

                                                    @if (!$contracts->isEmpty())
                                                        @foreach ($paidup as $monthy)
                                                            <tr>
                                                                <td>
                                                                    <a
                                                                        class="text-gray-600 text-hover-primary">{{ $monthy->installment_number }}</a>
                                                                </td>
                                                                <td class="text-success">&#8362;{{ $monthy->price }}</td>
                                                                <td>
                                                                    @if ($monthy->status == 'paid late')
                                                                        <span
                                                                            class="badge badge-light-danger">{{ $monthy->status }}</span>
                                                                    @elseif($monthy->status == 'paid on time')
                                                                        <span
                                                                            class="badge badge-light-success">{{ $monthy->status }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-light-primary">{{ $monthy->status }}</span>
                                                                    @endif

                                                                </td>
                                                                <td>{{ $monthy->paid_date }}</td>
                                                                <td class="text-end">
                                                                    <a href="{{ route('monthyinstallment.edit', $monthy->id) }}"
                                                                        class="btn btn-sm btn-light btn-active-light-primary">{{ __('site.show') }}</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="5" align="center">
                                                                {{ __('site.no_data_found') }}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                                <!--end::Tbody-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tab panel-->
                                    </div>
                                    <!--end::Tab Content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::statement-->

                        <!--begin:::tracking-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_trackings" role="tabpanel">

                            <!--begin::Card-->
                            <div class="card pt-2 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{ __('site.tracking') }}</h2>
                                    </div>
                                    <!--end::Card title-->

                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="table-responsive card-body pt-0">
                                    <!--begin::Tab Content-->
                                    <div id="kt_referred_users_tab_content" class="tab-content">
                                        <!--begin::Tab panel-->
                                        <div id="kt_customer_details_invoices_1" class="py-0 tab-pane fade show active"
                                            role="tabpanel">
                                            <!--begin::Table-->
                                            <table id="kt_customer_details_invoices_table_1"
                                                class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                                <!--begin::Thead-->
                                                <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                                    <tr class="text-start text-muted gs-0">
                                                        <th class="min-w-100px">{{ __('site.id') }}</th>
                                                        {{-- <th class="min-w-100px">{{ __('site.name') }}</th> --}}
                                                        <th class="min-w-125px">{{ __('site.activity') }}</th>
                                                        <th class="min-w-125px">{{ __('site.time') }}</th>
                                                        <th class="min-w-125px">{{ __('site.date') }}</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody class="fs-6 fw-semibold text-gray-600">

                                                    @if (!$trackings->isEmpty())
                                                        @foreach ($trackings as $monthy)
                                                            <tr>
                                                                <td>
                                                                    <a
                                                                        class="text-gray-600 text-hover-primary">{{ $monthy->id }}</a>
                                                                </td>
                                                                {{-- <td class="text-success">{{ $monthy->name }}</td> --}}

                                                                <td>{{ $monthy->activity }}</td>
                                                                <td>{{ $monthy->time }}</td>
                                                                <td>{{ date('m/d/Y', strtotime($monthy->created_at)) }}
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4" align="center">
                                                                {{ __('site.no_data_found') }}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                                <!--end::Tbody-->
                                            </table>
                                            <!--end::Table-->
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <div style="float: right">
                                                            {{ $trackings->links('pagination::bootstrap-4') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Tab panel-->
                                    </div>
                                    <!--end::Tab Content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::tracking-->

                        <!--begin:::permission-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_permissions" role="tabpanel">

                            <!--begin::Card-->
                            <div class="card pt-2 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{ __('site.permission') }}</h2>
                                    </div>
                                    <!--end::Card title-->

                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="table-responsive card-body pt-0">
                                    <!--begin::Tab Content-->
                                    <div class="modal-body scroll-y mx-5 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_update_role_form" class="form" action="#">
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                id="kt_modal_update_role_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_update_role_header"
                                                data-kt-scroll-wrappers="#kt_modal_update_role_scroll"
                                                data-kt-scroll-offset="300px">
                                                <!--begin::Permissions-->
                                                <div class="fv-row">
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                            <!--begin::Table body-->
                                                            <tbody class="text-gray-600 fw-semibold">
                                                                <div
                                                                    class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-5 g-xl-9">
                                                                    <!--begin::Col-->

                                                                    @foreach ($permissions as $permission)
                                                                        {{-- @if ($permission->guard_name === 'employee') --}}
                                                                        <div class="col-md-4">
                                                                            <!--begin::Card-->
                                                                            <div class="card card-flush h-md-100">
                                                                                <!--begin::Card body-->
                                                                                <div class="card-body pt-1">
                                                                                    <!--begin::Permissions-->
                                                                                    <div
                                                                                        class="d-flex flex-column text-gray-600">
                                                                                        {{-- <div class="d-flex"> --}}
                                                                                        <!--begin::Checkbox-->
                                                                                        <label
                                                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                id="permission_{{ $permission->id }}"
                                                                                                @if ($permission->assigned) checked @endif
                                                                                                onclick="updateRolePermission('{{ $permission->id }}')"
                                                                                                name="user_management_read" />
                                                                                            <span
                                                                                                class="form-check-label">{{ $permission->name }}</span>
                                                                                        </label>
                                                                                        <!--end::Checkbox-->

                                                                                        {{--
                                                                                </div> --}}
                                                                                    </div>
                                                                                    <!--end::Permissions-->
                                                                                </div>
                                                                                <!--end::Card body-->
                                                                            </div>
                                                                            <!--end::Card-->
                                                                        </div>
                                                                        {{-- @endif --}}
                                                                    @endforeach
                                                                    <!--end::Col-->
                                                                </div>
                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>

                                                    </div>

                                                </div>
                                                <!--end::Permissions-->
                                            </div>
                                            <!--end::Scroll-->
                                            <!--begin::Actions-->
                                            {{-- <div class="text-center pt-15">
                                            <button type="reset" class="btn btn-light me-3"
                                                data-kt-roles-modal-action="cancel">Discard</button>
                                            <button type="submit" class="btn btn-primary"
                                                data-kt-roles-modal-action="submit">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div> --}}
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Tab Content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::permission-->

                        <!--begin:::info-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_infos" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{ __('site.information') }}</h2>
                                    </div>
                                    <!--end::Card title-->

                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="table-responsive card-body py-0">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table
                                            class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5"
                                            id="kt_table_customers_logs">
                                            <!--begin::Table body-->
                                            <tbody>
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-warning">{{ __('site.id_number') }}
                                                        </div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td>download image for id number</td>
                                                    <!--end::Status=-->
                                                    <!--begin::Timestamp=-->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        @if (!empty($customer->images->where('name', 'avatar')->first()))
                                                            <a class="btn btn-sm btn-light-primary"
                                                                href="{{ asset($customer->images->where('name', 'avatar')->first()->url) }}"
                                                                download="{{ $customer->images->where('name', 'avatar')->first()->name }}">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3"
                                                                            d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z"
                                                                            fill="currentColor" />
                                                                        <path
                                                                            d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z"
                                                                            fill="currentColor" />
                                                                        <path opacity="0.3"
                                                                            d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <!--end::Timestamp=-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-warning">
                                                            {{ __('site.account_statement') }}
                                                        </div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td>download image for account statement</td>
                                                    <!--end::Status=-->
                                                    <!--begin::Timestamp=-->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        @if (!empty($customer->images->where('name', 'account_statement')->first()))
                                                            <a class="btn btn-sm btn-light-primary"
                                                                href="{{ asset($customer->images->where('name', 'account_statement')->first()->url) }}"
                                                                download="{{ $customer->images->where('name', 'account_statement')->first()->name }}">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3"
                                                                            d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z"
                                                                            fill="currentColor" />
                                                                        <path
                                                                            d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z"
                                                                            fill="currentColor" />
                                                                        <path opacity="0.3"
                                                                            d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <!--end::Timestamp=-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-warning">
                                                            {{ __('site.credit_inquiry') }}
                                                        </div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td>download image for credit inquiry</td>
                                                    <!--end::Status=-->
                                                    <!--begin::Timestamp=-->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        @if (!empty($customer->images->where('name', 'credit_inquiry')->first()))
                                                            <a class="btn btn-sm btn-light-primary"
                                                                href="{{ asset($customer->images->where('name', 'credit_inquiry')->first()->url) }}"
                                                                download="{{ $customer->images->where('name', 'credit_inquiry')->first()->name }}">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3"
                                                                            d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z"
                                                                            fill="currentColor" />
                                                                        <path
                                                                            d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z"
                                                                            fill="currentColor" />
                                                                        <path opacity="0.3"
                                                                            d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <!--end::Timestamp=-->
                                                </tr>
                                                <!--end::Table row-->

                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::info-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Content container-->
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script>
        function updateRolePermission(permissionId) {
            axios.post('/update-permission', {
                    //   'role_id':roleId,
                    'guard': 'customer',
                    'user_id': '{{ $customer->id }}',
                    'permission_id': permissionId
                })
                .then(function(response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                })
                .catch(function(error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>
@endsection
