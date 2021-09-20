<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Yajra\DataTables\DataTables;

class PenggunaController extends Controller
{
    public function view()
    {
        $users = User::all();
        return view('Backend.Pengguna.index', ['data' => $users]);
    }

    public function getDataPenggunaServerSide()
    {
        $roles = Roles::where('name', 'User')->first();

        $data = User::where('roles_id', $roles->id)->orderBy('id', 'DESC');
        return Datatables::of($data)
            // ->orderColumn('owner', function ($query, $order) {
            //     $query->orderBy('owner', 'asc');
            // })
            ->addColumn('name', function ($data) {
                $name = '<td>'.$data->name.'</td>';
                return $name;
            })
            ->addColumn('username', function ($data) {
                $username = '<td>'.$data->username.'</td>';
                return $username;
            })
            ->addColumn('email', function ($data) {
                $email = '<td>'.$data->email.'</td>';
                return $email;
            })
            ->addColumn('photo', function ($data) {
                if ($data->photo == null) {
                    $photo = '<td> <img src="'.asset('assets/img/no-image.jpg').'" class="img-fluid" alt="Responsive image" width="30"> </td>';
                }else {
                    $photo = '<td> <img src="'.asset('profile_pictures/'.$data->photo).'" class="img-fluid" alt="Responsive image" width="30"> </td>';
                }
                return $photo;
            })
            ->addColumn('active', function ($data) {
                if ($data->is_active == 0) {
                    $active = '<td> <img src="'.asset('assets/img/lamp-off.png').'" class="img-fluid" alt="Responsive image" width="30"> <b>Non Aktiv</b></td>';
                }else {
                    $active = '<td> <img src="'.asset('assets/img/lamp-on.png').'" class="img-fluid" alt="Responsive image" width="30"> <b>Aktif</b></td>';
                }
                return $active;
            })
            ->addColumn('action', function ($data) {
                $action = '<td><a class="btn btn-success btn-sm" style="margin-right: 20px;" href="'.url('/dapur/pengguna/activation/?id='.$data->id.'&is_active=1').'">ON</a><a class="btn btn-secondary btn-sm" style="margin-right: 10px;" href="'.url('/dapur/pengguna/activation/?id='.$data->id.'&is_active=0').'">OFF</a></td>';
                return $action;
            })
            ->rawColumns(['name', 'username','email', 'photo', 'active', 'action'])
            ->make(true);
    }

    public function activation(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $user = User::findOrFail($id);
        $user->is_active = $request->is_active;

        $process = $user->save();

        if ($process) {
            return redirect(url('/dapur/pengguna'))->with('updated','Data Berhasil Disimpan');
        } else {
            return back()->with('error','Data Gagal Disimpan');
        }
    }
}
