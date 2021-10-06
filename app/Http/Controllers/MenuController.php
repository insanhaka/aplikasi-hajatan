<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
    public function view()
    {
        $menus = Menu::all();
        return view('SuperAdmin.Menu.index', ['data' => $menus]);
    }

    public function add()
    {
        $menus = Menu::where('type', 'parent')->get();
        return view('SuperAdmin.Menu.create', ['data' => $menus]);
    }

    public function create(Request $request)
    {
        $create = new Menu;
        $create->name = $request->name;
        $create->uri = $request->uri;
        $create->type = $request->type;
        $create->parent_id = $request->parent_id;
        $create->is_active = $request->is_active;

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
        if($file == null){
            $nama_file = "";
            $create->icon = $nama_file;
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'menus_icon';
            $file->move($tujuan_upload,$nama_file);
            $create->icon = $nama_file;
        }

        $create->save();
        return redirect(url('/dapur/super/menu'))->with('created','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $menus = Menu::findOrFail($id);
        return view('SuperAdmin.Menu.edit', ['data' => $menus]);
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('gambar');

        $menus = Menu::findOrFail($id);

        if($file == null){
            $menus->name = $request->name;
            $menus->uri = $request->uri;
            $menus->is_active = $request->is_active;
            $process = $menus->save();
            if ($process) {
                return redirect(url('/dapur/super/menu'))->with('updated','Data Berhasil Disimpan');
            } else {
                return back()->with('warning','Data Gagal Disimpan');
            }
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'menus_icon';
            $file->move($tujuan_upload,$nama_file);
            $menus->name = $request->name;
            $menus->uri = $request->uri;
            $menus->is_active = $request->is_active;
            $menus->icon = $nama_file;
            $process = $menus->save();
            if ($process) {
                return redirect(url('/dapur/super/menu'))->with('updated','Data Berhasil Disimpan');
            } else {
                return back()->with('warning','Data Gagal Disimpan');
            }
        }

    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        $process = $menu->delete();

        if ($process) {
            return redirect(url('/dapur/super/menu'))->with('deleted','Data Berhasil Dihapus');
        } else {
            return back()->with('warning','Data Gagal Dihapus');
        }
    }

    public function activation(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $menus = Menu::findOrFail($id);
        $menus->is_active = $request->is_active;

        $process = $menus->save();
        if ($process) {
            return redirect(url('/dapur/super/menu'))->with('updated','Data Berhasil Disimpan');
        } else {
            return back()->with('error','Data Gagal Disimpan');
        }
    }

    public function getMenuServerSide()
    {
        $data = Menu::query();
        return Datatables::of($data)
        // ->orderColumn('owner', function ($query, $order) {
        //     $query->orderBy('owner', 'asc');
        // })
        ->addColumn('name', function ($data) {
            $name = '<td>'.$data->name.'</td>';
            return $name;
        })
        ->addColumn('uri', function ($data) {
            $uri = '<td>'.$data->uri.'</td>';
            return $uri;
        })
        ->addColumn('icon', function ($data) {
            if ($data->icon == null) {
                $icon = '<td> <img src="'.asset('assets/img/no-image.jpg').'" class="img-fluid" alt="Responsive image" width="30"> </td>';
            }else {
                $icon = '<td> <img src="'.asset('menus_icon/'.$data->icon).'" class="img-fluid" alt="Responsive image" width="30"> </td>';
            }
            return $icon;
        })
        ->addColumn('active', function ($data) {
            if ($data->is_active == 0) {
                $active = '<td> <a class="btn btn-secondary btn-sm" style="margin-right: 10px;" href="'.url('/dapur/menu/activation/?id='.$data->id.'&is_active=1').'"><i class="fa fa-toggle-off" aria-hidden="true"></i> OFF</a></td>';
            }else {
                $active = '<td> <a class="btn btn-success btn-sm" style="margin-right: 20px;" href="'.url('/dapur/menu/activation/?id='.$data->id.'&is_active=0').'"><i class="fa fa-toggle-on" aria-hidden="true"></i> ON</a> </td>';
            }
            return $active;
        })
        ->addColumn('action', function ($data) {
            $action = '<td>
                            <a style="margin-right: 20px;" href="'.url('/dapur').'/super/menu/'.$data->id.'/edit"><i class="fa fa-edit text-primary" style="font-size: 21px;"></i></a>
                            <a style="margin-right: 10px;" href="'.url('/dapur').'/super/menu/'.$data->id.'/delete"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
                        </td>';
            return $action;
        })
        ->rawColumns(['name', 'uri', 'icon', 'active', 'action'])
        ->make(true);
    }
}
