<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Feature;
use stdClass;

class Api_PackageController extends Controller
{
    public function packagelist()
    {
        $data = Package::with('features')->get();
        $features = Feature::get();
        $packages = array();

        foreach ($data as $package) {
            $item = new stdClass();
            $item->id = $package->id;
            $item->name = $package->name;
            $item->features = array();
            foreach ($features as $feature) {
                $ft = new stdClass();
                $ft->id = $feature->id;
                $ft->name = $feature->name;
                if (($package->features)->contains('id', $feature->id)) {
                    $ft->status = true;
                } else {
                    $ft->status = false;
                }
                array_push($item->features, $ft);
            }

            array_push($packages, $item);
        }
        return $packages;
        return response()->json([
            'message' => 'success',
            'data' => $packages,
        ]);
    }
}
