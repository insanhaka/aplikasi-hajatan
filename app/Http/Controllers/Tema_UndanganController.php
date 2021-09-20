<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema_Undangan;

class Tema_UndanganController extends Controller
{
    public function view()
    {
        $undangan = Tema_Undangan::orderBy('id', 'DESC')->get();
        return view('Backend.Tema_Undangan.index', ['data' => $undangan]);
    }

    public function add()
    {
        return view('Backend.Tema_Undangan.create');
    }

    public function create(Request $request)
    {
        // dd($request->all());

        $create = new Tema_Undangan;
        $create->title = $request->title;
        $create->description = $request->description;
        $create->is_active = 1;

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture');
        if($file == null){
            $nama_file = "";
            $create->picture = $nama_file;
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'tema_undangan';
            $file->move($tujuan_upload,$nama_file);
            $create->picture = $nama_file;
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
        $file = $request->file('picture');

        $content = Tema_Undangan::findOrFail($id);

        if($file == null){
            $content->title = $request->title;
            $content->description = $request->description;
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
            $content->title = $request->title;
            $content->description = $request->description;
            $content->picture = $nama_file;
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

    public function activation(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $content = Tema_Undangan::findOrFail($id);
        $content->is_active = $request->is_active;

        $process = $content->save();
    }
}
