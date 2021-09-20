<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema_Undangan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Api_UndanganController extends Controller
{
    public function temaundangan()
    {
        $data = Tema_Undangan::all();

        return response()->json([
            'message' => 'success',
            'data' => $data,
        ]);
    }
}
