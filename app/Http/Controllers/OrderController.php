<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Installment;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('Read-Orders')) {
            abort(403);
        } else {
            $orders = Order::orderBy('id', 'desc')->paginate(10);
            $logtrack =  Helper::logTracking('open orders page');
            return view('dashboard.order.index', ['orders' => $orders]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('Create-Order')) {
            abort(403);
        } else {
            $products = Product::get();
            $customers = Customer::where('is_company', 0)->get();
            $companies = Customer::where('is_company', 1)->get();
            $branches = Branch::get();
            $installments = Installment::get();
            $logtrack =  Helper::logTracking('open create order page');
            return view('dashboard.order.create', [
                'products' => $products,
                'customers' => $customers,
                'companies' => $companies,
                'branches' => $branches,
                'installments' => $installments,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('Create-Order')) {
            abort(403);
        } else {
            $validator = Validator($request->all(), [
                'installment_method' => 'required | numeric',
                'installment_month' => 'nullable | numeric',
                'installment_amount' => 'required | numeric',
                'presenter' => 'required | numeric',
                'branch_id' => 'required | numeric',
                'product_id' => 'required | numeric',
                'serial_number' => 'required | unique:orders,serial_number',
                'customer_id' => 'nullable | required_if:installment_method,2,3,4 | numeric',
                'guarantor_id' => 'nullable | required_if:installment_method,2,4 | numeric',
                'company_name' => 'nullable | required_if:installment_method,5 | string',
                'lawyer_fees' => 'nullable | numeric',

            ]);
            if (!$validator->fails()) {
                $order = new Order();
                $product = Product::where('id', $request->input('product_id'))->first('price');

                $remaining_price = $product->price - $request->input('presenter');
                $month = $remaining_price / $request->input('installment_amount');
                $roundedNumber = ceil($month);

                $totalInput = ($month  * $request->input('installment_amount')) + $request->input('presenter');
                if ($totalInput == $product->price) {
                    $order->installment_month = $roundedNumber;
                    $order->installment_amount = $request->input('installment_amount');
                    $order->presenter = $request->input('presenter');
                } else {
                    return response()->json(['message' => 'check installment data presenter & amount'], Response::HTTP_BAD_REQUEST);
                }

                //first installment
                $nextMonth = Carbon::now()->addMonth();
                $order->installment_date = $request->input('installment_date') == null ? $nextMonth : $request->input('installment_date');
                $order->remaining_price = $product->price - $request->input('presenter');
                $order->installment_id = $request->input('installment_method');
                $order->branch_id = $request->input('branch_id');
                $order->product_id = $request->input('product_id');
                $order->serial_number = $request->input('serial_number');
                $order->lawyer_fees = $request->input('lawyer_fees');

                if ($request->input('installment_method') == 5) {
                    $order->customer_id = $request->input('company_name');
                } else {
                    $order->customer_id = $request->input('customer_id');
                }

                $order->guarantor_id = $request->input('guarantor_id');

                $order->status = 'pending';
                $isSaved = $order->save();
                $logtrack =  Helper::logTracking('store new order , id : ' . $order->id);
                return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        if (!Gate::allows('Show-Order')) {
            abort(403);
        } else {

            $logtrack =  Helper::logTracking('show order details :' . $order->id);
            return view('dashboard.order.show', ['order' => $order]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        if (!Gate::allows('Update-Order')) {
            abort(403);
        } else {
            $products = Product::get();
            $customers = Customer::where('is_company', 0)->get();
            $companies = Customer::where('is_company', 1)->get();
            $branches = Branch::get();
            $installments = Installment::get();
            $logtrack =  Helper::logTracking('show edit order details in , id : ' . $order->id);
            return view('dashboard.order.edit', [
                'products' => $products,
                'customers' => $customers,
                'companies' => $companies,
                'branches' => $branches,
                'installments' => $installments,
                'order' => $order,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        if (!Gate::allows('Update-Order')) {
            abort(403);
        } else {

            $validator = Validator($request->all(), [
                'installment_method' => 'required | numeric',
                'installment_month' => 'required | numeric',
                'installment_amount' => 'required | numeric',
                'presenter' => 'required | numeric',
                'branch_id' => 'required | numeric',
                'product_id' => 'required | numeric',
                'serial_number' => 'required | unique:orders,serial_number,' . $order->id,
                // 'customer_id' => 'required | numeric',
                'customer_id' => 'nullable | required_if:installment_method,2,3,4 | numeric',
                'guarantor_id' => 'nullable | required_if:installment_method,2,4 | numeric',
                'company_name' => 'nullable | required_if:installment_method,5 | string',
                'installment_date' => 'required ',
                'status' => 'required | string',
                'lawyer_fees' => 'nullable | numeric',

            ]);
            if (!$validator->fails()) {
                $product = Product::where('id', $request->input('product_id'))->first('price');
                $order->remaining_price = $product->price - $request->input('presenter');
                $order->installment_id = $request->input('installment_method');
                $order->installment_month = $request->input('installment_month');
                $order->installment_amount = $request->input('installment_amount');
                $order->presenter = $request->input('presenter');
                $order->installment_date = $request->input('installment_date');
                $order->branch_id = $request->input('branch_id');
                $order->product_id = $request->input('product_id');
                $order->serial_number = $request->input('serial_number');
                $order->lawyer_fees = $request->input('lawyer_fees');
                if ($request->input('installment_method') == 5) {
                    $order->customer_id = $request->input('company_name');
                } else {
                    $order->customer_id = $request->input('customer_id');
                }
                // $order->customer_id = $request->input('customer_id');
                $order->guarantor_id = $request->input('guarantor_id');
                $order->status = $request->input('status');
                $isSaved = $order->save();
                $logtrack =  Helper::logTracking('update order , id : ' . $order->id);
                return response()->json(['message' => $isSaved ? 'Updated successfully' : 'Failed to update'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    // advanced search on orders
    public function search(Request $request)
    {
        if (!Gate::allows('Read-Orders')) {
            abort(403);
        } else {

            $query = $request->get('search');
            $orders = Order::whereRelation('product', 'name_en', 'like', '%' . $query . '%')
                ->orWhereRelation('product', 'name_ar', 'like', '%' . $query . '%')
                ->orWhereRelation('customer', 'name_en', 'like', '%' . $query . '%')
                ->orWhereRelation('customer', 'name_ar', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')->get();

            return view('dashboard.order.search', ['orders' => $orders]);
        }
    }
}
