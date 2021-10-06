<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contoh_Undangan;
use App\Models\Tema_Undangan;
use Yajra\DataTables\DataTables;

class Contoh_UndanganController extends Controller
{
    public function view()
    {
        $contoh = Contoh_Undangan::all();
        return view('Backend.Contoh_Undangan.index', ['contoh_undangan' => $contoh]);
    }

    public function add()
    {
        $tema_undangan = Tema_Undangan::all();
        return view('Backend.Contoh_Undangan.create', ['theme' => $tema_undangan]);
    }
}
