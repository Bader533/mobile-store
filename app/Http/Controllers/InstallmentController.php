<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Installment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('Read-Installments')) {
            abort(403);
        } else {
            $installments = Installment::orderBy('id', 'desc')->paginate(10);
            $logtrack =  Helper::logTracking('show all installment');
            return view('dashboard.installment.index', ['installments' => $installments]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('Create-Installment')) {
            abort(403);
        } else {
            $logtrack =  Helper::logTracking('open create installment page');
            return view('dashboard.installment.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('Create-Installment')) {
            abort(403);
        } else {

            $validator = Validator($request->all(), [
                'name' => 'required | string | min:3 | max:40',
                'formule' => 'required | string | min:5 | max:400',
            ]);
            if (!$validator->fails()) {
                $installment = new Installment();
                $installment->name = $request->input('name');
                $installment->formule = $request->input('formule');
                $isSaved = $installment->save();

                $logtrack =  Helper::logTracking('store new installment');

                return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Installment $installment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Installment $installment)
    {
        if (!Gate::allows('Update-Installment')) {
            abort(403);
        } else {

            $logtrack =  Helper::logTracking('show installment details in edit page , id' . $installment->id);
            return view('dashboard.installment.edit', ['installment' => $installment]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Installment $installment)
    {
        if (!Gate::allows('Update-Installment')) {
            abort(403);
        } else {

            $validator = Validator($request->all(), [
                'name' => 'required | string | min:3 | max:40',
                'formule' => 'required | string | min:3 | max:40',
            ]);
            if (!$validator->fails()) {
                $installment->name = $request->input('name');
                $installment->formule = $request->input('formule');
                $isSaved = $installment->save();

                $logtrack =  Helper::logTracking('update installment details , id' . $installment->id);


                return response()->json(['message' => $isSaved ? 'Updated successfully' : 'Failed to update'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installment $installment)
    {
        //
    }

    // advanced search on customers
    public function search(Request $request)
    {
        if (!Gate::allows('Read-Installments')) {
            abort(403);
        } else {

            $query = $request->get('search');
            $installments = Installment::where('name', 'like', '%' . $query . '%')->orderBy('id', 'desc')->get();
            return view('dashboard.installment.search', ['installments' => $installments]);
        }
    }
}
