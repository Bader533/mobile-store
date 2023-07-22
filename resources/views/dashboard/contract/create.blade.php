@extends('dashboard.index')

@section('title',__('site.order'))

@section('page_name',__('site.order'))

@section('name',__('site.create'))

@section('css')
<style>
    #guarantor_contract {
        display: block;
    }

    .header {
        overflow: hidden;
        padding: 20px 10px;
    }

    .header a {
        float: left;
        color: black;
        text-align: center;
        padding: 12px;
        text-decoration: none;
        font-size: 12px;
        line-height: 25px;
        border-radius: 4px;
    }

    .header a.logo {
        font-size: 12px;
        font-weight: bold;
    }

    .header-right {
        float: right;
    }

    .header img {
        margin: -17px 0px -20px 304px;
    }

    hr {
        margin: 0px 30px;
    }

    .title {
        text-align: center;
        font-size: 22px;
        font-weight: 600;
    }

    .contract {
        direction: rtl;
        padding: 0px 15px;
        font-size: 16px;
        white-space: normal;
    }

    .draft {
        direction: rtl;
        padding: 0px 35px;
        font-size: 12px;
    }

    .tile-content {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    #footer {
        padding: 66px 0px;
        font-size: 18px;
        /* padding: 27px 0px 100px 0px; */
    }

    #draft_id {
        margin: -19px 0px 14px 0px;
        direction: rtl;
    }

    .get_draft {
        font-size: 18px;
    }

    .owner_id {
        font-size: 18px;
        float: left;
        padding: 0px 0px 0px 260px;
    }

    .owner_draft {
        font-size: 18px;
    }

    .page_draft {
        padding: 5px;
        border-style: solid;
        border-width: 2px;
    }

    .date {
        font-size: 13px;
        float: left;
        margin: 43px 0px 0px 0px;
    }

    .contractid {
        margin: 2px 0px 19px 823px;
        font-size: 11px;
    }

    #header_img {
        margin: -27px 0px 0px 0px;
    }

    .theprice {
        font-size: 16px;
        font-weight: bold;
    }

    .price_all {

        border: 2px solid black;
        padding: 5px 82px;
    }
</style>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Form-->
        <form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="../../demo1/dist/apps/ecommerce/sales/listing.html">
            <!--begin::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                <!--begin::contract-->
                <div class="card card-flush py-4">
                    <div class="card-header border-0 pt-6">

                        <div class="card-title">
                            <h2>Contract</h2>
                        </div>

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div>
                                <select class="form-select" onchange="changecontract()" id="sponsor"
                                    data-control="select2" data-hide-search="true" data-placeholder="Select an option">
                                    <option></option>
                                    <option value="0" selected="selected">{{__('site.guarantor')}}</option>
                                    <option value="1">{{__('site.without_guarantor')}}</option>
                                </select>
                            </div>&nbsp; &nbsp;
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <!--begin::Add customer-->
                                <a onclick="printContent()" class="btn btn-primary">{{__('site.print')}}</a>
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->

                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-10">
                            <!--begin::Separator-->
                            <div class="separator"></div>
                            <!--end::Separator-->
                            <!--begin::Table-->
                            <div class="page" id="page">
                                <p class="contractid">{{$order->contract->getContractId()}}</p>
                                <center>
                                    <div class="row">

                                        <div class="col-sm-4">Smartphones For Store Yazan</div>
                                        <div class="col-sm-4" id="header_img"><img
                                                src="{{asset('images/logo-contract.png')}}" alt="">
                                        </div>
                                        <div class="col-sm-4">یزن ستور للھواتف الذكیة</div>
                                    </div>
                                </center>
                                <hr><br>
                                <div class="content">
                                    <p class="title"><u>عقد اتفاق على بيع جوال تقسيط</u></p><br>
                                    <div class="contract">
                                    </div>
                                    <div class="contract">
                                        <p>انه وفى يوم {{$ar_day}} الموافق {{date("Y/m/d")}} م جرى تحرير هذا العقد بعد
                                            الاتفاق و
                                            التراضي بين كل من:-

                                        </p>
                                        <p>
                                            الطرف الاول : محل يزن ستور لبيع الهواتف الذكية و يمثله السيد / اليزن اشرف
                                            احمد اليازوري ، من غزة و

                                            يحمل الهوية رقم / (40611477) دائن
                                        </p>
                                        <p>الطرف الثاني: {{$order->customer->name_ar}} من غزة ويحمل بطاقة رقم
                                            ({{$order->customer->id_number}})
                                            (مدين).</p>

                                        <p>الكفيل: {{$order->guarantor->name_ar}} من غزة ويحمل رقم الهوية
                                            ({{$order->guarantor->id_number}}) .</p>
                                        <p class="tile-content"><u> مقدمة السند </u></p>
                                        {{-- ------------------------------------ --}}
                                        {{-- ------------------------------------ --}}
                                        {{-- ------------------------------------ --}}
                                        {{-- ------------------------------------ --}}
                                        <p>
                                            بعد أن أقر الطرفان بأهليتهما القانونية الكاملة للتعاقد وإبرام التصرفات
                                            القانونية ، وبما أن الطرف
                                            صاحب محل يزن ستور لبيع الهواتف الذكية
                                            ، و حيث أن الطرف الثاني يرغب فى شراء هاتف محمول من نوع /
                                            {{$order->product->name_ar}} (
                                            اصدار رقم /
                                            {{$order->serial_number}} لون / الف)
                                            بالتقسيط ، وحيث ان ثمن الجوال هو مبلغ / ({{$order->product->price}} شيكل)
                                            وبالحروف / {{$letters_price}} شيكل
                                            فقط لا
                                            غير و حيث ان ذلك قد
                                            لاقى قبولا من قبل الطرف الأول ؛ بشرط ان يقوم الطرف الثاني بدفع مبلغ و قدره
                                            ({{$order->presenter}}) دفعة أولى وعلى
                                            أن
                                            يلتزم بدفع المبلغ
                                            المتبقي وقدره
                                            ({{$order->product->price-$order->presenter}}) وبالحروف / {{$letters_total}}
                                            شيكل على
                                            أقساط شهرية بواقع
                                            ({{$order->installment_month}})
                                            قسط ، قيمة القسط
                                            الواحد
                                            منها مبلغ وقدره
                                            ({{$order->installment_amount}})
                                            شيكل فقط لا غير وبالحروف {{$letters_amount}} شيكل فقط لا غير ، و على ان يكون
                                            موعد
                                            اول قسط منها بتاريخ
                                            {{$order->installment_date}} ؛ و ذلك بشكل

                                            دوري ومنتظم وحتى الوفاء التام ؛ لذلك جرى تحرير هذا السند على النحو التالي:
                                        </p>
                                        <p>
                                            1 - يعتبر مقدمة هذا السند جزء لا يتجزأ منه ومكمّلة له مفسّر له واليها الرجوع
                                            عند الاقتضاء أو اللزوم .
                                        </p>
                                        <p>
                                            2 - اتفق الطرفان على أن المذكورة على يلتزم الطرف الثاني بسداد كامل مبلغ
                                            المديونية 19 قسط و على ان تكون قيمة كل قسط منها
                                            مبلغ وقدره 300 شيكل فقط و بالحروف / ثلاثة مائة شيكل فقط لا غير ؛ على ان
                                            يستحق اول قسط بتاريخ 2023-06-27 و ذلك بشكل دورى
                                            وهكذا حتى الوفاء التام و على ان يكون اخرالقسط بتاريخ 2026-08-27 وفي في حال
                                            تخلفه عن سداد أي قسط تعتبر جميع الأقساط
                                            مستحقة ويجوز التنفيذ لاستيفائها كاملة .
                                        </p>
                                        <p>
                                            3 - تم الاتفاق و التراضى بين الطرفين على أن يجوز السند الراهن قوة السند
                                            التنفيذي وفي حالة تخلف الطرف الثاني عن سداد أي
                                            قسط تكون الاقساط كلها مستحقة الاداء ؛ و يحق للطرف الأول التوجه لدائرة
                                            التنفيذ لتحصيل دينه والرجوع على الطرف الثاني بكافة
                                            الأقساط المتيقسة .
                                        </p>
                                        <p>
                                            4 - اتفق الطرفان على عدم العدول أو النكول على ما جاء فى هذا السند من اتفاق و
                                            التعهد بتنفيذه حسب الاصول .
                                        </p>
                                        <p>
                                            على هذا تم الاتفاق والرضا والقبول بين الطرفين على كل ما ورد فى هذا السند من
                                            الشروط و يصدقان على صحته بتواقيعهما بايجاب
                                            والقبول والحرية والاختيار دون ضغط أو إكراه على أي منهم ، امام شهود الحال
                                            والله خير الساهدين .
                                        </p>
                                        {{-- <p>
                                            بعد أن أقر الطرفان بأهليتهما القانونية الكاملة للتعاقد وإبرام التصرفات
                                            القانونية ، وبما أن الطرف
                                            صاحب محل يزن ستور لبيع الهواتف الذكية
                                        </p>
                                        <p>
                                            ، و حيث أن الطرف الثاني يرغب فى شراء هاتف محمول من نوع /
                                            {{$order->product->name_ar}} (
                                            اصدار رقم /
                                            {{$order->product->serial_number}} لون / الف)
                                        </p>
                                        <p>
                                            بالتقسيط ، وحيث ان ثمن الجوال هو مبلغ / ({{$order->product->price}} شيكل)
                                            وبالحروف / {{$letters_price}} شيكل
                                            فقط لا
                                            غير و حيث ان ذلك قد
                                        </p>
                                        <p>
                                            لاقى قبولا من قبل الطرف الأول ؛ بشرط ان يقوم الطرف الثاني بدفع مبلغ و قدره
                                            ({{$order->presenter}}) دفعة أولى وعلى
                                            أن
                                            يلتزم بدفع المبلغ
                                            المتبقي وقدره
                                        </p>
                                        <p>
                                            ({{$order->product->price-$order->presenter}}) وبالحروف / {{$letters_total}}
                                            شيكل على
                                            أقساط شهرية بواقع
                                            ({{$order->installment_month}})
                                            قسط ، قيمة القسط
                                            الواحد
                                            منها مبلغ وقدره
                                            ({{$order->installment_amount}})
                                        </p>
                                        <p>
                                            شيكل فقط لا غير وبالحروف {{$letters_amount}} شيكل فقط لا غير ، و على ان يكون
                                            موعد
                                            اول قسط منها بتاريخ
                                            {{$order->installment_date}} ؛ و ذلك بشكل
                                        </p>
                                        <p>
                                            دوري ومنتظم وحتى الوفاء التام ؛ لذلك جرى تحرير هذا السند على النحو التالي:
                                        </p>
                                        --}}

                                        {{-- <p>
                                            1- مقدمة مقدمة هذا السند جزء لا يتجزأ منه ومكمّلة له مفسّر له واليها الرجوع
                                            عند الاقتضاء أو
                                            اللزوم.
                                        </p>
                                        <p>
                                            2 - اتفق الطرفان على أن يلتزم الطرف الثاني بسداد كامل مبلغ المديونية
                                            المذكورة على ({{$order->installment_month}}) قسطاً ، وأن
                                            تكون قيمة كل قسط منها
                                            مبلغ
                                        </p>
                                        <p>
                                            و قدره ({{$order->installment_amount}}) شيكل فقط لا غير ، وبالأحرف
                                            {{$letters_amount}} شيكلًا فقط
                                            لا غير ،
                                            على أن يستحق اول قسط
                                            بتاريخ {{$order->installment_date}} ،
                                        </p>
                                        <p>وذلك بشكل دوري ومنتظم وهكذا حتى الوفاء التام و على أن يكون اخرالقسط بتاريخ
                                            {{$LastDate}} ، وفي في حال
                                            تخلفه عن سداد أي</p>
                                        <p>
                                            قسط تعتبر جميع الأقساط مستحقة ويجوز التنفيذ لاستيفائها كاملة .
                                        </p>
                                        <p>
                                            3 - تم الاتفاق و التراضى بين الطرفين على أن يجوز السند الراهن قوة السند
                                            التنفيذي وفي حالة تخلف
                                            الطرف
                                            الثاني عن سداد أي
                                            قسط تكون
                                        </p>
                                        <p>الأقساط كلها مستحقة السداد؛ يحق للطرف الأول التوجه لدائرة التنفيذ لتحصيل دينه
                                            والرجوع على الطرف
                                            الثاني بكافة الأقساط
                                            المتيقسة .</p> --}}
                                        {{-- <p>4 - اتفق الطرفان على عدم العدول أو النكول على ما جاء فى هذا السند من
                                            اتفاق و
                                            التعهد بتنفيذه حسب
                                            الاصول .</p>
                                        <p>
                                            على هذا تم الاتفاق والرضا والقبول بين الطرفين على كل ما ورد فى هذا السند من
                                            الشروط و يصدقان على
                                            صحته
                                            بتواقيعهما بايجاب
                                            والقبول والحرية والاختيار دون ضغط أو إكراه على أي منهم ، امام شهود الحال
                                            والله خير الساهدين .
                                        </p> --}}

                                        <center>
                                            <div class="row" id="footer">
                                                <div class="col-sm-4">الطرف الاول (الدائن)</div>
                                                <div class="col-sm-4">الطرف الثانى (المدين)</div>
                                                <div class="col-sm-4" id="guarantor_contract">الكفيل</div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::contract-->

                <!--begin::contract-->
                {{-- <div class="card card-flush py-4">
                    <div class="card-header border-0 pt-6">

                        <div class="card-title">
                            <h2>Draft</h2>
                        </div>

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <!--begin::Add customer-->
                                <a href="{{route('monthyinstallment.printDraft',$order->contract->id)}}"
                                    class="btn btn-primary">{{__('site.print')}}</a>
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->

                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-10">
                            <!--begin::Separator-->
                            <div class="separator"></div>
                            <!--end::Separator-->
                            <!--begin::Table-->
                            <div class="page_draft" id="page_draft">

                                <div class="content">
                                    <p class="title">كمبيالة و الدفع بها</p><br>
                                    <div id="draft_id" class="card-header border-0 pt-6">

                                        <div class="card-title">
                                            <h2>الرقم : ({{$order->contract->getContractId()}})</h2>
                                        </div>

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end"
                                                data-kt-customer-table-toolbar="base">
                                                <!--begin::Add customer-->
                                                <div>
                                                    <p class="theprice">المبلغ</p>
                                                    <div class="price_all">
                                                        {{$order->product->price}} <span>&#8362;</span>
                                                    </div>

                                                </div>

                                                <!--end::Add customer-->
                                            </div>
                                            <!--end::Toolbar-->
                                            <!--begin::Group actions-->

                                            <!--end::Group actions-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <div class="draft">
                                        <p class="get_draft"><b>تستحق فى :</b> ({{$LastDate}})</p>
                                        <p class="owner_id">

                                            <b> هوية رقم :</b> ({{$order->customer->id_number}})
                                        </p>
                                        <p class="owner_draft"><b>انا المقر :</b> {{$order->customer->name}}</p>

                                        <p style="font-size: 18px;">
                                            <b> أتعهد و التزم بموجب هذه الكمبيالة ان ادفع الى /</b> اليزن اشرف احمد
                                            اليازوري
                                        </p>
                                        <p style="font-size: 18px;">
                                            <b>المبلغ المرقوم أعلاه و قدره :</b> {{$letters_price}} <b>فقط لاغير</b>
                                        </p>
                                        <p style="font-size: 18px;">
                                            <b> و هذا عن :</b> ({{$order->product->name}})
                                        </p>

                                        <center>
                                            <div class="row" id="footer">
                                                <div class="col-sm-3"><b>الطرف الاول (الدائن)</b></div>
                                                <div class="col-sm-3"><b>الطرف الثانى (المدين)</b></div>
                                                <div class="col-sm-3"><b>الكفيل</b></div>
                                                <div class="col-sm-3"><b>الكفيل</b></div>
                                            </div>
                                        </center>

                                        <p class="date">
                                            التاريخ : {{date("Y/m/d")}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card header-->
                </div> --}}
                <!--end::contract-->

                {{-- <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="../../demo1/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_edit_order_cancel"
                        class="btn btn-light me-5">Cancel</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="button" onclick="store()" class="btn btn-primary">
                        <span class="indicator-label">{{__('site.submit')}}</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div> --}}
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
    function store() {
        axios.post('/order', {
            installment_method : document.getElementById('installment_method').value,
            installment_month : document.getElementById('installment_month').value,
            installment_amount : document.getElementById('installment_amount').value,
            presenter : document.getElementById('presenter').value,
            branch_id : document.getElementById('branch_id').value,
            product_id : document.getElementById('product_id').value,
            customer_id : document.getElementById('customer_id').value,
            guarantor_id : document.getElementById('guarantor_id').value,
        })
        .then(function (response) {
            window.location.href = '/order';
            toastr.success(response.data.message);

        }).catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message)
        });
    }//end store order

    function printContent(){
        var getFullContent = document.body.innerHTML;
        var printsection = document.getElementById('page').innerHTML;
        document.body.innerHTML = printsection;
        window.print();
        document.body.innerHTML = getFullContent;
    }// print contract

    function printDraft(){
        var getFullContent = document.body.innerHTML;
        var printsection = document.getElementById('page_draft').innerHTML;
        document.body.innerHTML = printsection;
        window.print();
        document.body.innerHTML = getFullContent;
    }// print draft

    function changecontract(){
        var e = document.getElementById("sponsor");
        var value = e.value;
        console.log(value);
        if(value == 0){
            document.getElementById("guarantor_contract").style.display = 'block';
        }else{
            document.getElementById("guarantor_contract").style.display = 'none';
        }
    }
</script>
@endsection