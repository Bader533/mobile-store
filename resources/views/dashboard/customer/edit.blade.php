@extends('dashboard.index')

@section('title',__('site.customer'))

@section('page_name',__('site.customer'))

@section('name',__('site.edit'))

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
                    <!--begin::id photo-->
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
                            {{-- {{dd(isset($customer->images))}} --}}
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->

                                @if (!empty($customer->images->where('name','avatar')->first()) )

                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image: url({{asset($customer->images->where('name','avatar')->first()->url)}})">
                                </div>

                                @else

                                <div class="image-input-wrapper w-150px h-150px"></div>

                                @endif

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
                    <!--end::id photo-->

                    <!--begin::Account statement-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('site.account_statement')}}</h2>
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

                                @if (!empty($customer->images->where('name','account_statement')->first()) )

                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image: url({{asset($customer->images->where('name','account_statement')->first()->url)}})">
                                </div>

                                @else

                                <div class="image-input-wrapper w-150px h-150px"></div>

                                @endif

                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="account_statement" id="account_statement"
                                        accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="account_statement_remove" />
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
                    <!--end::Account statement-->

                    <!--begin::credit_inquiry-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('site.credit_inquiry')}}</h2>
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

                                @if (!empty($customer->images->where('name','credit_inquiry')->first()) )
                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image: url({{asset($customer->images->where('name','credit_inquiry')->first()->url)}})">
                                </div>
                                @else
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                @endif

                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="credit_inquiry" id="credit_inquiry"
                                        accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="credit_inquiry_remove" />
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
                    <!--end::credit_inquiry-->

                    <!--begin::date-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('site.identity')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <!--begin::date_of_issuing_the_id-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.date_of_issuing_the_id')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="date_of_issuing_the_id" id="date_of_issuing_the_id"
                                    class="form-control mb-2" placeholder="{{__('site.date_of_issuing_the_id')}}"
                                    value="{{$customer->date_of_issuing_the_id}}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::date_of_issuing_the_id-->

                            <!--begin::place_issue_of_id-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.place_issue_of_id')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="place_issue_of_id" id="place_issue_of_id"
                                    class="form-control mb-2" placeholder="{{__('site.place_issue_of_id')}}"
                                    value="{{$customer->place_issue_of_id}}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::place_issue_of_id-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::date-->

                    <!--begin::company-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('site.company')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                data-placeholder="Select an option" id="is_company">
                                <option></option>
                                <option value="1" @if ($customer->is_company == 1) selected="selected"
                                    @endif>{{__('site.is_company')}}</option>
                                <option value="0" @if ($customer->is_company == 0) selected="selected"
                                    @endif>{{__('site.is_not_company')}}</option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the employee status.</div>
                            <!--end::Description-->
                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select
                                    publishing date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_category_status_datepicker"
                                    placeholder="Pick date & time" />
                            </div>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->

                    <!--begin::Status-->
                    @can(['Change-Status'])
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('site.status')}}</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            @if ($customer->active == 1)
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                    id="kt_ecommerce_add_category_status">
                                </div>
                            </div>
                            @else
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-danger w-15px h-15px"
                                    id="kt_ecommerce_add_product_status">
                                </div>
                            </div>
                            @endif
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                                <option></option>
                                <option value="1" @if ($customer->active == 1) selected="selected"
                                    @endif>{{__('site.active')}}</option>
                                <option value="0" @if ($customer->active == 0) selected="selected"
                                    @endif>{{__('site.non_active')}}</option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the customer status.</div>
                            <!--end::Description-->
                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select
                                    publishing date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_category_status_datepicker"
                                    placeholder="Pick date & time" />
                            </div>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    @endcan
                    <!--end::Status-->

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
                            <!--begin::name_en-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.name_en')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name_en" id="name_en" class="form-control mb-2"
                                    placeholder="{{__('site.name_en')}}" value="{{$customer->name_en}}" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A English name is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::name_en-->

                            <!--begin::name_ar-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.name_ar')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name_ar" id="name_ar" class="form-control mb-2"
                                    placeholder="{{__('site.name_ar')}}" value="{{$customer->name_ar}}" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A Arabic name is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::name_ar-->

                            <!--begin::mother_name-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.mother_name')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="mother_name" id="mother_name" class="form-control mb-2"
                                    placeholder="{{__('site.mother_name')}}" value="{{$customer->mother_name}}"
                                    required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A Mother name is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::mother_name-->

                            <!--begin::address-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.address')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="address" id="address" class="form-control mb-2"
                                    placeholder="{{__('site.address')}}" value="{{$customer->address}}" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                {{-- <div class="text-muted fs-7">A name is required and recommended to be unique.
                                </div> --}}
                                <!--end::Description-->
                            </div>
                            <!--end::address-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->

                    <!--begin::phone number-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{__('site.phone')}}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::phone-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.phone')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="phone" id="phone" class="form-control mb-2"
                                    placeholder="970 599 999 999" value="{{$customer->phone}}" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                {{-- <div class="text-muted fs-7">A name is required and recommended to be unique.
                                </div> --}}
                                <!--end::Description-->
                            </div>
                            <!--end::phone-->

                            <!--begin::phone-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">{{__('site.other_phone')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="other_phone" id="other_phone" class="form-control mb-2"
                                    placeholder="970 599 999 999" value="{{$customer->other_phone}}" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                {{-- <div class="text-muted fs-7">A name is required and recommended to be unique.
                                </div> --}}
                                <!--end::Description-->
                            </div>
                            <!--end::phone-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::phone number-->

                    <!--begin::career-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{__('site.career')}}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::career-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.career')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="career" id="career" class="form-control mb-2"
                                    placeholder="{{__('site.career')}}" value="{{$customer->career}}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::career-->

                            <!--begin::place_of_work-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.place_of_work')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="place_of_work" id="place_of_work" class="form-control mb-2"
                                    placeholder="{{__('site.place_of_work')}}" value="{{$customer->place_of_work}}"
                                    required />
                                <!--end::Input-->
                            </div>
                            <!--end::place_of_work-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::career-->

                    <!--begin::Identity-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{__('site.date')}}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::id_number-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.id_number')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="id_number" id="id_number" class="form-control mb-2"
                                    placeholder="{{__('site.id_number')}}" value="{{$customer->id_number}}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::id_number-->

                            <!--begin::date_of_birth-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.date_of_birth')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control mb-2"
                                    placeholder="" value="{{$customer->date_of_birth}}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::date_of_birth-->

                            <!--begin::place_of_birth-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('site.place_of_birth')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control mb-2"
                                    placeholder="{{__('site.place_of_birth')}}" value="{{$customer->place_of_birth}}"
                                    required />
                                <!--end::Input-->
                            </div>
                            <!--end::place_of_birth-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Identity-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('customer.index')}}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">{{__('site.cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary"
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

       formData.append("name_en", document.getElementById('name_en').value);
        formData.append("name_ar", document.getElementById('name_ar').value);
        formData.append("mother_name", document.getElementById('mother_name').value);
        formData.append("id_number", document.getElementById('id_number').value);
        formData.append("address", document.getElementById('address').value);
        formData.append("phone", document.getElementById('phone').value);
        formData.append("other_phone", document.getElementById('other_phone').value);
        formData.append("date_of_birth", document.getElementById('date_of_birth').value);
        formData.append("place_of_birth", document.getElementById('place_of_birth').value);

        formData.append("career", document.getElementById('career').value);
        formData.append("place_of_work", document.getElementById('place_of_work').value);

        formData.append("date_of_issuing_the_id", document.getElementById('date_of_issuing_the_id').value);
        formData.append("place_issue_of_id", document.getElementById('place_issue_of_id').value);

        formData.append("status", document.getElementById('kt_ecommerce_add_product_status_select').value);
        formData.append("is_company", document.getElementById('is_company').value);
        formData.append("avatar", document.getElementById('avatar').files[0]);

        formData.append("account_statement", document.getElementById('account_statement').files[0]);
        formData.append("credit_inquiry", document.getElementById('credit_inquiry').files[0]);

        formData.append("_method", "PUT");
        axios.post('/customer/{{$customer->id}}', formData)
        .then(function (response) {
            window.location.href = '/customer';
            toastr.success(response.data.message);

        }).catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message)
        });
    }//end update customer

    $('#kt_ecommerce_add_product_status_select').on('change', function (e) {
        const target = document.getElementById('kt_ecommerce_add_product_status');
        const statusClasses = ['bg-success', 'bg-warning', 'bg-danger'];
        const value = e.target.value;

        switch (value) {
            case "1": {
                target.classList.remove(...statusClasses);
                target.classList.add('bg-success');
                break;
            }
            case "0": {
                target.classList.remove(...statusClasses);
                target.classList.add('bg-danger');
                break;
            }
            default:
             break;
        }
    });//change color status
</script>
@endsection