<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Jobs\SendMessagesJob;
use App\Models\Contract;
use App\Models\MonthyInstallment;
use ArPHP\I18N\Arabic;
use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class MonthyInstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('Show-MonthyInstallment')) {
            abort(403);
        } else {

            $monthyInstallmentCount = MonthyInstallment::whereIn('status', ['waiting', 'late'])->count();
            $monthyInstallment = MonthyInstallment::whereIn('status', ['waiting', 'late'])->orderByRaw("YEAR(pay_date), MONTH(pay_date), DAY(pay_date)")->paginate(10);

            if ($monthyInstallment == null) {
                return view('error-404');
            }
            $logtrack =  Helper::logTracking('show all installment');

            return view(
                'dashboard.monthyinstallment.index',
                [
                    'monthyInstallment' => $monthyInstallment,
                    'monthyInstallmentCount' => $monthyInstallmentCount,

                ]
            );
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MonthyInstallment $monthyInstallment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('Paid-invoice')) {
            abort(403);
        } else {
            $monthyInstallment = MonthyInstallment::with('contract')->find($id);
            if ($monthyInstallment == null) {
                return view('error-404');
            }
            $payDate = Carbon::parse($monthyInstallment->pay_date)->format('d F, Y');

            $logtrack =  Helper::logTracking('show installment , id : ' . $monthyInstallment->id);

            return view('dashboard.monthyinstallment.edit', ['monthy' => $monthyInstallment, 'payDate' => $payDate]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('Paid-invoice')) {
            abort(403);
        } else {
            $validator = Validator($request->all(), [
                'price' => 'required | numeric | digits_between:2,3',
            ]);
            if (!$validator->fails()) {

                $monthyInstallment = MonthyInstallment::find($id);

                if ($monthyInstallment == null) {
                    return view('error-404');
                }

                $guard = $this->getModel();
                $payDate = date('Y-m-d', strtotime($monthyInstallment->pay_date));
                $currentDate = Carbon::now()->format('Y-m-d'); //current date

                //date of pay
                if (Carbon::parse($currentDate)->greaterThan($payDate)) {
                    $monthyInstallment->status = 'paid late';
                } elseif (Carbon::parse($currentDate)->equalTo($payDate)) {
                    $monthyInstallment->status = 'paid on time';
                } elseif (Carbon::parse($currentDate)->lessThan($payDate)) {
                    $monthyInstallment->status = 'paid early';
                }

                $paidAmount = $request->input('price');
                $installmentAmount = $monthyInstallment->price;
                $difference =  $installmentAmount - $paidAmount;

                $monthyInstallment->price = $paidAmount;

                if ($difference > 0) {

                    $lastMonthyInstallment = MonthyInstallment::where('contract_id', $monthyInstallment->contract_id)
                        ->where('price', '!=', 0)
                        ->orderBy('pay_date', 'desc')->first();

                    if ($lastMonthyInstallment) {
                        $lastMonthyInstallment->price += $difference;
                        $lastMonthyInstallment->save();
                    }
                } elseif ($difference < 0) {

                    $lastMonthyInstallment = MonthyInstallment::where('contract_id', $monthyInstallment->contract_id)
                        ->where('price', '!=', 0)
                        ->orderBy('pay_date', 'desc')->first();

                    if ($lastMonthyInstallment) {
                        $lastMonthyInstallment->price -= abs($difference);
                        $lastMonthyInstallment->save();
                    }
                }


                $monthyInstallment->object_type = $guard['modelClass'];
                $monthyInstallment->object_id = $guard['id'];
                $monthyInstallment->paid_date = Carbon::now();
                $isSaved = $monthyInstallment->save();
                $logtrack =  Helper::logTracking('update pay and date installment , id : ' . $monthyInstallment->id);

                $details = [
                    'to' => '+' . $lastMonthyInstallment->contract->order->customer->phone,
                    'message' => " تم تسديد القسط رقم " . $monthyInstallment->installment_number . " و قيمة القسط " . $monthyInstallment->price
                ];

                $job = (new SendMessagesJob($details));
                dispatch($job);
                return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonthyInstallment $monthyInstallment)
    {
        //
    }

    public function print($id)
    {
        $monthyInstallment = MonthyInstallment::find($id);
        if ($monthyInstallment == null) {
            return view('error-404');
        }
        $customerName = $monthyInstallment->customer->name_ar;
        $ar = new Arabic();

        $pdf = PDF::loadView('dashboard.monthyinstallment.print', [
            'monthyInstallment' => $monthyInstallment,
            'ar' => $ar,
            'date' => Carbon::now()->format('Y-m-d')
        ]);
        $logtrack =  Helper::logTracking('print installment invoice , id : ' . $monthyInstallment->id);

        return $pdf->download('فاتورة -' . $customerName . '.pdf');
    }

    public function printDraft($id)
    {

        $monthyInstallment = MonthyInstallment::where('contract_id', $id)->get();
        if ($monthyInstallment == null) {
            return view('error-404');
        }
        $customerName = $monthyInstallment->first()->customer->name_ar;
        $logtrack =  Helper::logTracking('print installment invoice ');

        $ar = new Arabic();

        $pdf = PDF::loadView('dashboard.monthyinstallment.printdraft', [
            'monthyInstallment' => $monthyInstallment,
            'ar' => $ar,

        ]);
        $randomNumber = mt_rand(1, 100);

        return $pdf->download('كمبيالة -' . $customerName . '.pdf');
    }

    private function getModel()
    {
        if (Auth::guard('admin')->check()) {

            $guard = Auth::guard('admin');
        } elseif (Auth::guard('branch')->check()) {

            $guard = Auth::guard('branch');
        } else {

            $guard = Auth::guard('employee');
        }
        $provider = $guard->getProvider();
        $modelClass = $provider->getModel();

        return (['modelClass' => $modelClass, 'id' => $guard->user()->id]);
    }

    // advanced searchStatus on customers
    public function search(Request $request)
    {
        if (!Gate::allows('Show-MonthyInstallment')) {
            abort(403);
        } else {

            $search = $request->get('search');
            $installments = MonthyInstallment::whereIn('status', ['waiting', 'late'])
                ->orderByRaw("YEAR(pay_date), MONTH(pay_date), DAY(pay_date)")
                ->whereRelation('customer', function ($query) use ($search) {
                    $query->where('name_en', 'like', '%' . $search . '%');
                    $query->orWhere('name_ar', 'like', '%' . $search . '%');
                    $query->orWhere('phone', 'like', '%' . $search . '%');
                })->get();
            return view('dashboard.monthyinstallment.search', ['installments' => $installments]);
        }
    }

    // advanced searchStatus on customers
    public function searchStatus(Request $request)
    {
        if (!Gate::allows('Show-MonthyInstallment')) {
            abort(403);
        } else {

            $query = $request->get('search');
            // dd($query);
            $installments = MonthyInstallment::orderByRaw("YEAR(pay_date), MONTH(pay_date), DAY(pay_date)")->where('status', $query)->get();
            return view('dashboard.monthyinstallment.search', ['installments' => $installments]);
        }
    }
}
