<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('SuperAdmin.Profile.index', ['data' => $user]);
    }

    public function editprofile($id)
    {
        $user = User::findOrFail($id);
        return view('SuperAdmin.Profile.edit', ['data' => $user]);
    }

    public function updateprofile(Request $request, $id)
    {
        $file = $request->file('gambar');
        $pass = $request->password;

        $user = User::findOrFail($id);

        switch (true) {

            case ($file == null && $pass == null):
                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/user/'.$id.'/profile'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            case ($file == null):
                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->password = bcrypt($request->password);

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/user/'.$id.'/profile'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            case ($pass == null):
                $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'profile_pictures';
                $file->move($tujuan_upload,$nama_file);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->photo = $nama_file;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/user/'.$id.'/profile'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            default:
                $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'profile_pictures';
                $file->move($tujuan_upload,$nama_file);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->password = bcrypt($request->password);
                $user->photo = $nama_file;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/user/'.$id.'/profile'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }
                break;

        }
    }

    public function index()
    {
        $users_count = User::all()->count();
        return view('SuperAdmin.Settings.index', ['tot_use'=> $users_count]);
    }

    public function view()
    {
        $users = User::all();
        return view('SuperAdmin.Users.index', ['data' => $users]);
    }

    public function add()
    {
        $roles = Roles::all();
        return view('SuperAdmin.Users.create', ['roles' => $roles] );
    }

    public function create(Request $request)
    {
        // dd($request->username);

        $get_user = User::all();

        foreach ($get_user as $user) {
            if ($user->email == $request->email) {
                return redirect()->back()->with('error', 'Email sudah terdaftar');
            }elseif ($user->username == $request->username) {
                return redirect()->back()->with('error', 'Username sudah terdaftar');
            }
        }

        $messages = [
            'name.required' => 'Nama Lengkap diisi ya..',
            'username.required' => 'Username Diisi dong..',
            'email.required' => 'Email aktiv kamu dicantumkan ya..',
            'email.email' => 'Coba cek lagi emailnya, kayaknya salah..',
            'password.required' => 'Password diisi dong..',
            'password.min' => 'Password diisi minimal 8 karakter ya..',
        ];

        $validator = Validator::make( $request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], $messages );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }else {

            $roles_id = $request->roles_id;

            $signup = new User;
            $signup->name = $request->name;
            $signup->username = $request->username;
            $signup->email = $request->email;
            $signup->password = bcrypt($request->password);
            $signup->is_active = 1;
            $role = Roles::findOrFail($roles_id);
            $signup->syncRoles($role->name);
            $signup->roles_id = $roles_id;

            $signup->save();
            return redirect(url('/dapur/super/view'))->with('success','Data Berhasil Dibuat');
        }

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Roles::all();
        return view('SuperAdmin.Users.edit', ['data' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $roles_id = $request->roles_id;
        $file = $request->file('gambar');
        $pass = $request->password;

        $user = User::findOrFail($id);

        switch (true) {

            case ($file == null && $pass == null):
                $user->name = $request->name;
                $user->email = $request->email;
                $role = Roles::findOrFail($roles_id);
                $user->syncRoles($role->name);
                $user->roles_id = $roles_id;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/super/view'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            case ($file == null):
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $role = Roles::findOrFail($roles_id);
                $user->syncRoles($role->name);
                $user->roles_id = $roles_id;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/super/view'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            case ($pass == null):
                $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'profile_pictures';
                $file->move($tujuan_upload,$nama_file);
                $user->name = $request->name;
                $user->email = $request->email;
                $role = Roles::findOrFail($roles_id);
                $user->syncRoles($role->name);
                $user->roles_id = $roles_id;
                $user->photo = $nama_file;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/super/view'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            default:
                $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'profile_pictures';
                $file->move($tujuan_upload,$nama_file);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $role = Roles::findOrFail($roles_id);
                $user->syncRoles($role->name);
                $user->roles_id = $roles_id;
                $user->photo = $nama_file;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/super/view'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }
                break;

        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $process = $user->delete();

        if ($process) {
            return redirect(url('/dapur/super/view'))->with('deleted','Data Berhasil Dihapus');
        } else {
            return back()->with('error','Data Gagal Dihapus');
        }
    }

    public function activation(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $user = User::findOrFail($id);
        $user->is_active = $request->is_active;

        $process = $user->save();
    }

}
