<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use DB;

class Api_AuthorizeController extends Controller
{
    public function postlogin(Request $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            $user = User::where('username', $request->username)->first();
            $user_activation =  $user->is_active;

            if ($user_activation == 1)
            {
                $token = $user->createToken('Token Name')->accessToken;
                return response()->json([
                    'message' => 'success',
                    'pesan' => 'Selamat Datang '.$user->name,
                    'data' => $user,
                    'token' => $user->name.'#'.$user->id.'#'.$token
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'failed',
                    'data' => 'User Tidak Aktif',
                ]);
            }
        }
        else
        {
            return response()->json([
                'message' => 'error',
                'data' => 'Email / Password yang anda ketik tidak cocok',
            ]);
        }

    }

    public function postsignup(Request $request)
    {
        $datauser = User::all();

        $messages = [
            'email.required' => 'Masukan alamat email kamu',
            'email.email' => 'Coba cek ulang alamat email kamu, kayaknya salah',
            'password.min' => 'Password harus terdiri minimal 8 karakter',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'error',
                'data' => $validator->errors()->first()
            ]);
        }

        foreach ($datauser as $user) {
            if ($user->email == $request->email) {
                return response()->json([
                    'message' => 'error',
                    'data' => 'Email sudah terdaftar'
                ]);
            }else if ($user->username == $request->username){
                return response()->json([
                    'message' => 'error',
                    'data' => 'Username sudah terpakai'
                ]);
            }
        }

        $signup = new User;
        $signup->name = $request->name;
        $signup->username = $request->username;
        $signup->email = $request->email;
        $signup->password = bcrypt($request->password);
        $signup->is_active = 1;
        $signup->roles_id = 3;
        $signup->syncRoles('User');

        $process = $signup->save();

        if ($process) {
            return response()->json([
                'message' => 'success',
                'data' => 'Registrasi Berhasil',
            ]);
        }else {
            return response()->json([
                'message' => 'error',
                'data' => 'Upps.. Registrasi Gagal',
            ]);
        }
    }
}
