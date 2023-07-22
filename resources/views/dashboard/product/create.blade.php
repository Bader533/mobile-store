@extends('dashboard.index')

@section('title',__('site.product'))

@section('page_name',__('site.product'))

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
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('site.id_photo')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <!--begin::Image input placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('{{asset(' assets/media/svg/files/blank-image.svg')}}');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('{{asset(' assets/media/svg/files/blank-image-dark.svg')}}');
                                }
                            </style>
                            <!--end::Image input placeholder-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg" required />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg
                                image files are accepted</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->

                </div>
                <!--end::Aside column-->
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
                                <label class="required form-label">{{__('site.name_en')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" id="name" class="form-control mb-2"
                                    placeholder="{{__('site.name_en')}}" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A name is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::name-->

                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.name_ar')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name_ar" id="name_ar" class="form-control mb-2"
                                    placeholder="{{__('site.name_ar')}}" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A name is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::name-->

                            <!--begin::serial_number-->
                            {{-- <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.serial_number')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="serial_number" id="serial_number" class="form-control mb-2"
                                    placeholder="{{__('site.serial_number')}}" value="" required />
                                <!--end::Input-->
                            </div> --}}
                            <!--end::serial_number-->

                            <!--begin::price-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.price')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="price" id="price" class="form-control mb-2"
                                    placeholder="{{__('site.price')}}" value="" required />
                                <!--end::Input-->
                            </div>
                            <!--end::price-->

                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.note')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="note" id="note" class="form-control mb-2"
                                    placeholder="{{__('site.note')}}" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                {{-- <div class="text-muted fs-7">A name is required and recommended to be unique.
                                </div> --}}
                                <!--end::Description-->
                            </div>
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('product.index')}}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">{{__('site.cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="button" id="kt_ecommerce_add_category_submit" class="btn btn-primary"
                            onclick="store()">
                            <span class="indicator-label">{{__('site.submit')}}</span>
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
    function store() {
        let formData = new FormData();

        formData.append("name", document.getElementById('name').value);
        formData.append("name_ar", document.getElementById('name_ar').value);
        formData.append("price", document.getElementById('price').value);
        formData.append("note", document.getElementById('note').value);
        formData.append("avatar", document.getElementById('avatar').files[0]);
        formData.append("_method", "POST");
        axios.post('/product', formData)
        .then(function (response) {
            window.location.href = '/product';
            toastr.success(response.data.message);

        }).catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message)
        });
    }//end store product
</script>
@endsection