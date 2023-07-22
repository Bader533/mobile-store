<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Jobs\SendMessagesJob;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        $request->merge(["guard" => $request->guard]);
        $validator = Validator($request->all(), [
            'guard' => 'required | string | in:admin,branch,employee,customer'
        ]);
        if (!$validator->fails()) {
            return response()->view('dashboard.auth.sign-in', ['guard' => $request->input('guard')]);
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'phone' => 'required | numeric',
            'password' => 'required',
            'guard' => 'required | string | in:admin,branch,employee,customer',
        ]);

        if (!$validator->fails()) {

            $crendentials = ['phone' => $request->input('phone'), 'password' => $request->input('password'), 'active' => 1];
            if (Auth::guard($request->input('guard'))->attempt($crendentials)) {

                $logtrack =  Helper::logTracking('login');
                return response()->json(['message' => 'Logged in successfully'], Response::HTTP_OK);
            } else {
                return response()->json(
                    ['message' => 'Login failed, check your credentials'],
                    Response::HTTP_BAD_REQUEST
                );
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    public function resetPassword(Request $request)
    {
        $request->merge(["guard" => $request->guard]);

        $validator = Validator($request->all(), [
            'guard' => 'required | string | in:admin,branch,employee,customer'
        ]);

        if (!$validator->fails()) {
            return response()->view('dashboard.auth.reset-password', ['guard' => $request->input('guard')]);
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function newPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'phone' => "required | numeric",
            'guard' => 'required | string | in:admin,branch,employee,customer',
        ]);

        if (!$validator->fails()) {
            if ($request->input('guard') == 'admin') {
                $guard = Admin::where('phone', $request->input('phone'))->first();
            } elseif ($request->input('guard') == 'branch') {
                $guard = Branch::where('phone', $request->input('phone'))->first();
            } elseif ($request->input('guard') == 'employee') {
                $guard = Employee::where('phone', $request->input('phone'))->first();
            } elseif ($request->input('guard') == 'customer') {
                $guard = Customer::where('phone', $request->input('phone'))->first();
            }
            $password = Str::random(10);
            $guard->password = Hash::make($password);
            //whatsapp
            $details = [
                'to' => '+' . $guard->phone,
                'message' => "https://mobile-pro.project-test.in/ar/" . $request->input('guard') . "/login  , password is :" . $password
            ];

            $job = (new SendMessagesJob($details));
            dispatch($job);
            return response()->json(['message' => 'reset password in successfully'], Response::HTTP_OK);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    public function logout(Request $request)
    {
        $guard = auth('branch')->check() ? 'branch' : (auth('admin')->check() ? 'admin' : (auth('employee')->check() ? 'employee' : 'customer'));
        $logtrack =  Helper::logTracking('log-out');
        Auth::guard($guard)->logout();
        $request->session()->invalidate();

        return redirect()->route('dashboard.login', $guard);
    }
}
