<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Jobs\SendMessagesJob;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\MonthyInstallment;
use App\Traits\image;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;

class CustomerController extends Controller
{
    use image;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('Read-Customers')) {
            abort(403);
        } else {
            $customers = Customer::orderBy('id', 'desc')->paginate(10);
            $logtrack =  Helper::logTracking('show all customers');
            return view('dashboard.customer.index', ['customers' => $customers]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('Create-Customer')) {
            abort(403);
        } else {
            $logtrack =  Helper::logTracking('open create new customer');
            return view('dashboard.customer.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //updated
        if (!Gate::allows('Create-Customer')) {
            abort(403);
        } else {
            $validator = Validator($request->all(), [
                'name_en' => 'required | string | min:3 | max:40',
                'name_ar' => 'required | string | min:3 | max:40',
                'mother_name' => 'string | min:3 | max:40',

                'id_number' => 'required | numeric | digits:9 | unique:customers,id_number',
                'address' => 'string | min:3 | max:40',

                'phone' => 'required | numeric | digits:12',
                'other_phone' => 'nullable | numeric | digits:12',

                'date_of_birth' => 'string',
                'place_of_birth' => 'string | min:3 | max:60',

                'career' => 'string | min:3 | max:60',
                'place_of_work' => 'string | min:3 | max:60',

                'date_of_issuing_the_id' => 'string',
                'place_issue_of_id' => 'string | min:3 | max:60',

                'status' => 'required | numeric | in:0,1',
                'is_company' => 'required | numeric | in:0,1',
                'avatar' => 'required | mimes:jpg,png,jpeg',
            ]);
            if (!$validator->fails()) {
                $guard = $this->getModel();
                $customer = new Customer();
                $customer->name_en = $request->input('name_en');
                $customer->name_ar = $request->input('name_ar');
                $customer->mother_name = $request->input('mother_name');

                $customer->id_number = $request->input('id_number');
                $customer->address = $request->input('address');

                $customer->phone = $request->input('phone');
                $customer->other_phone = $request->input('other_phone');

                $customer->date_of_birth = $request->input('date_of_birth');
                $customer->place_of_birth = $request->input('place_of_birth');

                $customer->career = $request->input('career');
                $customer->place_of_work = $request->input('place_of_work');

                $customer->date_of_issuing_the_id = $request->input('date_of_issuing_the_id');
                $customer->place_issue_of_id = $request->input('place_issue_of_id');

                $customer->active = $request->input('status');
                $customer->is_company = $request->input('is_company');
                $customer->object_type = $guard['modelClass'];
                $customer->object_id = $guard['id'];
                $password = Str::random(10);
                $customer->password = Hash::make($password);
                $isSaved = $customer->save();
                //images
                if ($request->hasFile('avatar')) {
                    $this->saveImage($request->avatar, 'images/customer', $customer, 'avatar');
                }
                if ($request->hasFile('account_statement')) {
                    $this->saveImage($request->account_statement, 'images/customer', $customer, 'account_statement');
                }
                if ($request->hasFile('credit_inquiry')) {
                    $this->saveImage($request->credit_inquiry, 'images/customer', $customer, 'credit_inquiry');
                }

                //tracking
                $logtrack =  Helper::logTracking('store new customer ,name' . $customer->name);

                //whatsapp
                $details = [
                    'to' => '+' . $customer->phone,
                    'message' => "https://mobile-pro.project-test.in/ar/customer/login  , password is :" . $password
                ];

                $job = (new SendMessagesJob($details));
                dispatch($job);
                //

                return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        if (!Gate::allows('Show-Customer')) {
            abort(403);
        } else {
            $onTimePaid = MonthyInstallment::whereBelongsTo($customer)->where('status', '=', 'paid on time')->count();
            $paidLate = MonthyInstallment::whereBelongsTo($customer)->where('status', '=', 'paid late')->count();
            $paidEarly = MonthyInstallment::whereBelongsTo($customer)->where('status', '=', 'paid early')->count();

            $unpaid = MonthyInstallment::whereBelongsTo($customer)->where('status', '=', 'waiting')->count();
            $paidup = MonthyInstallment::whereBelongsTo($customer)->where('status', '!=', 'waiting')->get();
            $contracts = Contract::whereRelation('order', 'customer_id',   $customer->id)
                ->orderBy('id', 'desc')->get();

            $guarantorInContracts = Contract::whereRelation('order', 'guarantor_id',   $customer->id)
                ->orderBy('id', 'desc')->get();

            $permissions = Permission::where('guard_name', '=', 'Customer')->get();
            $rolePermissions = $customer->getAllPermissions();
            if (count($rolePermissions) > 0) {
                foreach ($permissions as $permission) {
                    foreach ($rolePermissions as $rolePermission) {
                        if ($rolePermission->id == $permission->id) {
                            $permission->setAttribute('assigned', true);
                        }
                    }
                }
            }
            $trackings = $customer->trackings()->paginate(5);
            $logtrack =  Helper::logTracking('show customer details ,name' . $customer->name);
            return view('dashboard.customer.show', [
                'customer' => $customer,
                'ontimepaid' => $onTimePaid,
                'paidearly' => $paidEarly,
                'paidlate' => $paidLate,
                'unpaid' => $unpaid,
                'paidup' => $paidup,
                'contracts' => $contracts,
                'guarantorIC' => $guarantorInContracts,
                'trackings' => $trackings,
                'permissions' => $permissions
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        if (!Gate::allows('Update-Customer')) {
            abort(403);
        } else {
            $logtrack =  Helper::logTracking('show customer details in edit page ,name' . $customer->name);
            return view('dashboard.customer.edit', ['customer' => $customer]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        if (!Gate::allows('Update-Customer')) {
            abort(403);
        } else {

            $validator = Validator($request->all(), [
                'name_en' => 'required | string | min:3 | max:40',
                'name_ar' => 'required | string | min:3 | max:40',
                'mother_name' => 'string | min:3 | max:40',

                'id_number' => 'required | numeric | digits:9 | unique:customers,id_number,' . $customer->id,
                'address' => 'string | min:3 | max:40',

                'phone' => 'required | numeric | digits:12',
                'other_phone' => 'nullable | numeric | digits:12',

                'date_of_birth' => 'required | string',
                'place_of_birth' => 'required | string | min:3 | max:60',

                'career' => 'required | string | min:3 | max:60',
                'place_of_work' => 'required | string | min:3 | max:60',

                'date_of_issuing_the_id' => 'required | string',
                'place_issue_of_id' => 'required | string | min:3 | max:60',


                'status' => 'required | numeric | in:0,1',
                'is_company' => 'required | numeric | in:0,1',
            ]);
            if (!$validator->fails()) {
                $customer->name_en = $request->input('name_en');
                $customer->name_ar = $request->input('name_ar');
                $customer->mother_name = $request->input('mother_name');

                $customer->id_number = $request->input('id_number');
                $customer->address = $request->input('address');

                $customer->phone = $request->input('phone');
                $customer->other_phone = $request->input('other_phone');

                $customer->date_of_birth = $request->input('date_of_birth');
                $customer->place_of_birth = $request->input('place_of_birth');

                $customer->career = $request->input('career');
                $customer->place_of_work = $request->input('place_of_work');

                $customer->date_of_issuing_the_id = $request->input('date_of_issuing_the_id');
                $customer->place_issue_of_id = $request->input('place_issue_of_id');

                $customer->active = $request->input('status');
                $customer->is_company = $request->input('is_company');
                $isSaved = $customer->save();
                //images
                $this->updateImage($request, $customer, 'avatar');
                $this->updateImage($request, $customer, 'account_statement');
                $this->updateImage($request, $customer, 'credit_inquiry');

                $logtrack =  Helper::logTracking('update customer details in edit page ,name' . $customer->name);

                return response()->json(['message' => $isSaved ? 'Updated successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    // advanced search on customers
    public function search(Request $request)
    {
        if (!Gate::allows('Read-Customers')) {
            abort(403);
        } else {
            $query = $request->get('search');
            $customers = Customer::where('name_en', 'like', '%' . $query . '%')
                ->orWhere('name_ar', 'like', '%' . $query . '%')
                ->orWhere('phone', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')->get();
            return view('dashboard.customer.search', ['customers' => $customers]);
        }
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

    private function updateImage($request, $obj, $imageName)
    {
        if ($request->hasFile($imageName)) {
            foreach ($obj->images as $image) {
                if ($image->name == $imageName) {
                    if (File::exists($image->url)) {
                        File::delete($image->url);
                    }
                    $image->delete();
                }
            }
            $this->saveImage($request->$imageName, 'images/customer', $obj, $imageName);
        }
    }
}
