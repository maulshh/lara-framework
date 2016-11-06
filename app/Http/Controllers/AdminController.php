<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view-dashboard');
    }

    public function index()
    {
        $user = Auth::user();
        $banners = Setting::where('name', 'banners')->first();

        return view('home', compact('user', 'banners'));
    }

    public function uploadImage(Request $request)
    {
        $this->authorize('change-banner');

        /* * Todo
         * Buat file uploader yang otomatis resize, rename, watermark, sesuai dengan setting yang diupload pengguna.
         * */

        if ($request->file('image')->isValid()) {
            $img = Image::make($request->file('image'));
            $img->resize($request->input('width', 300), $request->input('height', null), function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            if ($img->save($request->input('path', 'images/uploads'). '/' .$request->input('name'))) {
                flash('Upload sukses!', 'Berhasil!');
            } else
                flash('Maaf, image gagal diupload.', 'Upload gagal!', 'info');
        } else
            flash('Maaf, image yang diupload tidak sesuai', 'Upload gagal!', 'info');

        return back();
    }
}
