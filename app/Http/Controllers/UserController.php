<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Users\Biodata;
use App\Users\Role;
use App\Users\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:manage-user', ['except' => ['profile', 'update', 'changePassword', 'updatePassword']]);
    }

    public function profile($username = null)
    {
        $user = Auth::user();

        if ($username == null)
            $profile = $user->load('biodata');
        else
            $profile = User::with('biodata')
                ->where('username', $username)->first();

        if ($profile)
            return view('user.profile', compact('profile', 'user'));
        else
            return abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param User $user
     * @internal param int $id
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        //update table user
        $this->validate($request, User::getRules(['email' => $user->id, 'username' => $user->id]));

        $user->update($request->all());

        //update table biodata
        $this->validate($request, Biodata::getRules());
        if ($request->file('avatar-file') && $request->file('avatar-file')->isValid()) {

            $img = Image::make($request->file('avatar-file'));
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->resizeCanvas(200, 200);

            $img->save("images/user/$user->id.jpg");

            $user->biodata->avatar = "/images/user/$user->id.jpg";
        } elseif ($request->file('avatar'))
            $user->biodata->avatar = $request->file('avatar');

        $user->biodata->update(array_merge([
            'birthday' => Carbon::create($request->input('bday_yy'), $request->input('bday_mm'), $request->input('bday_dd'))], $request->only([
            'nama',
            'no_telp',
            'jenis_kelamin',
            'bio'
        ])));
        flash('Profil kamu berhasil diubah!', 'Selesai');

        return back();
    }

    public function changePassword()
    {
        $user = Auth::user();

        return view('user.password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, ['password_new' => 'required|min:8', 'password' => 'required']);
        $user = Auth::user();
        if (!Hash::check($request->input('password'), $user->getAuthPassword())) {
            flash("Password yang anda masukkan salah!", 'Peringatan', 'danger');

        } else if (!Hash::check($request->input('password_new'), $user->getAuthPassword())) {
            flash("Password kamu sudah diubah");

            $user->password = bcrypt($request->input('password_new'));
            $user->save();

        } else
            flash('Maaf, password yang kamu masukkan sama dengan sebelumnya!', 'Gagal!', 'info');

        return back();
    }


//ADMIN

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function admin()
    {
        $user = Auth::user();

        return view('user.admins', compact('user'));
    }

    /**
     * Jadikan sebagai role
     *
     * @param User $user
     * @param $role
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function attachRole(User $user, $role)
    {
        $admin = Auth::user();
        if (!$role = Role::getId($role))
            flash('Role tidak ditemukan!');
        else if (!$user->roles()->find($role) && $role >= $admin->roles[0]->id) {
            $user->roles()->attach($role);
            flash('Berhasil!');
        } else
            flash('Anda tidak punya wewenang!', 'Peringatan', 'danger');

        return back();
    }

    /**
     * Pecat role user
     *
     * @param User $user
     * @param $role
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function detachRole(User $user, $role)
    {
        $admin = Auth::user();
        if (!$role = Role::getId($role))
            flash('Role tidak ditemukan!');
        else if ($user->roles()->find($role) && $role > $admin->roles[0]->id &&
            (!$user->hasRole('webmaster') || $admin->hasRole('webmaster'))
        ) {
            $user->roles()->detach($role);
            flash('Berhasil!');
        } else
            flash('Anda tidak punya wewenang!', 'Peringatan', 'danger');

        return back();
    }

    /**
     * Ban user
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(User $user)
    {
        if (!$user->roles()->find(Role::getId('admin')) && !$user->roles()->find(Role::getId('webmaster'))) {
            $user->updateStatus(-1);
            flash('User berhasil di blokir');
        } else
            flash('Admin tidak bisa di blokir! Anda tidak punya wewenang!', 'Peringatan!', 'danger');

        return back();
    }

    /**
     * Unban user
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param User $user
     * @internal param int $id
     */
    public function unDestroy(User $user)
    {
        if ($user->status == -1)
            $user->updateStatus(1);

        return back();
    }


//API
    /**
     * @param Request $request
     * @param string $role
     * @return mixed
     */
    public function api(Request $request, $role = 'all')
    {

        $filters = explode(' ', trim($request->get('filter')));

        $users = User::with('biodata', 'roles')
            ->join('biodatas', 'biodatas.id', '=', 'users.id')
            ->select('username', 'email', 'users.id', 'users.created_at', 'biodatas.nama', 'status')
            ->when($request->get('sort'), function ($query) use ($request) {
                $sort = explode('|', $request->get('sort'));

                return $query->orderBy($sort[0], $sort[1]);
            })->when($role == 'all', function ($query) {
                return $query->join('role_user', function ($join) {
                    $join->on('role_user.user_id', '=', 'users.id')
                        ->where('role_user.role_id', '=', Role::getId('user'));
                });
            })->when($role != 'all', function ($query) use ($role) {
                return $query->join('role_user', function ($join) use ($role) {
                    $join->on('role_user.user_id', '=', 'users.id')
                        ->where('role_user.role_id', '=', Role::getId($role));
                });
            })->when($request->get('filter'), function ($query) use ($filters) {
                foreach ($filters as $like) {
                    $query->where(function ($query) use ($like) {
                        $query->where('biodatas.nama', 'like', "%$like%")
                            ->orWhere('users.username', 'like', "%$like%")
                            ->orWhere('users.email', 'like', "%$like%");
                    });
                }

                return $query;
            })
//            ->toSql();
            ->paginate($request->get('per_page', 15));

//        dd($users);

        return $users;
    }
}
