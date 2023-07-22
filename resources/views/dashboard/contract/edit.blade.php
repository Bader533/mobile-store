@extends('dashboard.index')

@section('title',__('site.product'))

@section('page_name',__('site.product'))

@section('name',__('site.create'))

@section('css')

@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Form-->
        <form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="../../demo1/dist/apps/ecommerce/sales/listing.html">
            <!--begin::Aside column-->
            <div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">
                <!--begin::Order details-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Order Details</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-10">
                            <!--begin::status-->
                            <div class="fv-row">

                                <label class="required form-label">{{__('site.status')}}</label>

                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" name="status" id="status" required>
                                    <option></option>

                                    <option value="accepted" @if ($order->status == 'accepted')
                                        selected
                                        @endif>accepted</option>

                                    <option value="rejected" @if ($order->status == 'rejected')
                                        selected
                                        @endif>rejected</option>

                                    <option value="processing" @if ($order->status == 'processing')
                                        selected
                                        @endif>processing</option>

                                </select>

                                <div class="text-muted fs-7">Set the date of the order to process.</div>

                            </div>
                            <!--end::status-->

                            <!--begin::installment methods-->
                            <div class="fv-row">

                                <label class="required form-label">{{__('site.installment_method')}}</label>

                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" name="installment_method"
                                    id="installment_method" required>
                                    <option></option>
                                    @foreach ($installments as $installment)
                                    <option value="{{$installment->id}}" @if ($order->installment_id ==$installment->id)
                                        selected
                                        @endif>{{$installment->name}}</option>
                                    @endforeach
                                </select>

                                <div class="text-muted fs-7">Set the date of the order to process.</div>

                            </div>
                            <!--end::installment methods-->

                            <!--begin::installment months-->
                            <div class="fv-row">

                                <label class="required form-label">{{__('site.installment_months')}}</label>

                                <input type="text" class="form-control mb-2" name="installment_month"
                                    id="installment_month" value="{{$order->installment_month}}" required />

                                <div class="text-muted fs-7">Set the date of the order to process.</div>

                            </div>
                            <!--end::installment months-->

                            <!--begin::installment amount-->
                            <div class="fv-row">

                                <label class="required form-label">{{__('site.installment_amount')}}</label>

                                <input type="text" class="form-control mb-2" name="installment_amount"
                                    id="installment_amount" value="{{$order->installment_amount}}" required />

                                <div class="text-muted fs-7">Set the date of the order to process.</div>

                            </div>
                            <!--end::installment amount-->

                            <!--begin::presenter-->
                            <div class="fv-row">

                                <label class="required form-label">{{__('site.presenter')}}</label>

                                <input type="text" name="presenter" id="presenter" class=" form-control mb-2"
                                    value="{{$order->presenter}}" required />

                                <div class="text-muted fs-7">Set the date of the order to process.</div>

                            </div>
                            <!--end::presenter-->

                            <!--begin::branch-->
                            <div class="fv-row">

                                <label class="required form-label">{{__('site.branch')}}</label>

                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" name="branch_id" id="branch_id" required>
                                    <option></option>
                                    @foreach ($branches as $branch)
                                    <option value="{{$branch->id}}" @if ($order->branch_id ==$branch->id)
                                        selected
                                        @endif>{{$branch->name}}</option>
                                    @endforeach
                                </select>

                                <div class="text-muted fs-7">Set the date of the order to process.</div>

                            </div>
                            <!--end::branch-->

                        </div>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Order details-->
            </div>
            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                <!--begin::Order details-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Select Products</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-10">
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Add products to this order</label>
                                <!--end::Label-->
                                <!--begin::Selected products-->
                                <div class="row row-cols-1 row-cols-xl-3 row-cols-md-2 border border-dashed rounded pt-3 pb-1 px-2 mb-5 mh-300px overflow-scroll"
                                    id="kt_ecommerce_edit_order_selected_products">
                                    <!--begin::Empty message-->
                                    <span class="w-100 text-muted">Select one or more products from the list below by
                                        ticking the checkbox.</span>
                                    <!--end::Empty message-->
                                </div>
                                <!--begin::Selected products-->
                                <!--begin::Total price-->
                                <div class="fw-bold fs-4">Total Cost: $
                                    <span id="kt_ecommerce_edit_order_total_price">0.00</span>
                                </div>
                                <!--end::Total price-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Separator-->
                            <div class="separator"></div>
                            <!--end::Separator-->
                            <!--begin::Search products-->
                            <div class="d-flex align-items-center position-relative mb-n7">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
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
                                <input type="text" data-kt-ecommerce-edit-order-filter="search"
                                    class="form-control form-control-solid w-100 w-lg-50 ps-14"
                                    placeholder="Search Products" />
                            </div>
                            <!--end::Search products-->
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5"
                                id="kt_ecommerce_edit_order_product_table">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-25px pe-2"></th>
                                        <th class="min-w-200px">{{__('site.product')}}</th>
                                        <th class="min-w-100px text-end pe-5">{{__('site.serial_number')}}</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($products as $product)
                                    <tr>

                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" id="product_id"
                                                    @if($order->product_id ==$product->id)
                                                checked
                                                @endif value="{{$product->id}}" />
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center"
                                                data-kt-ecommerce-edit-order-filter="product"
                                                data-kt-ecommerce-edit-order-id="product_1">

                                                <a class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                        style="background-image:url({{asset($product->images[0]->url)}});"></span>
                                                </a>

                                                <div class="ms-5">

                                                    <a
                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold">{{$product->name}}</a>

                                                    <div class="fw-semibold fs-7">Price:
                                                        <span
                                                            data-kt-ecommerce-edit-order-filter="price">{{$product->price}}</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-5" data-order="42">
                                            <span class="fw-bold ms-3">{{$product->serial_number}}</span>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Order details-->
                <!--begin::Order details-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{__('site.information')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Billing address-->
                        <div class="d-flex flex-column gap-5 gap-md-7">

                            <!--begin::customer-->
                            <div class="fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.customer')}}</label>
                                <!--end::Label-->
                                <!--begin::Select2-->
                                <select name="customer_id" id="customer_id" data-control="select2"
                                    data-placeholder="Select an option" class="form-select form-select-solid fw-bold">
                                    <option></option>
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}" @if ($order->customer_id == $customer->id)
                                        selected
                                        @endif>
                                        {{$customer->name}}</option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--end::customer-->

                            <!--begin::guarantor-->
                            <div class="fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.guarantor')}}</label>
                                <!--end::Label-->
                                <!--begin::Select2-->
                                <select name="guarantor_id" id="guarantor_id" data-control="select2"
                                    data-placeholder="Select an option" class="form-select form-select-solid fw-bold">
                                    <option></option>
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}" @if ($order->guarantor_id == $customer->id)
                                        selected
                                        @endif>
                                        {{$customer->name}}</option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--end::guarantor-->

                        </div>
                        <!--end::Billing address-->
                    </div>
                    <!--end::Card body-->

                </div>

                <!--end::Order details-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a id="kt_ecommerce_edit_order_cancel" class="btn btn-light me-5">Cancel</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="button" onclick="update()" class="btn btn-primary">
                        <span class="indicator-label">{{__('site.edit')}}</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Main column-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content container-->
</div>
@endsection

@section('js')
<script src="{{asset('assets/js/custom/apps/ecommerce/sales/save-order.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
<script>
    function update() {
        axios.put('/order/{{$order->id}}', {
            installment_method : document.getElementById('installment_method').value,
            installment_month : document.getElementById('installment_month').value,
            installment_amount : document.getElementById('installment_amount').value,
            presenter : document.getElementById('presenter').value,
            branch_id : document.getElementById('branch_id').value,
            product_id : document.getElementById('product_id').value,
            customer_id : document.getElementById('customer_id').value,
            guarantor_id : document.getElementById('guarantor_id').value,
            status : document.getElementById('status').value,
        })
        .then(function (response) {
            window.location.href = '/order';
            toastr.success(response.data.message);

        }).catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message)
        });
    }//end update order
</script>
@endsection