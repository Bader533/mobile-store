<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Branch;
use App\Traits\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class BranchController extends Controller
{
    use image;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('Read-Branches')) {
            abort(403);
        } else {
            $branches = Branch::orderBy('id', 'desc')->paginate(10);
            $logtrack =  Helper::logTracking('show all bracnhes table');
            return view('dashboard.branch.index', ['branches' => $branches]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('Create-Branch')) {
            abort(403);
        } else {

            $logtrack =  Helper::logTracking('open create new bracnhe page');
            return view('dashboard.branch.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('Create-Branch')) {
            abort(403);
        } else {
            $validator = Validator($request->all(), [
                'name_en' => 'required | string | min:3 | max:40',
                'name_ar' => 'required | string | min:3 | max:40',
                'branch_name_en' => 'required | string | min:3 | max:40',
                'branch_name_ar' => 'required | string | min:3 | max:40',
                'id_number' => 'required | numeric | digits:9 | unique:branches,id_number',
                'phone' => 'required | numeric | digits:12',
                'status' => 'required | numeric | in:0,1',
                'avatar' => 'required | mimes:jpg,png,jpeg',
                'password' => 'required | string | min:5 | confirmed',
            ]);
            if (!$validator->fails()) {
                $branch = new Branch();
                $branch->name_en = $request->input('name_en');
                $branch->name_ar = $request->input('name_ar');
                $branch->branch_name_en = $request->input('branch_name_en');
                $branch->branch_name_ar = $request->input('branch_name_ar');
                $branch->id_number = $request->input('id_number');
                $branch->phone = $request->input('phone');
                $branch->active = $request->input('status');
                $branch->password = Hash::make($request->input('password'));
                $isSaved = $branch->save();
                //images
                if ($request->hasFile('avatar')) {
                    $this->saveImage($request->avatar, 'images/branch', $branch);
                }
                $logtrack =  Helper::logTracking('store new bracnhe , id:' . $branch->id);

                return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        if (!Gate::allows('Show-Branch')) {
            abort(403);
        } else {
            $permissions = Permission::where('guard_name', '=', 'branch')->get();
            $rolePermissions = $branch->getAllPermissions();
            if (count($rolePermissions) > 0) {
                foreach ($permissions as $permission) {
                    foreach ($rolePermissions as $rolePermission) {
                        if ($rolePermission->id == $permission->id) {
                            $permission->setAttribute('assigned', true);
                        }
                    }
                }
            }
            $trackings = $branch->trackings()->paginate(5);
            return view('dashboard.branch.show', ['branch' => $branch, 'trackings' => $trackings, 'permissions' => $permissions]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        if (!Gate::allows('Update-Branch')) {
            abort(403);
        } else {

            $logtrack =  Helper::logTracking('open bracnhe details in edit page , id:' . $branch->id);
            return view('dashboard.branch.edit', ['branch' => $branch]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        if (!Gate::allows('Update-Branch')) {
            abort(403);
        } else {

            $validator = Validator($request->all(), [
                'name_en' => 'required | string | min:3 | max:40',
                'name_ar' => 'required | string | min:3 | max:40',
                'branch_name_en' => 'required | string | min:3 | max:40',
                'branch_name_ar' => 'required | string | min:3 | max:40',
                'id_number' => 'required | numeric | digits:9 | unique:branches,id_number,' . $branch->id,
                'phone' => 'required | numeric | digits:12',
                'status' => 'required | numeric | in:0,1',
                // 'avatar' => 'required | mimes:jpg,png,jpeg',
                'password' => 'confirmed',
            ]);
            if (!$validator->fails()) {
                $branch->name_en = $request->input('name_en');
                $branch->name_ar = $request->input('name_ar');
                $branch->branch_name_en = $request->input('branch_name_en');
                $branch->branch_name_ar = $request->input('branch_name_ar');
                $branch->id_number = $request->input('id_number');
                $branch->phone = $request->input('phone');
                $branch->active = $request->input('status');
                $branch->password = Hash::make($request->input('password'));
                $isSaved = $branch->save();
                //images
                if ($request->hasFile('avatar')) {
                    $branch->images[0]->delete();
                    $this->saveImage($request->avatar, 'images/branch', $branch);
                }
                $logtrack =  Helper::logTracking('update bracnhe , id:' . $branch->id);
                return response()->json(['message' => $isSaved ? 'Updated successfully' : 'Failed to update'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }

    // advanced search on branchs
    public function search(Request $request)
    {
        if (!Gate::allows('Read-Branches')) {
            abort(403);
        } else {
            $query = $request->get('search');
            $branches = Branch::where('name_en', 'like', '%' . $query . '%')
                ->orWhere('name_ar', 'like', '%' . $query . '%')
                ->orWhere('phone', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')->get();
            return view('dashboard.branch.search', ['branches' => $branches]);
        }
    }
}
