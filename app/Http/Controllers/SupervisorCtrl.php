<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupervisorCtrl extends Controller
{
    public function get_all_supervisors(Request $request) {
        $supervisors = DB::select("SELECT * FROM public.vehicle_request_supervisors ORDER BY supervisor ASC");
        return json_encode($supervisors);
    }

    public function add_supervisor(Request $request) {
        if ( strlen ($request->supervisor) == 0 || strlen ($request->supervisor_email) == 0 ) {
            return json_encode('e');
        }

        $fields = [
            'supervisor'       => $request->supervisor,
            'supervisor_email' => $request->supervisor_email,
        ];

        if (DB::table('public.vehicle_request_supervisors')->insert($fields)) {
            return json_encode('y');
        } else {
            return json_encode('n');
        }
    }

    public function remove_supervisor(Request $request) {
        $id = $request->id;

        if (DB::table('public.vehicle_request_supervisors')->where('id', $id)->delete()) {
            return json_encode('y');
        } else {
            return json_encode('n');
        }
    }
}
