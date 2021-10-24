<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;


class Api_PackageController extends Controller
{
    public function packagelist()
    {
        $data = Package::with('features')->get();

        return response()->json([
            'message' => 'success',
            'data' => $data,
        ]);
    }
}
