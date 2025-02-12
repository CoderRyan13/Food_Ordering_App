<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DriverCtrl extends Controller
{
    public function get_all_drivers(Request $request) {
        $drivers = DB::select("SELECT * FROM public.vehicle_request_drivers ORDER BY driver ASC");
        return json_encode($drivers);
    }

    public function add_driver(Request $request) {
        if ( strlen ($request->driver) == 0 ) {
            return json_encode('e');
        }

        $fields = [
            'driver' => $request->driver,
        ];

        if (DB::table('public.vehicle_request_drivers')->insert($fields)) {
            return json_encode('y');
        } else {
            return json_encode('n');
        }
    }

    public function remove_driver(Request $request) {
        $id = $request->id;

        if (DB::table('public.vehicle_request_drivers')->where('id', $id)->delete()) {
            return json_encode('y');
        } else {
            return json_encode('n');
        }
    }
}
