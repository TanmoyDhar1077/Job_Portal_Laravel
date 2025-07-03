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
        return view("roles.list");
    }

    //This method show create permission Page
    public function create()
    {
        $permissions = Permission::orderBy('created_at', 'asc')->get();
        return view('roles.create', ['permissions' => $permissions]);
    }

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
}
