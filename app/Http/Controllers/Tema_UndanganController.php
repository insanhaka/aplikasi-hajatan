<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema_Undangan;
use Yajra\DataTables\DataTables;

class Tema_UndanganController extends Controller
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
        $tema = Tema_Undangan::all();
        return view('Backend.Tema_Undangan.index', ['tema_undangan' => $tema]);
    }

    public function add()
    {
        return view('Backend.Tema_Undangan.create');
    }

    public function create(Request $request)
    {
        // dd($request->all());

        $create = new Tema_Undangan;
        $create->name = $request->name;
        $create->code = $request->code;

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('thumbnail');
        if($file == null){
            $nama_file = "";
            $create->thumbnail = $nama_file;
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'tema_undangan';
            $file->move($tujuan_upload,$nama_file);
            $create->thumbnail = $nama_file;
        }

        $process = $create->save();
        if ($process) {
            return redirect(url('/dapur/tema-undangan'))->with('created','Data Berhasil Disimpan');
        } else {
            return back()->with('warning','Data Gagal Disimpan');
        }
    }

    public function edit($id)
    {
        $content = Tema_Undangan::findOrFail($id);
        // dd($content);
        return view('Backend.Tema_Undangan.edit', ['data' => $content]);
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('thumbnail');

        $content = Tema_Undangan::findOrFail($id);

        if($file == null){
            $content->name = $request->name;
            $content->code = $request->code;
            $process = $content->save();
            if ($process) {
                return redirect(url('/dapur/tema-undangan'))->with('updated','Data Berhasil Disimpan');
            } else {
                return back()->with('warning','Data Gagal Disimpan');
            }
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'tema_undangan';
            $file->move($tujuan_upload,$nama_file);
            $content->name = $request->name;
            $content->code = $request->code;
            $content->thumbnail = $nama_file;
            $process = $content->save();
            if ($process) {
                return redirect(url('/dapur/tema-undangan'))->with('updated','Data Berhasil Disimpan');
            } else {
                return back()->with('warning','Data Gagal Disimpan');
            }
        }

    }

    public function delete($id)
    {
        $content = Tema_Undangan::find($id);
        $process = $content->delete();

        if ($process) {
            return redirect(url('/dapur/tema-undangan'))->with('deleted','Data Berhasil Dihapus');
        } else {
            return back()->with('warning','Data Gagal Dihapus');
        }
    }
}
