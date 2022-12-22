<?php

namespace App\Http\Controllers\apiGuest;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Carbon;

class apiGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array=array();

        $apartments = Apartment::all();
        foreach($apartments as $apartment){
            foreach($apartment->sponsors as $sponsoredApartment ){
                array_push($array, $sponsoredApartment->pivot->apartment_id);


            }
        }
        $dataToVue=array();
        $apartmentsToShow = Apartment::all()->whereIn('id', $array);
        foreach($apartmentsToShow as $apartment){
            foreach($apartment->sponsors as $apartmentSponsor){
                if(!($apartmentSponsor->pivot->end_date <= Carbon::now())){
                    array_push($dataToVue,$apartment);

                }
            }
        }













        try{


            $data = [
                'results' => $dataToVue,

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
