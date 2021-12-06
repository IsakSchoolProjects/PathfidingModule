<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class LoadController extends Controller
{
    public function ShowWorlds()
    {
        $worlds = DB::select(DB::raw("SELECT * FROM worlds ORDER BY id ASC"));

        $data = [];

        foreach ($worlds as $world)
        {
            $world = (object) array(
                'id' => $world->id,
                'name' => $world->world_name,
                'type' => $world->world_type,
                'date' => $world->date_created,
                'rooms' => $count = DB::table('rooms')->where('world_id', '=', $world->id)->count()
            );

            array_push($data, $world);
        }

        return view('load')->with('worlds', $data);
    }
}