<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:access-setting', ['except' => ['updateValue', 'editValue']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $settings = Setting::all();

        return view('setting.index', compact('settings', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('setting.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Setting::getRules());
        Setting::create($request->all());

        return redirect('admin/setting');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $setting
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Setting $setting)
    {
        $user = Auth::user();

        return view('setting.edit', compact('setting', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Setting $setting
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Setting $setting)
    {
        $this->validate($request, Setting::getRules());
        $setting->update($request->all());

        return redirect('admin/setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();

        return redirect('admin/setting');
    }

    public function editValue($module)
    {
        $user = Auth::user();

        if (!$user->can('access-setting'))
            $this->authorize('update-setting-' . $module);

        $settings = Setting::where('module', $module)->get();

        return view('setting.edit-value', compact('settings', 'all_setting', 'user'));
    }

    public function modules()
    {
        $user = Auth::user();

        $modules = Setting::select('module')->distinct()->get();

        return view('setting.list_module', compact('modules', 'user'));
    }

    public function updateValue(Request $request, $module)
    {
        $user = Auth::user();

        if (!$user->can('access-setting'))
            $this->authorize('update-setting-' . $module);

        $all = array_diff_key($request->all(), ['_token' => '', '_method' => '']);
        foreach ($all as $id => $value) {
            $setting = Setting::find($id);
            $this->validate($request, [
                $id => $setting->validationType()
            ]);
            if($setting->setValue($value)) {
                flash("Setting $setting->label tidak memiliki tipe yang benar!!");
                return back();
            }
        }

        return redirect('admin/setting/' . $request->segment(3) . '/update');
    }
}
