@if (!$employees->isEmpty())

@foreach ($employees as $employee)
<tr>
    <!--begin::Checkbox-->
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid">
            <input class="form-check-input" type="checkbox" value="{{$employee->id}}" />
        </div>
    </td>
    <!--end::Checkbox-->
    <!--begin::Name=-->
    <td>
        <a class="text-gray-800 text-hover-primary mb-1">{{$employee->name}}</a>
    </td>
    <!--end::Name=-->
    <!--begin::Email=-->
    <td>
        <a class="text-gray-600 text-hover-primary mb-1">{{$employee->id_number}}</a>
    </td>
    <!--end::Email=-->
    <!--begin::Company=-->
    <td>{{$employee->phone}}</td>
    <!--end::Company=-->
    <!--begin::Date=-->
    <td>{{$employee->created_at}}</td>
    <!--end::Date=-->
    <!--begin::Action=-->
    <td class="text-end">

        <!--begin::Edit-->
        <a href="{{route('employee.edit',$employee->id)}}"
            class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-target="#kt_modal_update_address">
            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="{{__('site.edit')}}">
                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
        <!--end::Edit-->
        <!--begin::Delete-->
        {{-- <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="tooltip"
            title="Delete" data-kt-customer-payment-method="delete">
            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                        fill="currentColor" />
                    <path opacity="0.5"
                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                        fill="currentColor" />
                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a> --}}
        <!--end::Delete-->
        <!--begin::More-->
        <a href="{{route('employee.show',$employee->id)}}" class="btn btn-icon btn-active-light-primary w-30px h-30px"
            data-bs-toggle="tooltip" title="{{__('site.show')}}" data-kt-menu-trigger="click"
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
        <!--end::More-->

    </td>
    <!--end::Action=-->
</tr>
@endforeach

@else

<tr>
    <td colspan="7" align="center">{{__('site.no_data_found')}}</td>
</tr>

@endif