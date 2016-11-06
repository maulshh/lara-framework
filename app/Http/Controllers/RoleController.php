<?php

namespace App\Http\Controllers;

use App\Users\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
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

        return view('role.index', compact('roles', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('role.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Role::getRules());
        Role::create($request->all());

        return redirect('permission/all/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Role $role)
    {
        $user = Auth::user();

        return view('role.edit', compact('role', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, Role::getRules());
        $role->update($request->all());

        return redirect('admin/permission/all/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect('admin/permission/all/edit');
    }
}
