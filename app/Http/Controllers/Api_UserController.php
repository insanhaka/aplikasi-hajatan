<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Api_UserController extends Controller
{
    public function simpledatauser($email)
    {
        $user = DB::table('users')
                ->where('email', '=', $email)
                ->select('name', 'username', 'email')
                ->first();

        return response()->json([
            'message' => 'success',
            'data' => $user,
        ]);
    }
}
