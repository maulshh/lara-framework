<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;

class SettingController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->authorize('access-setting');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $settings = Setting::all();

        return view('setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name'   => 'required|max:40',
            'label'  => 'required|max:40',
            'type'   => 'required|max:40',
            'module' => 'required|max:20',
        ]);
        Setting::create($request->all());

        return redirect('/setting');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $setting
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Setting $setting) {
        return view('setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Setting $setting
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Setting $setting) {
        $this->validate($request, [
            'name'   => 'required|max:40',
            'label'  => 'required|max:40',
            'module' => 'required|max:40',
            'type'   => 'required|max:20',
        ]);
        $setting->update($request->all());

        return redirect('/setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Setting $setting) {
        $setting->delete();

        return redirect('/setting');
    }

    public function editValue($module) {
        $settings = Setting::where('module', $module)->get();

        return view('setting.edit-value', compact('settings'));
    }

    public function updateValue(Request $request) {
//        $settings = [];
        $all = array_diff_key($request->all(), ['_token' => '', '_method' => '']);
        foreach ($all as $id => $value) {
            $setting = Setting::find($id);
            $this->validate($request, [
                $id => $setting->validation_type()
            ]);
            $setting->setValue($value);
//            $settings[] = $setting;
        }
//        foreach ($settings as $setting) {
//            $setting->save();
//        }
//        commented, jika semua harus valid dulu baru melaukan save()
//        method setValue() harus diubah dahulu

        return redirect('/setting/update/global');
    }
}
