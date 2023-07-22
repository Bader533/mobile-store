<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Employee;
use App\Traits\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    use image;

    public function __construct()
    {
        // $this->authorizeResource(Employee::class, 'employee');
        // $this->middleware('permission:Create-Employee', ['only' => ['create', 'store']]);
        // $this->middleware('permission:Update-Employee', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('Read-Employees')) {
            abort(403);
        } else {
            $employees = Employee::paginate(10);
            $logtrack =  Helper::logTracking('show all employees');

            return view('dashboard.employee.index', ['employees' => $employees]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create', Employee::class);
        if (!Gate::allows('Create-Employee')) {
            abort(403);
        } else {
            $logtrack =  Helper::logTracking('open create new employee');
            return view('dashboard.employee.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('Create-Employee')) {
            abort(403);
        } else {
            $validator = Validator($request->all(), [
                'name' => 'required | string | min:3 | max:40',
                'id_number' => 'required | numeric | digits:9 | unique:employees',
                'phone' => 'required | numeric | digits:12',
                'status' => 'required | numeric | in:0,1',
                'avatar' => 'required | mimes:jpg,png,jpeg',
                'password' => 'required | string | min:5 | confirmed',
            ]);
            if (!$validator->fails()) {
                $employee = new Employee();
                $employee->name = $request->input('name');
                $employee->id_number = $request->input('id_number');
                $employee->phone = $request->input('phone');
                $employee->active = $request->input('status');
                $employee->password = Hash::make($request->input('password'));
                $isSaved = $employee->save();
                //images
                if ($request->hasFile('avatar')) {
                    $this->saveImage($request->avatar, 'images/employee', $employee);
                }
                $logtrack =  Helper::logTracking('store new employees ,name' . $employee->name);
                return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        if (!Gate::allows('Show-Employee')) {
            abort(403);
        } else {
            $permissions = Permission::where('guard_name', '=', 'employee')->get();
            $rolePermissions = $employee->getAllPermissions();
            if (count($rolePermissions) > 0) {
                foreach ($permissions as $permission) {
                    foreach ($rolePermissions as $rolePermission) {
                        if ($rolePermission->id == $permission->id) {
                            $permission->setAttribute('assigned', true);
                        }
                    }
                }
            }
            $trackings = $employee->trackings()->paginate(5);
            return view('dashboard.employee.show', ['employee' => $employee, 'trackings' => $trackings, 'permissions' => $permissions]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        if (!Gate::allows('Update-Employee')) {
            abort(403);
        } else {
            $logtrack =  Helper::logTracking('show  employees details in edit page ,name' . $employee->name);
            return view('dashboard.employee.edit', ['employee' => $employee]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        if (!Gate::allows('Update-Employee')) {
            abort(403);
        } else {

            $validator = Validator($request->all(), [
                'name' => 'required | string | min:3 | max:40',
                'id_number' => 'required | numeric | digits:9 | unique:employees,id_number,' . $employee->id,
                'phone' => 'required | numeric | digits:12',
                'status' => 'required | numeric | in:0,1',
                // 'avatar' => 'required | mimes:jpg,png,jpeg',
                'password' => 'confirmed',
            ]);
            if (!$validator->fails()) {
                $employee->name = $request->input('name');
                $employee->id_number = $request->input('id_number');
                $employee->phone = $request->input('phone');
                $employee->active = $request->input('status');
                $employee->password = Hash::make($request->input('password'));
                $isSaved = $employee->save();
                //images
                if ($request->hasFile('avatar')) {
                    $employee->images[0]->delete();
                    $this->saveImage($request->avatar, 'images/employee', $employee);
                }
                $logtrack =  Helper::logTracking('update employees ,name' . $employee->name);
                return response()->json(['message' => $isSaved ? 'Updated successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    // advanced search on employees
    public function search(Request $request)
    {
        if (!Gate::allows('Read-Employees')) {
            abort(403);
        } else {
            $query = $request->get('search');
            $employees = Employee::where('name', 'like', '%' . $query . '%')
                ->orWhere('phone', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')->get();
            return view('dashboard.employee.search', ['employees' => $employees]);
        }
    }
}
