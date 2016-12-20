<?php

namespace App\Http\Controllers;

use App\Alamat;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, Alamat::getRules());
        $user->addAlamat($request->all());

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if (!$alamat = $user->alamats()->find($id))
            return abort(404);

        $this->validate($request, Alamat::getRules());

        $alamat->update($request->all());
        if ($request->input('set_default'))
            $user->setDefaultAlamat($alamat->id);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
