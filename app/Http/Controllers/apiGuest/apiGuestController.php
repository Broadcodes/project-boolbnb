<?php

namespace App\Http\Controllers\apiGuest;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use App\Apartment;


class apiGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$lat=$request->lat();
        $apartments = Apartment::all();

        try{


            $data = [
                'results' => $apartments,
                'success' => true
            ];
        }catch(Error $e){
            $data = [
                'error' => $e->message,
                'success' => false
            ];
        }
       // return request()->json($lat);
        return response()->json($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $apartments = Apartment::where('apartment_slug', $slug)->first();

        $data = [
            'results' => $apartments,
            'success' => isset($apartments)
        ];
        return response()->json($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
