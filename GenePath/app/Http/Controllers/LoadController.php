<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class LoadController extends Controller
{
    public function ShowWorlds()
    {
        $worlds = DB::select(DB::raw("SELECT id, world_name AS name, world_type AS type, date_created AS date FROM `worlds` ORDER BY id ASC"));

        $data = [];

        foreach ($worlds as $world)
        {
            $world->rooms = DB::table('rooms')->where('world_id', '=', $world->id)->count();

            array_push($data, $world);
        }

        return view('load')->with('worlds', $data);
    }

    public function ShowRooms($id)
    {
        $worldId = (int)$id;
        
        $rooms = DB::select(DB::raw("SELECT rooms.id, room_name AS name, exits, cost FROM rooms LEFT JOIN worlds ON worlds.id = rooms.world_id WHERE worlds.id = $worldId"));
        // Gets worldName where id = worldId
        $world = DB::select(DB::raw("SELECT world_name AS name, world_type AS type FROM `worlds` WHERE id = $id"));
        
        return view('edit')->with('rooms', $rooms)->with('world', $world);
    }
}