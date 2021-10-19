<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthorizeController extends Controller
{
    public function login()
    {
    	return view('Auth.login');
    }

    public function postlogin(Request $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            $user = User::where('username', $request->username)->first();
            $user_activation =  $user->is_active;
            $user_role =  $user->roles_id;

            if ($user_activation == 1 && $user_role !== 3)
            {
                return redirect()->route('home');
            }
            else
            {
                return redirect()->route('notactive');
            }
        }
        else
        {
            return redirect()->route('login')
            ->with('error','Email/Password yang anda masukan salah');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function signup()
    {
        return view('Auth.register');
    }

    public function postsignup(Request $request)
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
            $signup = new User;
            $signup->name = $request->name;
            $signup->username = $request->username;
            $signup->email = $request->email;
            $signup->password = bcrypt($request->password);
            $signup->is_active = $request->is_active;

            $signup->save();
            return redirect()->back()->with('success', 'Berhasil');
        }

    }

    public function notactive()
    {
    	return view('Auth.activation');
    }

    public function hapusadmin(Request $request)
    {
        $admin = User::find($request->id);
        $admin->delete();
        return redirect()->route('pengaturan');
    }
}
