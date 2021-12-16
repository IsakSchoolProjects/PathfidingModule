<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CreateController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();

        $insert_world = DB::insert(   
            'INSERT INTO `worlds` (`world_name`, `world_type`, `rooms`, `init_range`, `factor`, `x_rooms`,`y_rooms`) values ( ?, ?, ?, ?, ?, ?, ? )', [$data["worldname"] ? : null, $data["type"] ? : null, (int)$data["rooms"] ? : null, $data["initrange"] ? : null, $data["factor"] ? : null, $data["xrooms"] ? : null, $data["yrooms"] ? : null]
        );

        $newest_world_id = DB::select( 
            'SELECT `id` FROM `worlds` WHERE `world_name` LIKE ?', [$data["worldname"] ? : null]
        );

        $room_count = 0;

        foreach (json_decode($data["_rooms"]) as $room)
        {
            $insert_rooms = DB::insert(   
                'INSERT INTO `rooms` (`room_id`, `room_name`, `world_id`, `exits`) values ( ?, ?, ?, ? )', [$room_count, $room->name ? : null, (int)$newest_world_id[0]->id ? : null, substr(json_encode($room->exits) ? : null, 1, -1)]
            );

            $room_count++;
        }

        return dd($data);
        
        // return view('edit');
    }
}
