<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->authorize('access-menu');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $menus = Menu::getMenus('sidebar-admin');
        $targets = Menu::select('module_target')->distinct()->get();

        return view('menu.index', compact('menus', 'targets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'module_target' => 'required|max:40',
            'body'          => 'required|max:40',
            'position'      => 'required|max:8',
            'name'          => 'required|max:40',
            'type'          => 'required|in:default,separator,parent',
        ]);
        Menu::create($request->all());

        return redirect('/menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu) {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu) {
        $this->validate($request, [
            'module_target' => 'required|max:40',
            'body'          => 'required|max:40',
            'position'      => 'required|max:8',
            'name'          => 'required|max:40',
            'type'          => 'required|in:default,separator,parent',
        ]);
        $menu->update($request->all());

        return redirect('/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu) {
        $menu->delete();

        return redirect('/menu');
    }
}
