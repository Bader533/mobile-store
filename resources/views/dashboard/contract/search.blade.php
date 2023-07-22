@if (!$contracts->isEmpty())

@foreach ($contracts as $contract)
<tr>
    <!--begin::Name=-->
    <td>
        <a class="text-gray-800 text-hover-primary mb-1">{{$contract->getContractId()}}</a>
    </td>
    <!--end::Name=-->
    <!--begin::Email=-->
    <td data-bs-target="license">
        <a class="text-gray-600 text-hover-primary mb-1">{{$contract->order->customer->customer_name}}</a>
    </td>
    <!--end::Email=-->

    <!--begin::Date=-->
    <td>{{$contract->order->product->price}}</td>
    <td>{{$contract->order->presenter}}</td>
    <td>{{$contract->order->installment_month}}</td>
    <td>{{$contract->order->installment_amount}}</td>
    <!--end::Date=-->

    <!--begin::Action=-->
    <td class="text-end">

        <!--begin::Edit-->
        <a @if (Auth::guard('customer')->check())
            href="{{route('monthyinstallment-customer.index',$contract->id)}}" @else
            href="{{route('contract.show',$contract->id)}}" @endif
            class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip"
            title="{{__('site.show')}}" data-kt-menu-trigger="click"
            data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
    <td colspan="7" align="center">{{__('site.no_data_found')}}</td>
</tr>

@endif