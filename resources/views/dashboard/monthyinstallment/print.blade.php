<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            border: 60px;
        }

        table {
            width: 60%;
        }

        .vl {
            border-left: 3px solid black;
            height: 99px;
            margin: -105px 0px 31px 389px;
        }

        table {
            width: 100%;

        }

        table .top-align {


            vertical-align: top;
        }

        .part {
            font-size: 12px;
            text-align: right;
            padding: 0px 15px;
        }

        .special-row {
            font-size: 12px;
            padding: 0px 10px;
            border-left: 1px solid black;
        }



        /* .table2 {
            border: 1px solid;
        } */

        .tr1 {

            height: 70px;
            text-align: right;
            font-size: 22px;
            font-weight: bold;
        }

        .tr2 {
            text-align: right;
            height: 30px;
        }

        .tr3 {
            text-align: right;
            border: 1px solid;
            height: 30px;
        }

        .table_price {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div>
        <p style="float: right">{{$ar->utf8Glyphs('سند قبض')}}</p>
        <img src="images/logo-contract.png">

    </div><br><br><br>
    {{-- <h3>{{$ar->utf8Glyphs($monthyInstallment->customer->name_ar)}}</h3> --}}
    <table>
        <tr class="top-align">
            <td class="part">

                <p>{{$ar->utf8Glyphs('يزن ستور')}}</p>
                <p>{{$ar->utf8Glyphs('غزة, شارع الوحدة, مقابل مطعم بلميرا')}}</p>
                <p>{{$ar->utf8Glyphs('هاتف : 0599456788')}}</p>
            </td>
            <td class="special-row">
                <p>{{$ar->utf8Glyphs('التاريخ')}}</p>
                <p>{{$date}}</p>

            </td>
            <td style="width: 330px"></td>
            <td style="font-size: 14px;">
                <p>{{$ar->utf8Glyphs($monthyInstallment->customer->name_ar)}}</p>
            </td>



        </tr>
    </table><br><br>

    <table class="table_price">
        <tr class="tr1" style="border: 1px solid;border: 1px solid black;border-collapse: collapse;">
            <td style="font-size: 18px;border: 1px solid black;border-collapse: collapse;">
                {{$ar->utf8Glyphs('الإجمالي')}}</td>
            <td style="width: 80%;font-size: 18px;border: 1px solid black;border-collapse: collapse;">
                {{$ar->utf8Glyphs('البيان')}}</td>
        </tr>
        <tr class="tr2">
            <td style="border: 1px solid black;border-collapse: collapse;">
                <p style="padding:0px 15px;">
                    &#8362;{{$monthyInstallment->price}}
                </p>
            </td>

            <td>
                <p style="padding:0px 20px;"> {{$ar->utf8Glyphs($monthyInstallment->customer->name_ar)}}</p>
            </td>

        </tr>
        <tr class="tr3">

            <td style="border: 1px solid black;border-collapse: collapse;">
                <p style="padding:0px 15px;">
                    &#8362;{{$monthyInstallment->price}}
                </p>
            </td>

            <td>
                <p style="padding:0px 20px;">{{$ar->utf8Glyphs('الإجمالي')}}</p>
            </td>

        </tr>
    </table>

</body>


</html>