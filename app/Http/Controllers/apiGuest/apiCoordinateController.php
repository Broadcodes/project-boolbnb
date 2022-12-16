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


        $radius=10;
















        //put a temporary number in as it wont pass the lng in the JSON

        $sql="SELECT
        *,
        (
            3959 *
            acos(
                cos( radians( " . $coordinate['lat'] . " ) ) *
                cos( radians( `latitude` ) ) *
                cos(
                    radians( `longitude` ) - radians( " . $coordinate['lng'] . " )
                ) +
                sin(radians(" . $coordinate['lat'] . ")) *
                sin(radians(`latitude`))
            )
        ) `distance`
    FROM
        `apartments`
    HAVING
        `distance` < " . $radius . "
    ORDER BY
        `distance`
    LIMIT
        25";

        $apartments=DB::select($sql);

        $data=array($apartments,$coordinate);













        return response()->json($data);


    }
}
