<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RolesController extends Controller
{
    public function view()
    {
        $roles = Roles::all();
        return view('SuperAdmin.Roles.index', ['data' => $roles]);
    }

    public function add()
    {
        return view('SuperAdmin.Roles.create');
    }

    public function create(Request $request)
    {
        Role::create(['name' => $request->name]);
        return redirect(url('/dapur/super/roles'))->with('created','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $roles = Roles::findOrFail($id);
        return view('SuperAdmin.Roles.edit', ['data' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $role = Roles::findOrFail($id);
        $role->name = $request->name;
        $process = $role->save();

        if ($process) {
            return redirect(url('/dapur/super/roles'))->with('updated','Data Berhasil Disimpan');
        } else {
            return back()->with('warning','Data Gagal Disimpan');
        }
    }

    public function delete($id)
    {
        $role = Roles::find($id);
        $process = $role->delete();

        if ($process) {
            return redirect(url('/dapur/super/roles'))->with('deleted','Data Berhasil Dihapus');
        } else {
            return back()->with('warning','Data Gagal Dihapus');
        }
    }

    public function getRoleServerSide()
    {
        $data = Roles::query();
        return Datatables::of($data)
            ->addColumn('name', function ($data) {
                $name = '<td>'.$data->name.'</td>';
                return $name;
            })
            ->addColumn('action', function ($data) {
                $action = '<td>
                                <a style="margin-right: 20px;" href="'.url('/dapur').'/super/roles/'.$data->id.'/edit"><i class="fa fa-edit text-primary" style="font-size: 21px;"></i></a>
                                <a style="margin-right: 10px;" href="'.url('/dapur').'/super/roles/'.$data->id.'/delete"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
                            </td>';
                return $action;
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

}
