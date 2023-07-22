<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdf</title>
    <style>
        body {
            /* font-family: DejaVu Sans, sans-serif; */
        }

        table {
            /* margin: -10px 0px 0px 0px !important; */
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
    </style>
</head>

<body>
    <h2 class="title">بسم الله الرحمن الرحيم</h2>
    <h1 class="title"><u>اتفاقية توريد اجهزة</u></h1>
    <p style="text-align: right;font-size:14px;">
        الطرف الاول / {{$order->customer->name_ar}} .
    </p>

    <p style="text-align: right;font-size:14px;">
        الطرف الثانى / {{$order->branch->name_ar}} . </p>
    <p style="text-align: right;line-height: 1.8;font-size:14px;">
        اتفق الطرفان على ان يقوم الفريق الثانى بتوريد اجهزة جوال لموظفى الطرف الاول على ضمانة و كفالة الطرف الاول
        وحسب الاتفاق على الاقساط الشهرية بين كل من الطرفين حيث سيتم توريدالاقساط الشهرية من قبل الطرف الاول للطرف الثانى
        حسب الاتفاق بين الطرفين اما نقدا او شيك فورى او حوالة على حساب الطرف الثانى .
    </p>

    <p style="text-align: right;font-size:14px;">
        تفاصيل الاجهزة المطلوبة للتوريد :
    </p>

    <p style="text-align: right;font-size:14px;">

        جهاز {{$order->product->name_ar}} بمبلغ اجمالى {{$order->product->price}} بقسط شهرى
        {{$order->installment_amount}}
        تاريخ
        الاقساط من {{Carbon\Carbon::parse($order->installment_date)->format('Y/m/d')}} الى {{$LastDate}}.
    </p>
    {{-- <u></u> --}}
    {{-- <p style="text-align: right;font-size:12px;">
        جهاز ____________ بمبلغ اجمالى ___________ بقسط شهرى ___________ تاريخ الاقساط من __________ الى __________ .
    </p>
    <p style="text-align: right;font-size:12px;">
        جهاز ____________ بمبلغ اجمالى ___________ بقسط شهرى ___________ تاريخ الاقساط من __________ الى __________ .
    </p>
    <p style="text-align: right;font-size:12px;">
        جهاز ____________ بمبلغ اجمالى ___________ بقسط شهرى ___________ تاريخ الاقساط من __________ الى __________ .
    </p>
    <p style="text-align: right;font-size:12px;">
        جهاز ____________ بمبلغ اجمالى ___________ بقسط شهرى ___________ تاريخ الاقساط من __________ الى __________ .
    </p>
    <p style="text-align: right;font-size:12px;">
        جهاز ____________ بمبلغ اجمالى ___________ بقسط شهرى ___________ تاريخ الاقساط من __________ الى __________ .
    </p> --}}

    <p style="text-align: right;font-size:14px;">
        و بناءا على ما ذكر اعلاه تم الاتفاق برضى الطرفين .

    </p><br>

    <p style="text-align: center;font-size:14px;">
        و تفضلو بقبول فائق الاحترام و التقدير .

    </p><br><br><br>

    <table style="font-size:14px;">
        <tr>
            <td>
                الطرف الثانى / {{$order->branch->name_ar}} .

            </td>
            <td></td>
            <td></td>
            <td>
                الطرف الاول / {{$order->customer->name_ar}} .
            </td>
        </tr>
    </table>

</body>

</html>