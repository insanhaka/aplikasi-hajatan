<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Models\Package;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;


class PackageController extends Controller
{
    public function view()
    {
        $package = Package::all();
        return view('SuperAdmin.Package.index', ['package' => $package]);
    }

    public function add()
    {
        return view('SuperAdmin.Package.create');
    }

    public function create(Request $request)
    {

        $messages = [
            'name.required' => 'Nama paket diisi ya..',
            'price.required' => 'Harga Diisi dong..'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        } else {

            $package = new Package;
            $package->name     = $request->name;
            $package->price    = $request->price;
            $package->discount = $request->discount;
            $package->best     = $request->best;
            $package->premium  = $request->premium;

            $package->save();
            return redirect(url('/dapur/package'))->with('success', 'Data Berhasil Dibuat');
        }
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('SuperAdmin.Package.edit', ['data' => $package]);
    }

    public function update(Request $request, $id)
    {

        $messages = [
            'name.required' => 'Nama paket diisi ya..',
            'price.required' => 'Harga Diisi dong..'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        } else {

            $package = Package::findOrFail($id);
            $package->name     = $request->name;
            $package->price    = $request->price;
            $package->discount = $request->discount;
            $package->best     = $request->best;
            $package->premium  = $request->premium;

            $package->update();
            return redirect(url('/dapur/package'))->with('success', 'Data Berhasil Diupdate');
        }
    }

    public function delete($id)
    {
        $package = Package::find($id);
        $process = $package->delete();

        if ($process) {
            return redirect(url('/dapur/package'))->with('deleted', 'Data Berhasil Dihapus');
        } else {
            return back()->with('error', 'Data Gagal Dihapus');
        }
    }

    public function save_feature(Request $request)
    {
        $package_id = $request->input('package_id');
        $feature_id = $request->input('feature_id');
        $checked = $request->input('checked');
        $package = Package::where('id', $package_id)->first();
        if ($checked == 'true') {
            $package->features()->attach([$feature_id]);
            echo gettype($checked);
        } else {
            $package->features()->detach([$feature_id]);
            echo 'delete';
        }
    }

    public function packageServerSide()
    {
        $data = Package::query();
        return Datatables::of($data)
            ->addColumn('name', function ($data) {
                $name = '<td>' . $data->name . '</td>';
                return $name;
            })
            ->addColumn('price', function ($data) {
                $price = '<td>' . $data->price . '</td>';
                return $price;
            })
            ->addColumn('discount', function ($data) {
                $discount = '<td>' . $data->discount . '</td>';
                return $discount;
            })
            ->addColumn('best', function ($data) {
                $best = '<td>' . $data->best . '</td>';
                return $best;
            })
            ->addColumn('premium', function ($data) {
                $premium = '<td>' . $data->premium . '</td>';
                return $premium;
            })
            ->addColumn('action', function ($data) {
                $action = '<td>
                                <a title="EDIT" style="margin-right: 20px;" href="' . url('/dapur') . '/package/edit/' . $data->id . '"><i class="fa fa-edit text-primary" style="font-size: 21px;"></i></a>
                                <a title="DELETE" style="margin-right: 10px;" href="' . url('/dapur') . '/package/delete/' . $data->id . '"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
                                <a title="FEATURE" style="margin-right: 10px;" href="' . url('/dapur') . '/package/features/' . $data->id . '"><i class="fa fa-list-alt text-primary" style="font-size: 21px;"></i></a>
                            </td>';
                return $action;
            })
            ->rawColumns(['name', 'price', 'discount', 'best', 'premium', 'action'])
            ->make(true);
    }

    public function features($id)
    {
        $features = Feature::all();
        $package_features = Package::find($id);
        return view('SuperAdmin.Package.features', ['features' => $features, 'package_features' => $package_features]);
    }
}
