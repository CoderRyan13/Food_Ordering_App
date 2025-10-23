<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MenuCtrl extends Controller
{
    public function recieve_orders(Request $request) {
        $orders = DB::select("SELECT * FROM public.midway_orders WHERE is_done = FALSE AND created_on::date = CURRENT_DATE ORDER BY created_on ASC");
        return json_encode($orders);
    }

    public function recieve_Allorders(Request $request) {
        $orders = DB::select("SELECT * FROM public.midway_orders ORDER BY created_on DESC");
        return json_encode($orders);
    }

    public function save_order(Request $request) {
        date_default_timezone_set("America/Belize");
        if ( strlen ($request->table_number) == 0 || strlen ($request->item_count) == 0 || strlen ($request->cost_total) == 0 || count ($request->orders) == 0) {
            return json_encode('e');
        }

        // Forces UTF-8 Encoding 
        $orders = $request->orders;
        array_walk_recursive($orders, function (&$item) {
            if (is_string($item)) {
                $item = mb_convert_encoding($item, 'UTF-8', 'UTF-8');
            }
        });

        $fields = [
            'table_number'  => $request->table_number,
            'item_count'    => $request->item_count,
            'cost_total'    => $request->cost_total,
            'orders'        => json_encode($orders, JSON_UNESCAPED_UNICODE),
        ];

        if (DB::table('public.midway_orders')->insert($fields)) {
            return json_encode('y');
        } else {
            return json_encode('n');
        }
    }

    public function remove_order(Request $request) {
        $id = $request->id;
        $fields = [
            'is_done'  => true,
        ];

        if (DB::table('public.midway_orders')->where('id', $id)->update($fields)) {
            return json_encode('y');
        } else {
            return json_encode('n');
        }
    }
}
