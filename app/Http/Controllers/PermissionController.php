<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;



class PermissionController extends Controller
{
    //This method will show permission page
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->paginate(10);
        return view("permission.list", [
            "permissions" => $permissions
        ]);
    }
    //This method show create permission Page
    public function create()
    {
        return view("permission.create");
    }
    //This method will insert permission data in DB 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:3|unique:permissions",
        ]);

        if ($validator->fails()) {
            return redirect()->route('permission.create')->withInput()->withErrors($validator);
        } else {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permission.index')->with('success', 'Permission Added Successfully.');
        }
    }

    //This method show edit permission Page
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permission.edit', ["permission" => $permission]);
    }

    //This method will Update permission in DB
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:permissions,name,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->route('permission.edit',$id)->withInput()->withErrors($validator);
        } else {
            $permission->name = $request->name;
            $permission->save();
            return redirect()->route('permission.index')->with('success', 'Permission Updated Successfully.');
        }
    }

    //This method will delete permission in DB
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        return redirect()->route('permission.index')->with('success', 'Permission deleted successfully.');
    }

}
