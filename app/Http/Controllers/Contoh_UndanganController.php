<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contoh_Undangan;
use App\Models\Tema_Undangan;
use Yajra\DataTables\DataTables;

class Contoh_UndanganController extends Controller
{
    public function getDataTemaServerSide()
    {
        $data = Tema_Undangan::orderBy('id', 'DESC');
        return Datatables::of($data)
            ->addColumn('code', function ($data) {
                $code = '<td>'.$data->code.'</td>';
                return $code;
            })
            ->addColumn('name', function ($data) {
                $name = '<td>'.$data->name.'</td>';
                return $name;
            })
            ->addColumn('view', function ($data) {
                $view = '<td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tema'.$data->id.'">Lihat</button> </td>';
                return $view;
            })
            ->addColumn('action', function ($data) {
                $action = '<td>
                                <a style="margin-right: 20px;" href="'.url('/dapur').'/tema-undangan/edit/'.$data->id.'"><i class="fa fa-edit text-primary" style="font-size: 21px;"></i></a>
                                <a style="margin-right: 10px;" href="'.url('/dapur').'/tema-undangan/delete/'.$data->id.'"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
                            </td>';
                return $action;
            })
            ->rawColumns(['code', 'name', 'view', 'action'])
            ->make(true);
    }

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
