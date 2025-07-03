<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //This method will show role page
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->paginate(10);
        return view("roles.list", ["roles" => $roles]);
    }

    //This method show create Role Page
    public function create()
    {
        $permissions = Permission::orderBy('created_at', 'asc')->get();
        return view('roles.create', ['permissions' => $permissions]);
    }

    // This method post role data in DB
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:3|unique:roles",
        ]);

        if ($validator->fails()) {
            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        } else {
            $role = Role::create(['name' => $request->name]);
            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
                return redirect()->route('roles.index')->with('success', 'Role Added Successfully.');
            }
        }


    }
    //This method show edit Role Page
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('created_at', 'asc')->get();
        // dd($permissions);
        return view('roles.edit',['hasPermissions'=> $hasPermissions,'permissions'=> $permissions, 'role'=> $role]);
    }
}
