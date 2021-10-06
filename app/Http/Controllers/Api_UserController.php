<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class Api_UserController extends Controller
{
    public function simpledatauser($id)
    {
        $user = DB::table('users')
                ->where('id', '=', $id)
                ->select('name', 'username', 'email')
                ->first();

        return response()->json([
            'message' => 'success',
            'data' => $user,
        ]);
    }
}
