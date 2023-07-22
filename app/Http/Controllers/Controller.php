<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\MonthyInstallment;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function homePage()
    {
        $month = Carbon::now()->month;
        $monthy = MonthyInstallment::whereMonth('pay_date', $month)->get();
        $waiting = MonthyInstallment::where('status', '=', 'waiting')->get();
        $paidOnTime = $monthy->where('status', 'paid on time')->sum('price');
        $paidLate = $monthy->where('status', 'paid late')->sum('price');
        $paidEarly = $monthy->where('status', 'paid early')->sum('price');
        $orders = Order::whereNotNull('customer_id')->latest()->take(10)->get();
        $contracts = Contract::get();
        $priceSum = Order::withSum('product', 'price')->get()->sum('product_sum_price');
        $totalOrder = Order::where('status', 'accepted')->count();
        $totalCustomer = Customer::count();
        return view('dashboard.home.home', [
            'monthy' => $monthy,
            'paidOnTime' => $paidOnTime,
            'paidLate' => $paidLate,
            'paidEarly' => $paidEarly,
            'waiting' => $waiting,
            'orders' => $orders,
            'contracts' => $contracts,
            'priceSum' => $priceSum,
            'totalOrder' => $totalOrder,
            'totalCustomer' => $totalCustomer
        ]);
    }

    public function sendWhatsApp()
    {
        $to = "+972592996000";
        $message = "Hello from Twilio!";

        $messageSid = Helper::sendMessage($to, $message);
        // dd($messageSid);
        return "Message sent with SID: " . $messageSid;
    }

    public function updateRolePermission(Request $request)
    {
        $validator = Validator($request->all(), [
            'permission_id' => 'required | numeric | exists:permissions,id',
        ]);
        if (!$validator->fails()) {

            if ($request->input('guard') == 'admin') {

                $guard = Admin::find($request->input('user_id'));
            } elseif ($request->input('guard') == 'branch') {

                $guard = Branch::find($request->input('user_id'));
            } elseif ($request->input('guard') == 'employee') {

                $guard = Employee::find($request->input('user_id'));
            } else {

                $guard = Customer::find($request->input('user_id'));
            }

            if ($guard == null) {
                return view('error-404');
            }

            $permission = Permission::findOrFail($request->input('permission_id'));
            if ($guard->hasPermissionTo($permission)) {
                $guard->revokePermissionTo($permission);
            } else {
                $guard->givePermissionTo($permission);
            }
            return response()->json(['message' => 'Updated successfully'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
}
