@extends('dashboard.index')

@section('title', __('site.tracking'))

@section('page_name', __('site.tracking'))

@section('name', __('site.tracking'))

@section('css')

@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                <br>
                <!--begin::Card header-->
                {{-- <div class="card-header border-0 pt-6">
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
                            <a href="{{ route('order.create') }}" class="btn btn-primary">{{ __('site.add_order') }}</a>
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->

                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div> --}}
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
                                <th class="min-w-125px">{{ __('site.name') }}</th>
                                <th class="min-w-125px">{{ __('site.activity') }}</th>
                                <th class="min-w-125px">{{ __('site.time') }}</th>
                                <th class="min-w-125px">{{ __('site.date') }}</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600" id="table_order">
                            @if (!$trackings->isEmpty())
                                @foreach ($trackings as $tracking)
                                    <tr>
                                        <!--begin::Name=-->
                                        <td>
                                            <a class="text-gray-800 text-hover-primary mb-1">{{ $tracking->id }}</a>
                                        </td>
                                        <!--end::Name=-->
                                        <!--begin::Email=-->
                                        <td data-bs-target="license">
                                            <a
                                                class="text-gray-600 text-hover-primary mb-1">{{ $tracking->object->name }}</a>
                                        </td>
                                        <!--end::Email=-->
                                        <!--begin::Company=-->
                                        <td>{{ $tracking->activity }}</td>
                                        <!--end::Company=-->

                                        <!--begin::time=-->
                                        <td>{{ $tracking->time }}</td>
                                        <!--end::Company=-->

                                        <!--begin::Company=-->
                                        <td>{{ date('m/d/Y', strtotime($tracking->created_at)) }}</td>
                                        <!--end::Company=-->
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">{{ __('site.no_data_found') }}</td>
                                </tr>
                            @endif
                        </tbody>
                        <!--end::Table body-->
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
                <!--end::Card body-->
            </div>
            <!--end::Card-->

        </div>
        <!--end::Content container-->
    </div>
@endsection

@section('js')

@endsection
