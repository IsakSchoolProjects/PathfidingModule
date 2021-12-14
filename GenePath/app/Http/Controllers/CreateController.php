<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();

        return view('view')->with('data', $data);
    }
}
