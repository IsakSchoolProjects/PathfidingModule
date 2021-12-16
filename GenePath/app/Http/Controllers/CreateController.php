<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CreateController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();

        $insert = DB::insert(   
            'INSERT INTO `worlds` (`world_name`, `world_type`, `rooms`, `init_range`, `factor`, `x_rooms`,`y_rooms`) values ( ?, ?, ?, ?, ?, ?, ? )', [$data["worldname"] ? : null, $data["type"] ? : null, (int)$data["rooms"] ? : null, $data["initrange"] ? : null, $data["factor"] ? : null, $data["xrooms"] ? : null, $data["yrooms"] ? : null]
        );

        return dd($data);
        
        // return view('edit');
    }
}
