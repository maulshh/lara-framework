<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Menu;
use App\Users\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:access-menu');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::getMenus('sidebar-admin');
        $targets = Menu::select('module_target')->distinct()->get();
        $user = Auth::user();

        return view('menu.index', compact('menus', 'targets', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('menu.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Menu::getRules());

        $menu = Menu::create($request->all());

        $this->attachRole($request, $menu);

        return redirect('admin/menu');
    }

    /**
     * @param $request
     * @param Menu $menu
     */
    private function attachRole($request, Menu $menu)
    {
        $to_attach = $request->only(Role::getNames());
        $menu->roles()->detach();
        foreach ($to_attach as $key => $value)
            if ($value != null)
                $menu->roles()->attach($value);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $user = Auth::user();

        return view('menu.edit', compact('menu', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, Menu::getRules());

        $menu->update($request->all());

        $this->attachRole($request, $menu);

        return redirect('admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('admin/menu');
    }

    public function menuList($module)
    {
        $menus = Menu::getMenus($module);

        return view('menu.editlist', compact('menus'));
    }
}
