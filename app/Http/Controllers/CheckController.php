<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Contract;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use TCPDF;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (!Gate::allows('Create-Edit-Check')) {
            abort(403);
        } else {

            $contract = Contract::find($id);
            if ($contract == null) {
                return view('error-404');
            }
            return view(
                'dashboard.checks.create',
                ['contract' => $contract]
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('Create-Edit-Check')) {
            abort(403);
        } else {

            $rule = $this->rule();
            $message = $this->message();

            $validator = Validator($request->all(), $rule, $message);

            if (!$validator->fails()) {
                foreach ($request->addMoreInputFields as $item) {
                    $check = new Check();
                    $check->check_number = $item['check_number'];
                    $check->check_date = $item['check_date'];
                    $check->bank =  $item['bank'];
                    $check->price =  $item['price'];
                    $check->currency =  $item['currency'];
                    //
                    $check->contract_id = $request->input('contract_id');
                    $isSaved = $check->save();
                }

                $logtrack =  Helper::logTracking('add new check for contract , id:' . $request->input('contract_id'));
                return response()->json(['message' => $isSaved ? 'Created successfully' : 'Failed to create'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Check $check)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('Create-Edit-Check')) {
            abort(403);
        } else {

            $contract = Contract::find($id);
            if ($contract == null) {
                return view('error-404');
            }

            return view(
                'dashboard.checks.edit',
                [
                    'dataFromDatabase' => $contract->checks,
                    'contract' => $contract
                ]
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Check $check)
    {
        if (!Gate::allows('Create-Edit-Check')) {
            abort(403);
        } else {
            $rule = $this->rule();
            $message = $this->message();

            $validator = Validator($request->all(), $rule, $message);

            if (!$validator->fails()) {
                foreach ($request->addMoreInputFields as $item) {
                    if (isset($item['id'])) {
                        $encodedId = $item['id'];
                        $dataId = base64_decode($encodedId);
                        $check = Check::findOrFail($dataId);
                    } else {
                        $check = new Check();
                    }
                    $check->check_number = $item['check_number'];
                    $check->check_date = $item['check_date'];
                    $check->bank =  $item['bank'];
                    $check->price =  $item['price'];
                    $check->currency =  $item['currency'];
                    //
                    $check->contract_id = $request->input('contract_id');
                    $isSaved = $check->save();
                }

                $logtrack =  Helper::logTracking('add update check for contract , id:' . $request->input('contract_id'));
                return response()->json(['message' => $isSaved ? 'Created successfully' : 'Failed to create'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!Gate::allows('Create-Edit-Check')) {
            abort(403);
        } else {

            $check = Check::find($id);
            if ($check == null) {
                return view('error-404');
            }

            $isDeleted = $check->delete();
            $logtrack =  Helper::logTracking('delete check');

            return response()->json(['message' => $isDeleted ? 'Deleted successfully' : 'Failed to delete'], $isDeleted ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        }
    }

    public function print($id)
    {
        $contract = Contract::find($id);

        if ($contract == null) {
            return response()->json(['message' => 'There is no contract'], Response::HTTP_BAD_REQUEST);
        }

        if (is_null($contract->checks)) {
            return response()->json(['message' => 'There is no check for this contract'], Response::HTTP_BAD_REQUEST);
        }

        // $ar = new Arabic();
        $pdf = new TCPDF();
        $currentDate = Carbon::now()->format('d/m/Y');
        $html = view(
            'dashboard.checks.print',
            [
                'order' => $contract->order,
                'check' => $contract->checks,
                'currentDate' => $currentDate
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
        return $pdf->Output('الشيك -' . $contract->order->customer->name_ar . '.pdf');
    }

    protected function rule()
    {
        return  $rule = [
            'addMoreInputFields.*.check_number' => 'required | numeric',
            'addMoreInputFields.*.check_date' => 'required',
            'addMoreInputFields.*.bank' => 'required | string | min:3 | max:40',
            'addMoreInputFields.*.price' => 'required | numeric',
            'addMoreInputFields.*.currency' => 'required | string',
            'contract_id' => 'required | numeric',
        ];
    }

    protected function message()
    {
        return  $message = [
            'addMoreInputFields.*.check_number.required' => 'The check number field is required.',
            'addMoreInputFields.*.check_number.numeric' => 'The check number must be a numeric value.',
            'addMoreInputFields.*.check_date.required' => 'The check date field is required.',
            'addMoreInputFields.*.bank.required' => 'The bank field is required.',
            'addMoreInputFields.*.bank.string' => 'The bank field must be a string.',
            'addMoreInputFields.*.bank.min' => 'The bank field must have a minimum of :min characters.',
            'addMoreInputFields.*.bank.max' => 'The bank field must not exceed :max characters.',
            'addMoreInputFields.*.price.required' => 'The price field is required.',
            'addMoreInputFields.*.price.numeric' => 'The price must be a numeric value.',
            'addMoreInputFields.*.currency.required' => 'The currency field is required.',
            'addMoreInputFields.*.currency.string' => 'The currency field must be a string.',
            'contract_id.required' => 'The contract ID field is required.',
            'contract_id.numeric' => 'The contract ID must be a numeric value.',
        ];
    }
}
