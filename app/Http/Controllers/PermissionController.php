<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:access-permission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $user = Auth::user();
        $permissions = Permission::all();
        $editable = false;

        return view('permission.index', compact('roles', 'permissions', 'user', 'editable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('permission.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Permission::getRules());
        Permission::create($request->all());

        return redirect('admin/permission/all/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $user = Auth::user();

        if ($id == "all") {
            $roles = Role::all();
            $permissions = Permission::all();
            $editable = true;

            return view('permission.index', compact('roles', 'permissions', 'editable', 'user'));
        } else {
            $permission = Permission::find($id);

            return view('permission.edit', compact('permission', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, Permission::getRules());
        $permission->update($request->all());

        return redirect('admin/permission/all/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect('admin/permission/all/edit');
    }

    public function detachRole(Permission $permission, Role $role)
    {
        $permission->roles()->detach($role->id);

        return redirect('admin/permission/all/edit');
    }

    public function attachRole(Permission $permission, Role $role)
    {
        $permission->roles()->attach($role->id);

        return redirect('admin/permission/all/edit');
    }
}
