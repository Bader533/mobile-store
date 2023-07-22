<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    public function profile()
    {
        $logtrack =  Helper::logTracking('open profile page');
        return view('dashboard.account.profile');
    }
    public function tracking()
    {
        $logtrack =  Helper::logTracking('open profile tracking page');
        $trackings = auth('admin')->user()->trackings()->paginate(10);
        return view('dashboard.account.tracking', ['trackings' => $trackings]);
    }

    public function edit()
    {
        return view('dashboard.account.setting');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        if (Auth::guard('admin')->check()) {

            $guard = Admin::find($user->id);
        } elseif (Auth::guard('branch')->check()) {

            $guard = Branch::find($user->id);
        } else {

            $guard = Employee::find($user->id);
        }

        if ($guard == null) {
            return view('error-404');
        }

        $validator = Validator($request->all(), [
            'name' => 'required | string | min:3 | max:40',
            'id_number' => 'required | numeric | digits:9 | unique:' . $user->getTable() . ',id_number,' . $guard->id,
            'phone' => 'required | numeric | digits:12',
        ]);
        if (!$validator->fails()) {

            $guard->name = $request->input('name');
            $guard->id_number = $request->input('id_number');
            $guard->phone = $request->input('phone');
            $isUpdated = $guard->save();

            $logtrack =  Helper::logTracking('update his profile');

            return response()->json(['message' => $isUpdated ? 'Updated successfully' : 'Failed to update'], $isUpdated ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if (Auth::guard('admin')->check()) {

            $guard = Admin::find($user->id);
        } elseif (Auth::guard('branch')->check()) {

            $guard = Branch::find($user->id);
        } else {

            $guard = Employee::find($user->id);
        }

        if ($guard == null) {
            return view('error-404');
        }

        $validator = Validator($request->all(), [
            'password' => 'required | confirmed',
        ]);

        if (!$validator->fails()) {

            $guard->password = Hash::make($request->input('password'));
            $isUpdated = $guard->save();
            $logtrack =  Helper::logTracking('update password');
            return response()->json(['message' => $isUpdated ? 'Updated successfully' : 'Failed to update'], $isUpdated ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
}
