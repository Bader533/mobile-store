@extends('dashboard.index')

@section('title',__('site.order'))

@section('page_name',__('site.order'))

@section('name',__('site.all_order'))

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
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-customer-table-filter="search" id="search_order"
                            class="form-control form-control-solid w-250px ps-15"
                            placeholder="{{__('site.search_order')}}" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                @can('Create-Order')
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Add customer-->
                        <a href="{{route('order.create')}}" class="btn btn-primary">{{__('site.add_order')}}</a>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->

                    <!--end::Group actions-->
                </div>
                @endcan
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
                            <th class="min-w-125px">{{__('site.product')}}</th>
                            <th class="min-w-125px">{{__('site.customer')}}</th>
                            <th class="min-w-125px">{{__('site.guarantor')}}</th>
                            <th class="min-w-125px">{{__('site.presenter')}}</th>
                            <th class="min-w-125px">{{__('site.installment_months')}}</th>
                            <th class="min-w-125px">{{__('site.installment_amount')}}</th>
                            <th class="min-w-125px">{{__('site.status')}}</th>
                            @canany(['Update-Order','Show-Order'])
                            <th class="text-end min-w-70px">Actions</th>
                            @endcanany
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600" id="table_order">
                        @if (!$orders->isEmpty())
                        @foreach ($orders as $order)
                        <tr>
                            <!--begin::Name=-->
                            <td>
                                <a class="text-gray-800 text-hover-primary mb-1">{{$order->product->product_name}}</a>
                            </td>
                            <!--end::Name=-->
                            <!--begin::Email=-->
                            <td data-bs-target="license">
                                <a class="text-gray-600 text-hover-primary mb-1">
                                    {{$order->customer->customer_name}}
                                </a>
                            </td>
                            <!--end::Email=-->
                            <!--begin::Company=-->
                            <td>

                                @if ($order->installment->id == 2 ||
                                $order->installment->id == 4)

                                {{$order->guarantor->customer_name}}

                                @elseif ($order->installment->id == 3||
                                $order->installment->id == 5)
                                --
                                @endif

                            </td>
                            <!--end::Company=-->
                            <!--begin::Date=-->
                            <td>{{$order->presenter}}</td>
                            <td>{{$order->installment_month}}</td>
                            <td>{{$order->installment_amount}}</td>
                            <!--end::Date=-->
                            <td>
                                @if ($order->status == 'pending')
                                <div class="badge badge-light-warning">
                                    Pending
                                </div>
                                @elseif($order->status == 'rejected')
                                <div class="badge badge-light-danger fw-bold">
                                    rejected
                                </div>
                                @elseif($order->status == 'accepted')
                                <div class="badge badge-light-success">
                                    accepted
                                </div>
                                @elseif($order->status == 'processing')
                                <div class="badge badge-light-primary">
                                    Processing
                                </div>
                                @endif

                            </td>

                            <!--begin::Action=-->
                            @canany(['Update-Order','Show-Order'])
                            <td class="text-end">

                                <!--begin::Edit-->
                                @can('Update-Order')
                                <a href="{{route('order.edit',$order->id)}}"
                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                    data-bs-target="#kt_modal_update_address">
                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="{{__('site.edit')}}">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
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

                                @can('Show-Order')
                                @if ($order->status == 'accepted')
                                <a href="{{route('order.show',$order->id)}}"
                                    class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip"
                                    title="{{__('site.show')}}" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
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
                                @endif
                                @endcan
                                <!--end::Delete-->
                                <!--begin::More-->
                                {{-- <a href="{{route('order.show',$order->id)}}"
                                    class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip"
                                    title="{{__('site.show')}}" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
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
                                </a> --}}
                                <!--end::More-->

                            </td>
                            @endcanany
                            <!--end::Action=-->
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="8" align="center">{{__('site.no_data_found')}}</td>
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
                                {{ $orders->links('pagination::bootstrap-4') }}
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
    $('#search_order').on('keyup',function(){

        $value = $(this).val();

        if($value){
            $('#table_order').hide();
            $('#table_order_2').show();

            $.ajax({
                type:'get',
                url:"{{ route('order.search') }}",
                data: {
                    'search': $value
                },
                success:function(data){

                    // console.log(data);
                    $('#table_order_2').html(data);


                },
            });
        }else{
            $('#table_order').show();
            $('#table_order_2').hide();
        }

    });//end live search

</script>

@endsection