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
        }

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
            font-weight: 400;
            font-size: 24px;
        }

        .contract {
            direction: rtl;
            padding: 0px 15px;
            font-size: 12px;
        }

        .draft {
            direction: rtl;
            padding: 0px 35px;
            font-size: 12px;
        }

        .tile-content {
            text-align: center;
        }

        #footer {
            /* padding: 66px 0px; */
            /* font-size: 18px; */

        }

        .column {
            display: inline-block;
            box-sizing: border-box;
            padding: 32px;
            font-size: 16px;
        }

        #draft_id {
            margin: -19px 0px 14px 0px;
            direction: rtl;
        }

        .get_draft {
            font-size: 16px;
            font-weight: 400;
        }

        .owner_id {
            font-size: 18px;
            float: left;
            padding: 0px 0px 0px 10px;
            font-weight: 400;
        }

        .draft_name {
            font-size: 14px;
            font-weight: 400;
        }

        .draft_letter_price {
            font-size: 14px;
            font-weight: 400;
        }

        .draft_product_name {
            font-size: 14px;
            font-weight: 400;
        }

        .owner_draft {
            font-size: 18px;
        }

        .line {
            /* width: 50px; */
            margin-left: 320px;
            margin-right: 75px;
            /* padding: 15px; */
            border: 1px solid;
        }

        .line_two {
            border: 1px solid;
            margin-right: 275px;
            margin-left: 150px;
        }

        .line_three {
            border: 1px solid;
            margin-right: 150px;
            margin-left: 300px;
        }

        .line_four {
            border: 1px solid;
            margin-right: 60px;
            margin-left: 400px;
        }

        .line_five {
            border: 1px solid;
            margin-right: 490px;
            /* margin-left: 60px; */
            /* margin: 0px 0px 0px 90px; */
        }

        .page_draft {
            padding: 5px;
            border-style: solid;
            border-width: 2px;
        }

        .date {
            font-size: 12px;
            float: left;
            margin: -17px 0px 0px 0px;
        }

        .contractid {
            margin: 0px 0px 14px 712px;
            font-size: 11px;
        }

        .theprice {
            font-size: 16px;
            font-weight: 400;
        }

        /* .card-toolbar {
            display: inline-block;
            box-sizing: border-box;
            margin: 0px;
            font-size: 16px;
        } */

        .price_all {
            display: inline-block;
            box-sizing: border-box;
            font-size: 18px;
            font-weight: 400;
            padding-right: 28px;
            /* margin-right: 5px; */
        }

        .input_price {
            border: 1px solid;
            padding: 1px 36px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 400;

        }

        .card-price-number {
            float: left;
            padding: 0px 0px 0px 110px;

        }
    </style>
</head>

<body>
    @foreach ($monthyInstallment as $monthyInstallment)
        <div class="page_draft" id="page_draft">

            <div class="content">
                <p class="title">{{ $ar->utf8Glyphs('كمــــــبيــــــالة و الـــــــــدفع بـــــــها') }}</p><br>
                <div id="draft_id" class="card-header border-0 pt-6">

                    <div class="card-price-number">

                        {{-- <div class="price_all">
                        <input type="text">

                    </div> --}}
                        <div class="price_all">{{ $ar->utf8Glyphs('المـبلـغ') }}</div>
                        <div class="input_price"> <span>&#8362;</span>
                            {{ $monthyInstallment->price }}</div>
                    </div>

                    <div class="card-title">
                        ({{ $monthyInstallment->id }})
                        {{ $ar->utf8Glyphs('الرقم :') }}
                    </div>

                </div>
                <div class="draft">

                    <p class="get_draft">
                        ({{ date('Y-m-d', strtotime($monthyInstallment->pay_date)) }}){{ $ar->utf8Glyphs('تستحق فى :') }}
                    </p>

                    <p class="owner_id">

                        {{ $monthyInstallment->contract->order->customer->id_number }}

                        {{ $ar->utf8Glyphs('هوية رقم :') }}


                    </p>

                    <p class="owner_draft">
                        {{ $ar->utf8Glyphs($monthyInstallment->contract->order->customer->name_ar) }}
                        &nbsp;
                        {{ $ar->utf8Glyphs('انا المقر :') }}
                    <div class="line"></div>
                    <div class="line_five"></div>
                    </p>
                    <br>
                    <p class="draft_name">
                        {{ $ar->utf8Glyphs('اليزن اشرف احمد اليازوري') }}

                        {{ $ar->utf8Glyphs('أتعهد و التزم بموجب هذه الكمبيالة ان ادفع الى/') }}
                    <div class="line_two"></div>
                    </p>
                    <p class="draft_letter_price">

                        <?php
                        $number = $monthyInstallment->price;
                        $formatter = new \NumberFormatter('ar', \NumberFormatter::SPELLOUT);
                        $letters_price = $formatter->format($number);
                        ?>

                        {{ $ar->utf8Glyphs('فقط لا غير') }}
                        {{ $ar->utf8Glyphs('شيكل') }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        {{ $ar->utf8Glyphs($letters_price) }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        {{ $ar->utf8Glyphs('المبلغ المرقوم أعلاه و قدره :') }}
                    <div class="line_three"></div>
                    </p>
                    <p class="draft_product_name">
                        {{ $ar->utf8Glyphs($monthyInstallment->contract->order->product->name_ar) }}
                        {{ $ar->utf8Glyphs('و هذا عن :') }}
                    <div class="line_four"></div>
                    </p>
                    <br><br>
                    <center>
                        <table style="width: 100%;">
                            <tr>

                                <td style="text-align: center;">{{ $ar->utf8Glyphs('شاهد') }}</td>

                                <td style="text-align: center;">{{ $ar->utf8Glyphs('توقيع المدين') }}</td>
                                @if (
                                    $monthyInstallment->contract->order->installment->id == 2 ||
                                        $monthyInstallment->contract->order->installment->id == 4)
                                    <td style="text-align: center;">{{ $ar->utf8Glyphs('توقيع الكفيل') }}</td>
                                @endif
                            </tr>
                        </table>
                        <br><br><br><br><br>
                    </center>
                    <p class="date">
                        {{ date('Y/m/d') }}
                        {{ $ar->utf8Glyphs('التاريخ :') }}
                    </p>
                </div>
            </div>
        </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @endforeach
</body>


</html>
