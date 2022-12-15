<?php

namespace App\Http\Controllers\apiGuest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\DB;



class apiCoordinateController extends Controller
{
    public function store(Request $request) {

        $coordinate=$request->all();

















        //put a temporary number in as it wont pass the lng in the JSON

        $sql="SELECT
        *
        ,((ACOS(SIN(".$coordinate['lat']." * PI() / 180) * SIN(`latitude` * PI() / 180) + COS(45.46362 * PI() / 180) * COS(`latitude` * PI() / 180) * COS((9.18812 - `longitude`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance`
        FROM `apartments`
        WHERE
        (
          `latitude` BETWEEN (45.46362 - 10) AND (45.46362 + 10)
          AND `longitude` BETWEEN (9.18812 - 10) AND (9.18812 + 10)
        )
        ORDER BY `distance` ASC
        limit 25";

        $apartments=DB::select($sql);













        return response()->json($apartments);


    }
}
