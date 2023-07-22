<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdf</title>
    <style>
        table {
            font-size: 10px;
            width: 100%;
            table-layout: fixed;
        }

        td {
            text-align: center;
            padding: 10px;
        }

        .img_td {
            padding-left: 100px;
            padding-right: 143px;
        }

        .title {
            text-align: center;
        }

        .contractid {
            text-align: right;
            font-size: 8px;
        }
    </style>
</head>

<body>
    <p class="contractid">{{$order->contract->getContractId()}}</p>

    <table>
        <tr>
            <td>Smartphones For Store Yazan</td>
            <td> <img src="images/logo-contract.png" height="50px"></td>
            <td>يزن ستور للهواتف الذكية</td>
        </tr>
    </table>

    <hr>
    <p class="title">اتفاق على بيع جوال تقسيط</p>

    <p style="text-align: right;line-height: 1.9;font-size:12px;">
        انه وفي يوم {{ $ar_day }} الموافق {{ date("Y/m/d") }} م جرى تحرير هذا العقد بعد الاتفاق و التراضي بين كل من :-
        <br>

        الطرف الاول : {{$order->branch->branch_name_ar}} و يمثله السيد / {{$order->branch->name_ar}} ، من غزة و يحمل
        الهوية رقم
        / {{$order->branch->id_number}} (دائن) .
        <br>

        الطرف الثاني : {{ $order->customer->name_ar }} ، من غزة ، و يحمل هوية رقم / {{$order->customer->id_number }}
        (مدين) .
        <br>

        @if ($order->installment->id == 2 ||
        $order->installment->id == 4)
        الكفيل: {{ $order->guarantor->name_ar }} ، من غزة ، و يحمل هوية رقم / {{ $order->guarantor->id_number }} (كفيل)
        . @endif

    </p>

    <p class="title">مقدمة السند</p>

    <p style="text-align: right;line-height: 1.8;font-size:12.5px;">
        بعد أن أقر الطرفان بأهليتهما القانونية الكاملة للتعاقد و إبرام التصرفات القانونية و حيث أن الطرف الاول صاحب محل
        يزن ستور
        لبيع الهواتف الذكية ، و حيث أن الطرف الثاني يرغب فى شراء جوال من نوع / {{ $order->product->name_ar }} اصدار رقم
        / {{
        $order->serial_number }} بالتقسيط ، وحيث ان ثمن الجوال هو مبلغ و قدره / ({{ $order->product->price }}) شيكل و
        بالحروف /
        {{ $letters_price }} شيكل فقط لا غير و حيث ان ذلك قد لاقى قبولا من قبل الطرف الأول ؛ بشرط ان يقوم الطرف الثاني
        بدفع مبلغ
        و قدره ({{ $order->presenter }}) شيكل و بالحروف / {{$letters_presenter}} شيكل دفعة اولى و على ان يلتزم بسداد
        باقى المبلغ
        و قدره ({{ $order->product->price - $order->presenter }}) و بالحروف / {{ $letters_total}} شيكل على اقساط شهرية
        بواقع ({{
        $order->installment_month }}) قسط ، قيمة القسط الواحد منها مبلغ وقدره ({{ $order->installment_amount }}) شيكل
        فقط و
        بالحروف {{ $letters_amount }} شيكل فقط لا غير ، و على ان يكون اول قسط منها بتاريخ {{
        Carbon\Carbon::parse($order->installment_date)->format('Y/m/d') }} ؛ و ذلك بشكل دوري ومنتظم وحتى الوفاء التام ؛
        لذلك جرى
        تحرير هذا السند على النحو التالي :-

    </p>

    <p style="text-align: right;font-size:12.5px;">
        1- تعتبر مقدمة هذا السند جزء لا يتجزأ منه ومكمّلة و مفسّر له واليها الرجوع عند الاقتضاء أو اللزوم .
    </p>
    <p style="text-align: right;font-size:12.5px;">
        2- اتفق الطرفان على أن يلتزم الطرف الثاني بسداد كامل مبلغ المديونية المذكورة على ({{
        $order->installment_month
        }}) قسط و على ان تكون قيمة كل قسط منها مبلغ وقدره ({{ $order->installment_amount }}) شيكل فقط و بالحروف /
        {{
        $letters_amount }} شيكل فقط لا غير ؛ على ان يستحق اول قسط بتاريخ
        {{Carbon\Carbon::parse($order->installment_date)->format('Y/m/d')}} ، و ذلك
        بشكل
        دورى
        و منتظم وهكذا حتى الوفاء التام و على ان يكون اخر قسط منها بتاريخ {{ $LastDate }} ، وفي حال تخلفه عن سداد
        أي
        قسط
        تعتبر جميع الأقساط مستحقة ويجوز التنفيذ لاستيفائها كاملة .
    </p>
    <p style="text-align: right;font-size:12.5px;">
        3- تم الاتفاق و التراضى بين الطرفين على أن يجوز السند الراهن قوة السند التنفيذي وفي حالة تخلف الطرف الثاني
        عن
        سداد
        أي قسط تكون الاقساط كلها مستحقة الاداء ؛ و يحق للطرف الأول التوجه لدائرة التنفيذ لتحصيل دينه والرجوع على
        الطرف
        الثاني بكافة الأقساط المتيقسة .
    </p>

    <p style="text-align: right;font-size:12.5px;">
        4 - اتفق الطرفان على عدم العدول أو النكول على ما جاء فى هذا السند من اتفاق و التعهد بتنفيذه حسب الاصول .
    </p>
    <p style="text-align: right;font-size:12.5px;">
        على هذا تم الاتفاق والرضا والقبول بين الطرفين على كل ما ورد فى هذا السند من الشروط و يصدقان على صحته
        بتواقيعهما
        بايجاب والقبول والحرية والاختيار دون ضغط أو إكراه على أي منهم ، امام شهود الحال
        و الله خير الشاهدين .
    </p>
    <p></p>

    <table>
        <tr>
            @if ($order->installment->id == 2 ||
            $order->installment->id == 4)
            <td>الكفيل</td>
            @endif
            <td>الطرف الثانى (المدين)</td>
            <td>الطرف الاول (الدائن)</td>
        </tr>
    </table>
</body>

</html>