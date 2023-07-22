<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .page {
            background-color: #eeeaea;
            /* size: 50mm 150mm;
            margin: 27mm 16mm 27mm 16mm; */
        }

        .header {
            overflow: hidden;
            /* background-color: #f1f1f1; */
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

        /* .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        } */

        .header-right {
            float: left;
        }

        .header img {
            margin: -17px 0px -20px 304px;
        }

        hr {
            margin: 0px 30px;
            /* border: 5px solid black; */
        }

        .title {
            text-align: center;
            font-size: 22px;
            font-weight: 400;
        }

        .contract {
            direction: rtl;
            padding: 0px 15px;
            /* float: right; */
            font-size: 12px;
        }

        .tile-content {
            text-align: center;
        }

        #footer {
            padding: 66px 0px;
        }
    </style>
</head>

<body>
    <input type="button" value="click" onclick="printContent()">
    <div class="page" id="page">
        {{-- <center>
            <div class="row">

                <div class="col-sm-4">Smartphones For Store Yazan</div>
                <div class="col-sm-4"><img src="{{asset('images/logo-contract.png')}}" alt=""></div>
                <div class="col-sm-4">یزن ستور للھواتف الذكیة</div>
            </div>
        </center>
        <hr><br> --}}
        <div class="content">
            <p class="title">كمبيالة و الدفع بها</p><br>

            <div class="contract">
                <p>انه وفى يوم _________ الموافق _________ م جرى تحرير هذا العقد بعد الاتفاق و التراضي بين كل من</p>
                <p>
                    الطرف الاول : محل يزن ستور لبيع الهواتف الذكية و يمثله السيد / اليزن اشرف احمد اليازوري ، من غزة
                    و

                </p>
                <p>يحمل الهوية رقم / (40611477) دائن</p>
                <p>الطرف الثاني: محمد أحمد عبد الرحمن السوري من غزة ويحمل بطاقة رقم (409519816) (مدين).</p>
                <p>الكفيل: وسيم خالد عبدالله أبو حرب من غزة ويحمل رقم الهوية (800805798) .</p>
                <p class="tile-content">مقدمة السند</p>
                <p>
                    بعد أن أقر الطرفان بأهليتهما القانونية الكاملة للتعاقد وإبرام التصرفات القانونية ، وبما أن الطرف
                    صاحب محل يزن ستور لبيع الهواتف الذكية
                </p>
                <p>
                    ، و حيث أن الطرف الثاني يرغب فى شراء هاتف محمول من نوع / iPhone 14 Pro ( اصدار رقم /
                    351643939779403 لون / الف)
                </p>
                <p>
                    بالتقسيط ، وحيث ان ثمن الجوال هو مبلغ / (7720 شيكل) وبالحروف / سبعة الاف وسبعمائة وعشرون شيكل
                    فقط لا
                    غير و حيث ان ذلك قد
                </p>
                <p>
                    لاقى قبولا من قبل الطرف الأول ؛ بشرط ان يقوم الطرف الثاني بدفع مبلغ و قدره (2000) دفعة أولى وعلى
                    أن
                    يلتزم بدفع المبلغ
                    المتبقي وقدره
                </p>
                <p>
                    (5720) وبالحروف / خمسة آلاف وسبعمائة وعشرون شيكل على أقساط شهرية بواقع (11) قسط ، قيمة القسط
                    الواحد
                    منها مبلغ وقدره
                    (520)
                </p>
                <p>
                    شيكل فقط لا غير وبالحروف خمسمائة وعشرون شيكل فقط لا غير ، و على ان يكون موعد اول قسط منها بتاريخ
                    28/2/2023 ؛ و ذلك بشكل
                </p>
                <p>
                    دوري ومنتظم وحتى الوفاء التام ؛ لذلك جرى تحرير هذا السند على النحو التالي:
                </p>
                <p>
                    1- مقدمة مقدمة هذا السند جزء لا يتجزأ منه ومكمّلة له مفسّر له واليها الرجوع عند الاقتضاء أو
                    اللزوم.
                </p>
                <p>
                    2 - اتفق الطرفان على أن يلتزم الطرف الثاني بسداد كامل مبلغ المديونية المذكورة على (11) قسطاً ، وأن
                    تكون قيمة كل قسط منها
                    مبلغ
                </p>
                <p>
                    و قدره (520) شيكل فقط لا غير ، وبالأحرف خمسمائة و عشرين شيكلًا فقط لا غير ، على أن يستحق اول قسط
                    بتاريخ 28/2/2023 ،
                </p>
                <p>وذلك بشكل دوري ومنتظم وهكذا حتى الوفاء التام و على أن يكون اخرالقسط بتاريخ 12/28/2024 ، وفي في حال
                    تخلفه عن سداد أي</p>
                <p>
                    قسط تعتبر جميع الأقساط مستحقة ويجوز التنفيذ لاستيفائها كاملة .
                </p>
                <p>
                    3 - تم الاتفاق و التراضى بين الطرفين على أن يجوز السند الراهن قوة السند التنفيذي وفي حالة تخلف
                    الطرف
                    الثاني عن سداد أي
                    قسط تكون
                </p>
                <p>الأقساط كلها مستحقة السداد؛ يحق للطرف الأول التوجه لدائرة التنفيذ لتحصيل دينه والرجوع على الطرف
                    الثاني بكافة الأقساط
                    المتيقسة .</p>
                <p>4 - اتفق الطرفان على عدم العدول أو النكول على ما جاء فى هذا السند من اتفاق و التعهد بتنفيذه حسب
                    الاصول .</p>
                <p>
                    على هذا تم الاتفاق والرضا والقبول بين الطرفين على كل ما ورد فى هذا السند من الشروط و يصدقان على
                    صحته
                    بتواقيعهما بايجاب
                    والقبول والحرية والاختيار دون ضغط أو إكراه على أي منهم ، امام شهود الحال والله خير الساهدين .
                </p>

                <center>
                    <div class="row" id="footer">
                        <div class="col-sm-4">الطرف الاول (الدائن)</div>
                        <div class="col-sm-4">الطرف الثانى (المدين)</div>
                        <div class="col-sm-4">الكفيل</div>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">

    </script>
    <script>
        function printContent(){
            var getFullContent = document.body.innerHTML;
            var printsection = document.getElementById('page').innerHTML;
            document.body.innerHTML = printsection;
            window.print();
            document.body.innerHTML = getFullContent;
            // var printContent = document.getElementById('page').innerHTML;
            // var originalContent = document.body.innerHTML;
            // document.body.innerHTML = printContent;
            // window.print();
            // document.body.innerHTML = originalContent;
            // window.print('.page');
            // var prtContent = document.getElementById("page");
            // var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            // WinPrint.document.write(prtContent.innerHTML);
            // WinPrint.document.close();
            // WinPrint.focus();
            // WinPrint.print();
            // WinPrint.close();
        }
    </script>

</body>

</html>
