<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check pdf</title>
    <style>
        .table_3 {
            text-align: right;
            border: 1px solid black;
            width: 100%;
            border-collapse: collapse;
        }

        .th_table_3 {
            border: 1px solid black;
            font-size: 16px;
            text-align: center;
            height: 40px;
        }

        .td_table_3 {
            border: 1px solid black;
            height: 20px;
            text-align: center;

        }

        .td_table_4 {
            height: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <table>
        <tr>

            <td>
                <div><img src="images/logo-contract.png" height="70px"></div>
            </td>
            <td></td>
            <td style="text-align: right;">
                <p>info@gmail.com <br>
                    +972-59-3420111<br>
                    غزة-شارع الوحدة-مفترق بالميرا-عمارة نيرو.</p>

            </td>
        </tr>
    </table>
    <br>
    <hr><br><br>
    <table>
        <tr>

            <td style="font-size:22px">

                سند قبض

            </td>
            <td></td>
            <td style="text-align: right;font-size:12px">
                التاريخ : {{$currentDate}} <br>
                وصلنى من السيد : {{$order->customer->name_ar}} <br>

            </td>
        </tr>
    </table><br><br>
    <table class="table_3">
        <tr>
            <th class="th_table_3">العملة</th>
            <th class="th_table_3">على البنك</th>
            <th class="th_table_3">مبلغ الشيك</th>
            <th class="th_table_3">تاريخ الشيك</th>
            <th class="th_table_3">رقم الشيك</th>

        </tr>

        @foreach ($check as $item)
        <tr>
            <td class="td_table_3">{{$item->currency}}</td>
            <td class="td_table_3">{{$item->price}}</td>
            <td class="td_table_3">{{$item->bank}}</td>
            <td class="td_table_3">{{$item->check_date}}</td>
            <td class="td_table_3">{{$item->check_number}}</td>
        </tr>
        @endforeach


    </table><br><br>
    <table>
        <tr>
            <td class="td_table_4">
                توقيع المستلم
            </td>
            <td class="td_table_4"></td>
            <td class="td_table_4">
                توقيع المسلم
            </td>
        </tr>
    </table>
    {{--
    <p style="text-align: right;line-height: 1.9;font-size:12px;">
        انه وفى يوم {{ $ar_day }} الموافق {{ date("Y/m/d") }} م جرى تحرير هذا العقد بعد الاتفاق و التراضي بين كل من :-
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


        بعد أن أقر الطرفان بأهليتهما القانونية الكاملة للتعاقد و إبرام التصرفات القانونية و حيث أن الطرف صاحب محل يزن
        ستور لبيع
        الهواتف الذكية ، و حيث أن الطرف الثاني يرغب فى شراء جوال من نوع / {{ $order->product->name_ar }} اصدار رقم / {{
        $order->serial_number }} بالتقسيط ، وحيث ان ثمن الجوال هو مبلغ و قدره / ({{ $order->product->price }}) شيكل و
        بالحروف /
        {{ $letters_price }} شيكل فقط لا غير و حيث ان ذلك قد لاقى قبولا من قبل الطرف الأول ؛ بشرط ان يقوم الطرف الثاني
        بدفع مبلغ
        و قدره ({{ $order->presenter }}) و بالحروف / {{$letters_presenter}} دفعة اولى و على ان يلتزم بسداد باقى المبلغ و
        قدره
        ({{ $order->product->price - $order->presenter }}) و بالحروف / {{ $letters_total}} شيكل على اقساط شهرية بواقع
        ({{
        $order->installment_month }}) قسط ، قيمة القسط الواحد منها مبلغ وقدره ({{ $order->installment_amount }}) شيكل
        فقط و
        بالحروف {{ $letters_amount }} شيكل فقط لا غير ، و على ان يكون اول قسط منها بتاريخ {{
        Carbon\Carbon::parse($order->installment_date)->format('Y/m/d') }}
        ؛ و ذلك
        بشكل دوري ومنتظم وحتى الوفاء التام ؛ لذلك جرى تحرير هذا السند على النحو التالي :-


    </p>

    <p style="text-align: right;font-size:12.5px;">
        1- تعتبر مقدمة هذا السند جزء لا يتجزأ منه ومكمّلة و مفسّر له واليها الرجوع عند الاقتضاء أو اللزوم .
    </p>
    <p style="text-align: right;font-size:12.5px;">
        2- اتفق الطرفان على أن يلتزم الطرف الثاني بسداد كامل مبلغ المديونية المذكورة على ( {{
        $order->installment_month
        }}
        ) قسط و على ان تكون قيمة كل قسط منها مبلغ وقدره ( {{ $order->installment_amount }} ) شيكل فقط و بالحروف /
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
    </table> --}}
</body>

</html>