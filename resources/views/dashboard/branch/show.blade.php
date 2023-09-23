@extends('dashboard.index')

@section('title', __('site.details'))

@section('page_name', __('site.details'))

@section('name', $branch->branch_name)

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
                                    <img src="{{ asset($branch->branch_image) }}" alt="image" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ $branch->name }}</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="fs-5 fw-semibold text-muted mb-6">{{ __('site.branch') }}</div>
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
                                    <a href="{{ route('branch.edit', $branch->id) }}"
                                        class="btn btn-sm btn-light-primary">{{ __('site.edit') }}</a>
                                </span>
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">{{ __('site.name') }}</div>
                                    <div class="text-gray-600">{{ $branch->branch_name }}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">{{ __('site.id_number') }}</div>
                                    <div class="text-gray-600">{{ $branch->id_number }}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">{{ __('site.phone') }}</div>
                                    <div class="text-gray-600">
                                        <a class="text-gray-600 text-hover-primary">{{ $branch->phone }}</a>
                                    </div>
                                    <!--begin::Details item-->
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
                            <a class="nav-link text-active-primary pb-4 active" data-kt-countup-tabs="true"
                                data-bs-toggle="tab"
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
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_statements" role="tabpanel">

                            <!--begin::Card-->
                            <div class="card pt-2 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{ __('site.installments') }}</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Filter-->
                                        <button type="button" class="btn btn-sm btn-flex btn-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                            <!--end::Svg Icon-->{{ __('site.collected_installments') }} :
                                            {{ $branch->monthyInstallments->count() }}
                                        </button>
                                        <!--end::Filter-->
                                    </div>
                                    <!--end::Card toolbar-->

                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
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
                                                        <th class="min-w-100px text-end pe-7">{{ __('site.invoice') }}</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody class="fs-6 fw-semibold text-gray-600">

                                                    @if (!$branch->monthyInstallments->isEmpty())
                                                        @foreach ($branch->monthyInstallments as $monthy)
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
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
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
                                <div class="card-body pt-0">
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
                                                        {{-- <th class="min-w-100px">{{__('site.name')}}</th> --}}
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
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
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
                                <div class="card-body pt-0">
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
                        <!--end:::Tab pane-->
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
                    'guard': 'branch',
                    'user_id': '{{ $branch->id }}',
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
