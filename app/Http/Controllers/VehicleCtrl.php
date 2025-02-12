<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VehicleCtrl extends Controller
{
    public function get_all_vehicles(Request $request) {
        $vehicles = DB::select("SELECT * FROM public.vehicle_request_vehicles ORDER BY vehicle ASC");
        return json_encode($vehicles);
    }

    public function add_vehicle(Request $request) {
        if ( strlen ($request->vehicle) == 0 || strlen ($request->vehicle_number) == 0 ) {
            return 'All fields required';
        }

        $fields = [
            'vehicle'            => $request->vehicle,
            'vehicle_number'     => $request->vehicle_number,
        ];

        if (DB::table('public.vehicle_request_vehicles')->insert($fields)) {
            return json_encode('y');
        } else {
            return json_encode('n');
        }
    }

    public function remove_vehicle(Request $request) {
        $id = $request->id;

        if (DB::table('public.vehicle_request_vehicles')->where('id', $id)->delete()) {
            return json_encode('y');
        } else {
            return json_encode('n');
        }
    }
}
