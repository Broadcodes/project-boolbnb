<?php

namespace App\Http\Controllers\apiGuest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;




class apiCoordinateController extends Controller
{
    public function index(Request $request) {

        $data=$request->all();
        $data=88;


        return response()->json($data);


    }
}
