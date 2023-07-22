@extends('dashboard.index')

@section('title',__('site.invoice'))

@section('page_name',__('site.invoice'))

@section('name',__('site.add'))

@section('css')

@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!-- begin::Invoice 3-->
        <div class="card">
            <!-- begin::Body-->
            <div class="card-body py-20">
                <!-- begin::Wrapper-->
                <div class="mw-lg-950px mx-auto w-100">
                    <!-- begin::Header-->
                    <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                        <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">{{__('site.invoice')}}</h4>
                        <!--end::Logo-->
                        {{-- <div class="text-sm-end">
                            <!--begin::Logo-->
                            <a href="#" class="d-block mw-150px ms-sm-auto">
                                <img alt="Logo" src="assets/media/svg/brand-logos/lloyds-of-london-logo.svg"
                                    class="w-100" />
                            </a>
                            <!--end::Logo-->
                            <!--begin::Text-->
                            <div class="text-sm-end fw-semibold fs-4 text-muted mt-7">
                                <div>Cecilia Chapman, 711-2880 Nulla St, Mankato</div>
                                <div>Mississippi 96522</div>
                            </div>
                            <!--end::Text-->
                        </div> --}}
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="pb-12">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column gap-7 gap-md-10">
                            <!--begin::Message-->
                            <div class="fw-bold fs-2">{{$monthy->contract->order->customer->name}}
                                <span class="fs-6">({{$monthy->contract->order->customer->id_number}})</span>
                                <br />
                                {{-- <span class="text-muted fs-5">Here are your order details. We thank you for your
                                    purchase.</span> --}}
                            </div>
                            <!--begin::Message-->
                            <!--begin::Separator-->
                            <div class="separator"></div>
                            <!--begin::Separator-->
                            <!--begin::Order details-->
                            <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                                <div class="flex-root d-flex flex-column">
                                    <span class="text-muted">{{__('site.orderId')}}</span>
                                    <span class="fs-5">#{{$monthy->contract->order->id}}</span>
                                </div>
                                <div class="flex-root d-flex flex-column">
                                    <span class="text-muted">{{__('site.date')}}</span>
                                    <span class="fs-5">{{$payDate}}</span>
                                </div>
                                <div class="flex-root d-flex flex-column">
                                    <span class="text-muted">{{__('site.invoiceId')}}</span>
                                    <span class="fs-5">#{{$monthy->id}}</span>
                                </div>
                                {{-- <div class="flex-root d-flex flex-column">
                                    <span class="text-muted">Shipment ID</span>
                                    <span class="fs-5">#SHP-0025410</span>
                                </div> --}}
                            </div>
                            <!--end::Order details-->
                            <!--begin::Billing & shipping-->
                            {{-- <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                                <div class="flex-root d-flex flex-column">
                                    <span class="text-muted">Billing Address</span>
                                    <span class="fs-6">Unit 1/23 Hastings Road,
                                        <br />Melbourne 3000,
                                        <br />Victoria,
                                        <br />Australia.</span>
                                </div>
                                <div class="flex-root d-flex flex-column">
                                    <span class="text-muted">Shipping Address</span>
                                    <span class="fs-6">Unit 1/23 Hastings Road,
                                        <br />Melbourne 3000,
                                        <br />Victoria,
                                        <br />Australia.</span>
                                </div>
                            </div> --}}
                            <!--end::Billing & shipping-->
                            <!--begin:Order summary-->
                            <div class="d-flex justify-content-between flex-column">
                                <!--begin::Table-->
                                <div class="table-responsive border-bottom mb-9">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                        <thead>
                                            <tr class="border-bottom fs-6 fw-bold text-muted">
                                                <th class="min-w-175px pb-2">{{__('site.product')}}</th>
                                                <th class="min-w-70px text-end pb-2">{{__('site.installment_number')}}
                                                </th>
                                                <th class="min-w-80px text-end pb-2">{{__('site.price')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            <!--begin::Products-->
                                            <tr>
                                                <!--begin::Product-->
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Thumbnail-->
                                                        <a class="symbol symbol-50px">
                                                            <span class="symbol-label"
                                                                style="background-image:url({{asset($monthy->contract->order->product->images[0]->url)}});"></span>
                                                        </a>
                                                        <!--end::Thumbnail-->
                                                        <!--begin::Title-->
                                                        <div class="ms-5">
                                                            <div class="fw-bold">
                                                                {{$monthy->contract->order->product->name}}
                                                            </div>

                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                </td>
                                                <!--end::Product-->
                                                <!--begin::installment_number-->
                                                <td class="text-end">{{$monthy->installment_number}}</td>
                                                <!--end::installment_number-->
                                                <!--begin::price-->
                                                <td class="text-end">&#8362;{{$monthy->price}}</td>
                                                <!--end::price-->

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end:Order summary-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Body-->
                    <!-- begin::Footer-->
                    <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
                        <!-- begin::Actions-->
                        <div class="my-1 me-5">
                            <!-- begin::Pint-->
                            <a href="{{route('monthyinstallment.print',$monthy->id)}}"
                                class="btn btn-success my-1 me-12">{{__('site.download-invoice')}}</a>
                            <!-- end::Pint-->
                            <!-- begin::Download-->
                            {{-- <button type="button" class="btn btn-light-success my-1">Download</button> --}}
                            <!-- end::Download-->
                        </div>
                        <!-- end::Actions-->
                        <!-- begin::Action-->
                        @can('Paid-invoice')
                        <a data-bs-toggle="modal" data-bs-target="#kt_modal_update_role"
                            class="btn btn-primary my-1">{{__('site.paid')}}</a>
                        @endcan
                        <!-- end::Action-->
                    </div>
                    <!-- end::Footer-->
                </div>
                <!-- end::Wrapper-->
            </div>
            <!-- end::Body-->
        </div>
        <!-- end::Invoice 1-->
    </div>
    <!--end::Content container-->
</div>

<!--begin::Modal - Update role-->
<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">{{__('site.add_note')}}</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
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
                <form id="kt_modal_update_role_form" class="form" action="#">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header"
                        data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">{{__('site.price')}}</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="{{__('site.price')}}"
                                name="price" id="price" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-roles-modal-action="cancel">Discard</button>
                        <button type="button" onclick="update()" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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

@endsection

@section('js')
<script src="{{asset('assets/js/custom/apps/ecommerce/sales/save-order.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
<script>
    function update() {
        axios.put('/month-installment/{{$monthy->id}}',{
            price : document.getElementById('price').value,
        })
        .then(function (response) {
            toastr.success(response.data.message);
            // window.location.href = '/month-installment/{{$monthy->contract->id}}';
            Swal.fire({
                text: "Form has been successfully submitted!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                confirmButton: "btn btn-primary"
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    $('#kt_modal_update_role').modal('hide');
                }
            });

        }).catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message)
        });
    }//end update order

</script>
@endsection