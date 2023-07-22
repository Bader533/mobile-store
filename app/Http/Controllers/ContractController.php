<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Contract;
use App\Models\MonthyInstallment;
use App\Models\Order;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use ArPHP\I18N\Arabic;
use Barryvdh\DomPDF\Facade\Pdf;
use TCPDF;

// use TCPDF;

class ContractController extends Controller
{
    // use \NumberFormatter;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('Read-Contracts')) {
            abort(403);
        } else {
            if (Auth::guard('customer')->check()) {
                $contracts = Contract::whereRelation('order', 'customer_id', auth()->user()->id)
                    ->orderBy('id', 'desc')->paginate(10);
            } else {
                $contracts = Contract::with('order')->paginate(10);
            }

            $logtrack =  Helper::logTracking('show all contracts table');
            return view('dashboard.contract.index', ['contracts' => $contracts]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (!Gate::allows('Create-Contract')) {
            abort(403);
        } else {

            $find = array(
                "Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"
            );
            $replace = array("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
            $ar_day_format = date('D'); // The Current Day
            $ar_day = str_replace($find, $replace, $ar_day_format);

            $order = Order::findOrFail($id);

            $monthyInstallment = $order->contract->monthyInstallment;
            $jsonData = json_encode($monthyInstallment);
            // dd($jsonData);
            //date to intallment
            $selectedDate = Carbon::parse($order->installment_date);
            $LastDate = $selectedDate->addMonths($order->installment_month)->format('Y-m-d');

            $number = $order->product->price;
            $formatter = new \NumberFormatter('ar', \NumberFormatter::SPELLOUT);
            $letters_price = $formatter->format($number);
            $total = $order->product->price - $order->presenter;
            $letters_total = $formatter->format($total);
            $letters_amount = $formatter->format($order->installment_amount);

            $logtrack =  Helper::logTracking('show contracts details');
            return view('dashboard.contract.create', [
                'order' => $order,
                'ar_day' => $ar_day,
                'letters_price' => $letters_price,
                'letters_total' => $letters_total,
                'letters_amount' => $letters_amount,
                'LastDate' => $LastDate,
                'json_data' => $jsonData,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('Create-Contract')) {
            abort(403);
        } else {
            $validator = Validator($request->all(), [
                'order_id' => 'required | numeric',
            ]);
            if (!$validator->fails()) {
                $contract = new Contract();
                $contract->order_id = $request->input('order_id');
                $isSaved = $contract->save();
                $this->storeInstallment($contract);

                $logtrack =  Helper::logTracking('store new contracts');

                return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (!Gate::allows('Show-invoice')) {
            abort(403);
        } else {
            $name = Contract::find($id);
            if (Auth::guard('customer')->check()) {

                $monthyInstallment = MonthyInstallment::with('contract')
                    ->whereHas('contract', function ($query) use ($id) {
                        return $query->where('id', $id);
                    })->where('customer_id', auth()->user()->id)->paginate(10);
            } else {
                $monthyInstallment = MonthyInstallment::with('contract')
                    ->whereHas('contract', function ($query) use ($id) {
                        return $query->where('id', $id);
                    })->paginate(10);
            }


            if ($monthyInstallment == null || $name == null) {
                return view('error-404');
            }
            $logtrack =  Helper::logTracking('show all installment');

            return view(
                'dashboard.contract.show',
                [
                    'monthyInstallment' => $monthyInstallment,
                    'name' => $name,

                ]
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }

    // advanced search on branchs
    public function search(Request $request)
    {
        if (!Gate::allows('Read-Contracts')) {
            abort(403);
        } else {

            $search = $request->get('search');
            $contracts = Contract::whereRelation('order', function ($query) use ($search) {
                $query->whereRelation('customer', function ($query) use ($search) {
                    $query->where('name_en', 'like', '%' . $search . '%');
                    $query->orWhere('name_ar', 'like', '%' . $search . '%');
                });
            })->get();
            return view('dashboard.contract.search', ['contracts' => $contracts]);
        }
    }

    // print contract
    public function print($id)
    {
        $order = Order::where('id', $id)->first();
        $find = array(
            "Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"
        );
        $replace = array("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
        $ar_day_format = date('D'); // The Current Day
        $ar_day = str_replace($find, $replace, $ar_day_format);
        $number = $order->product->price;
        $formatter = new \NumberFormatter('ar', \NumberFormatter::SPELLOUT);
        $letters_price = $formatter->format($number);
        $letters_presenter = $formatter->format($order->presenter);

        $total = $order->product->price - $order->presenter;
        $letters_total = $formatter->format($total);
        $letters_amount = $formatter->format($order->installment_amount);
        $selectedDate = Carbon::parse($order->installment_date);
        $LastDate = $selectedDate->addMonths($order->installment_month - 1)->format('Y/m/d');
        // dd($LastDate);
        // $LastDate = $selectedDate->addMonths($order->installment_month)->format('Y-m-d');
        // $textconttract = 'بعد أن أقر الطرفان بأهليتهما القانونية ، القانونية الكاملة للتعاقد و إبرام التصرفات و حيث أن الطرف صاحب محل يزن ستور لبيع الهواتف الذكية ، و حيث أن الطرف الثاني يرغب فى شراء جوال من نوع / ايفون ١٤ برو ماكس اصدار رقم / 222521892 لون / الوف بالتقسيط ، وحيث ان ثمن الجوال هو مبلغ و قدره / 6200 شيكل و بالحروف / ستة آلاف و مائتان شيكل فقط لا غير و حيث ان ذلك قد لاقى قبولا من قبل الطرف الأول ؛ بشرط ان يقوم الطرف الثاني بدفع مبلغ و قدره 500 دفعة اولى و على ان يلتزم بسداد باقى المبلغ و قدره 5700 و بالحروف / خمسة آلاف و سبعة مائة شيكل على اقساط شهرية بواقع 19 قسط ، قيمة القسط الواحد منها مبلغ وقدره 300 شيكل فقط و بالحروف ثلاثة مائة شيكل فقط لا غير ، و على ان يكون اول قسط منها بتاريخ 2023-06-27 ؛ و ذلك بشكل دوري ومنتظم وحتى الوفاء التام ؛ لذلك جرى تحرير هذا السند على النحو التالي : -١ يعتبر مقدمة هذا السند جزء لا يتجزأ منه ومكمّلة له مفسّر له واليها الرجوع عند الاقتضاء أو اللزوم . -٢ اتفق الطرفان على أن المذكورة على يلتزم الطرف الثاني بسداد كامل مبلغ المديونية 19 قسط و على ان تكون قيمة كل قسط منها مبلغ وقدره 300 شيكل فقط و بالحروف / ثلاثة مائة شيكل فقط لا غير ؛ على ان يستحق اول قسط بتاريخ 2023-06-27 و ذلك بشكل دورى وهكذا حتى الوفاء التام و على ان يكون اخرالقسط بتاريخ 2026-08-27 وفي في حال تخلفه عن سداد أي قسط تعتبر جميع الأقساط مستحقة ويجوز التنفيذ لاستيفائها كاملة . -٣ تم الاتفاق و التراضى بين الطرفين على أن يجوز السند الراهن قوة السند التنفيذي وفي حالة تخلف الطرف الثاني عن سداد أي قسط تكون الاقساط كلها مستحقة الاداء ؛ و يحق للطرف الأول التوجه لدائرة التنفيذ لتحصيل دينه والرجوع على الطرف الثاني بكافة الأقساط المتيقسة .';
        if ($order == null) {
            return view('error-404');
        }
        $logtrack =  Helper::logTracking('print installment invoice ');

        $ar = new Arabic();
        $pdf = new TCPDF();
        $html = view(
            'dashboard.contract.print',
            [
                'ar' => $ar,
                'order' => $order,
                // 'textconttract' => $textconttract,
                'ar_day' => $ar_day,
                'letters_price' => $letters_price,
                'letters_presenter' => $letters_presenter,
                'letters_total' => $letters_total,
                'letters_amount' => $letters_amount,
                'LastDate' => $LastDate
            ]
        )->render();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetFillColor(0, 0, 0, 0);
        $pdf->SetMargins(5, 0, 5, true);
        $pdf->SetTitle('Example PDF');
        $pdf->AddPage();
        $pdf->SetFont('aealarabiya');
        $pdf->writeHTML($html);
        $randomNumber = mt_rand(1, 100);
        return $pdf->Output('العقد -' . $order->customer->name_ar . '.pdf');
    }

    // print contract
    public function printCompanyContract($id)
    {
        $order = Order::where('id', $id)->first();

        $selectedDate = Carbon::parse($order->installment_date);
        $LastDate = $selectedDate->addMonths($order->installment_month - 1)->format('Y/m/d');


        if ($order == null) {
            return view('error-404');
        }
        $logtrack =  Helper::logTracking('print installment invoice ');

        $ar = new Arabic();
        $pdf = new TCPDF();
        $html = view(
            'dashboard.companies.print',
            [
                'ar' => $ar,
                'order' => $order,
                'LastDate' => $LastDate
            ]
        )->render();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetFillColor(0, 0, 0, 0);
        $pdf->SetMargins(
            5,
            0,
            5,
            true
        );
        $pdf->SetTitle('Example PDF');
        $pdf->AddPage();
        $pdf->SetFont('aealarabiya');
        $pdf->writeHTML($html);
        // $randomNumber = mt_rand(1, 100);
        return $pdf->Output('العقد -' . $order->customer->name_ar . '.pdf');
    }

    private function storeInstallment($contract)
    {

        $total_installment = $contract->order->installment_month;
        $productPrice = $contract->order->product->price;


        for ($i = 1; $i <= $total_installment; $i++) {

            // $installmentLD = MonthyInstallment::where('contract_id', $contract->id)->pluck('pay_date');
            $installmentLD = MonthyInstallment::where('contract_id', $contract->id)->latest('pay_date')->first();

            $month_istallment = new MonthyInstallment();

            if ($installmentLD == null) {

                $date = $contract->order->installment_date;

                $installmentAmount = $contract->order->installment_amount;

                $month_istallment->remaining_amount = $productPrice - $contract->order->presenter;
            } else {
                $date = Carbon::parse($installmentLD->pay_date)->addMonth();
                $installmentAmount = $installmentLD->price;
                $month_istallment->remaining_amount = $installmentLD->remaining_amount - $installmentAmount;
                // dd('dd');
            };


            $month_istallment->pay_date = $date;
            // $remainingAmount = $productPrice - $contract->order->installment_amount;

            if ($month_istallment->remaining_amount >= $contract->order->installment_amount) {
                $month_istallment->price = $installmentAmount;
            } else {
                $month_istallment->price = $month_istallment->remaining_amount;
            }
            // $month_istallment->price = $contract->order->installment_amount;
            $month_istallment->status = 'waiting';
            $month_istallment->installment_number = $i;
            $month_istallment->customer_id = $contract->order->customer_id;;
            $month_istallment->contract_id = $contract->id;
            $month_istallment->save();
        }
    }
}
