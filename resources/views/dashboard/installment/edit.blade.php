@extends('dashboard.index')

@section('title',__('site.installment'))

@section('page_name',__('site.installment'))

@section('name',__('site.create'))

@section('css')

@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/categories.html">
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
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
                            <!--begin::name-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.name')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" id="name" class="form-control mb-2"
                                    placeholder="{{__('site.name')}}" value="{{$installment->name}}" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A name is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::name-->

                            <!--begin::formule-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.formule')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="formule" id="formule" class="form-control mb-2"
                                    placeholder="{{__('site.formule')}}" value="{{$installment->formule}}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::formule-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('installment.index')}}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">{{__('site.cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="button" id="kt_ecommerce_add_category_submit" class="btn btn-primary"
                            onclick="update()">
                            <span class="indicator-label">{{__('site.edit')}}</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content container-->
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
<script>
    function update() {
        let formData = new FormData();

        formData.append("name", document.getElementById('name').value);
        formData.append("formule", document.getElementById('formule').value);
        formData.append("_method", "PUT");
        axios.post('/installment/{{$installment->id}}', formData)
        .then(function (response) {
            window.location.href = '/installment';
            toastr.success(response.data.message);

        }).catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message)
        });
    }//end update installment
</script>
@endsection
