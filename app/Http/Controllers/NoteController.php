<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'order_id' => 'required | numeric',
            'note' => 'required | string',
        ]);
        if (!$validator->fails()) {
            $guard = $this->getModel();
            $note = new Note();
            $note->note = $request->input('note');
            $note->order_id = $request->input('order_id');
            $note->object_type = $guard['modelClass'];
            $note->object_id = $guard['id'];
            $isSaved = $note->save();

            $logtrack =  Helper::logTracking('store new note');

            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $validator = Validator($request->all(), [
            'note' => 'required | string',
        ]);
        if (!$validator->fails()) {
            $guard = $this->getModel();
            $note->note = $request->input('note');
            $note->object_type = $guard['modelClass'];
            $note->object_id = $guard['id'];
            $isSaved = $note->save();

            $logtrack =  Helper::logTracking('update note');

            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $isDeleted = $note->delete();
        return response()->json(
            ['message' => $isDeleted ? 'Deleted Successfully' : 'Delete failed'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
        );
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
}
