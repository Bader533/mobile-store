@extends('dashboard.index')

@section('title',__('site.employee'))

@section('page_name',__('site.employee'))

@section('name',__('site.create'))

@section('css')
{{--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                <tbody class="fw-semibold text-gray-600" id="table_employee">
                                    @foreach($dataFromDatabase as $key => $data)
                                    <tr>
                                        <td>
                                            <input type="hidden" name="addMoreInputFields[{{$key}}][id]"
                                                id="addMoreInputFields[{{$key}}][id]" class="form-control"
                                                value="{{ base64_encode($data->id) }}">

                                            <input type="text" name="addMoreInputFields[{{$key}}][check_number]"
                                                id="addMoreInputFields[{{$key}}][check_number]"
                                                placeholder="Enter subject" class="form-control"
                                                value="{{$data->check_number}}" required />
                                        </td>
                                        <td>
                                            <input type="date" name="addMoreInputFields[{{$key}}][check_date]"
                                                id="addMoreInputFields[{{$key}}][check_date]"
                                                placeholder="Enter subject" class="form-control"
                                                value="{{$data->check_date}}" required />
                                        </td>
                                        <td>
                                            <input type="text" name="addMoreInputFields[{{$key}}][bank]"
                                                id="addMoreInputFields[{{$key}}][bank]" placeholder="Enter subject"
                                                class="form-control" value="{{$data->bank}}" required />
                                        </td>
                                        <td>
                                            <input type="text" name="addMoreInputFields[{{$key}}][price]"
                                                id="addMoreInputFields[{{$key}}][price]" placeholder="Enter subject"
                                                class="form-control" value="{{$data->price}}" required />
                                        </td>
                                        <td>
                                            <input type="text" name="addMoreInputFields[{{$key}}][currency]"
                                                id="addMoreInputFields[{{$key}}][currency]" placeholder="Enter subject"
                                                class="form-control" value="{{$data->currency}}" required />
                                        </td>
                                        <td>
                                            @if ($key == 0)
                                            <button type="button" name="add" id="dynamic-ar"
                                                class="btn btn-primary">Add</button>
                                            @else
                                            <button type="button" onclick="performDelete('{{ $data->id }}')"
                                                class="btn btn-danger remove-input-field">Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('employee.index')}}" id="kt_ecommerce_add_product_cancel"
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var i = {{ count($dataFromDatabase) }};
    // var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#kt_customers_table").append(`<tr>

            <td><input type="text" name="addMoreInputFields[` + i +
            `][check_number]" id="addMoreInputFields[`+ i +`][check_number]" placeholder="Enter subject" class="form-control" required/></td>

            <td><input type="date" name="addMoreInputFields[` + i +`][check_date]" id="addMoreInputFields[`+ i +`][check_date]" placeholder="Enter subject"
                    class="form-control" required/></td>

            <td><input type="text" name="addMoreInputFields[` + i +`][bank]" id="addMoreInputFields[`+ i +`][bank]" placeholder="Enter subject"
                    class="form-control" required/></td>

            <td><input type="text" name="addMoreInputFields[` + i +`][price]" id="addMoreInputFields[`+ i +`][price]" placeholder="Enter subject"
                    class="form-control" required/></td>

            <td><input type="text" name="addMoreInputFields[` + i +`][currency]" id="addMoreInputFields[`+ i +`][currency]" placeholder="Enter subject"
                    class="form-control" required/></td>
            <td><button type="button" onclick='delete()' class="btn btn-danger remove-input-field">Delete</button></td>

            </tr>`);
    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    function store() {
        // let formData = new FormData();
        var formData = $('form').serialize();

        // Convert the value to a number and perform any necessary validation or manipulation
        var additionalNumber = '{{$contract->id}}';
        formData += '&contract_id=' + additionalNumber;
        axios.put('/check/{{$contract->id}}', formData)
        .then(function (response) {
            window.location.href = '/contract/{{$contract->id}}';
            toastr.success(response.data.message);

        }).catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message)
        });
    }//end store seller

    function performDelete(id){
        $(this).parents('tr').remove();
        axios.delete('/check/' + id)
        .then(function (response) {
            //2xx
            console.log(response);
            $(".container").load(window.location.href + " .container");
        })
        .catch(function (error) {
            //4xx - 5xx
            console.log(error.response.data.message);
        });
    }
</script>
@endsection