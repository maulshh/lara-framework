<?php

namespace App\Http\Controllers;

use App\Users\Permission;
use App\Users\Role;
use Illuminate\Http\Request;

use App\Http\Requests;

class PermissionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->authorize('access-permission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $roles = Role::all();
        $permissions = Permission::all();
        $editable = false;

        return view('permission.index', compact('roles', 'permissions', 'editable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name'  => 'required|max:40',
            'label' => 'required|max:40',
        ]);
        Permission::create($request->all());

        return redirect('/permission/all/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if ($id == "all") {
            $roles = Role::all();
            $permissions = Permission::all();
            $editable = true;

            return view('permission.index', compact('roles', 'permissions', 'editable'));
        } else {
            $permission = Permission::find($id);

            return view('permission.edit', compact('permission'));
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
    public function update(Request $request, Permission $permission) {
        $this->validate($request, [
            'name'  => 'required|max:40',
            'label' => 'required|max:40',
        ]);
        $permission->update($request->all());

        return redirect('/permission/all/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Permission $permission) {
        $permission->delete();

        return redirect('/permission/all/edit');
    }

    public function detachRole(Permission $permission, Role $role) {
        $permission->roles()->detach($role->id);

        return redirect('/permission/all/edit');
    } 
    
    public function attachRole(Permission $permission, Role $role) {
        $permission->roles()->attach($role->id);

        return redirect('/permission/all/edit');
    }
}
