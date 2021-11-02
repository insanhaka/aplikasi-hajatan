<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    public function view()
    {
        $feature = Feature::all();
        return view('Backend.Feature.index', ['package' => $feature]);
    }

    public function add()
    {
        return view('Backend.Feature.create');
    }

    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        return view('Backend.Feature.edit', ['data' => $feature]);
    }

    public function update(Request $request, $id)
    {

        $messages = [
            'name.required' => 'Nama paket diisi ya..'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        } else {

            $feature = Feature::findOrFail($id);
            $feature->name     = $request->name;

            $feature->update();
            return redirect(url('/dapur/feature'))->with('success', 'Data Berhasil Diupdate');
        }
    }

    public function delete($id)
    {
        $feature = Feature::find($id);
        $process = $feature->delete();

        if ($process) {
            return redirect(url('/dapur/feature'))->with('deleted', 'Data Berhasil Dihapus');
        } else {
            return back()->with('error', 'Data Gagal Dihapus');
        }
    }


    public function create(Request $request)
    {

        $messages = [
            'name.required' => 'Nama paket diisi ya..'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        } else {

            $feature = new Feature;
            $feature->name     = $request->name;

            $feature->save();
            return redirect(url('/dapur/feature'))->with('success', 'Data Berhasil Dibuat');
        }
    }

    public function featureServerSide()
    {
        $data = Feature::query();
        return Datatables::of($data)
            ->addColumn('name', function ($data) {
                $name = '<td>' . $data->name . '</td>';
                return $name;
            })
            ->addColumn('action', function ($data) {
                $action = '<td>
                                <a style="margin-right: 20px;" href="' . url('/dapur') . '/feature/edit/' . $data->id . '"><i class="fa fa-edit text-primary" style="font-size: 21px;"></i></a>
                                <a style="margin-right: 10px;" href="' . url('/dapur') . '/feature/delete/' . $data->id . '"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
                            </td>';
                return $action;
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
