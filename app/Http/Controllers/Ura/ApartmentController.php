<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedUser = Auth::id();
        $apartments = Apartment::where('user_id', $loggedUser)->get();
        $apartmentNumber = count($apartments);

       return view('ura.apartments.index', compact('apartments', 'apartmentNumber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ura.apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'apartment_title' => 'required|max:255|string',
            'description' => 'required|string',
            'bedrooms' => 'max:10|numeric',
            'bed' => 'max:10|numeric',
            'bathrooms' => 'max:10|numeric',
            'sqm' => 'max:999.99|numeric',
            'category' => 'max:255|string',
            'price' => 'max:999999.99|numeric',
            'visible' => 'boolean',
            'apartment_images' => 'file|max:1080',
            'address' => 'max:255|string',
            'civic_number' => 'numeric',
            'city' => 'max:255|string',
            'countrySubdivision' => 'max:255|string',
            'postalCode' => 'max:5|string'
        ], [
            'required' => 'Il campo è obbligatorio',
            'min' => 'Inserire un valore che abbia :min carattere',
            'max' => 'Inserire fino ad un massimo di :max caratteri',
            'string' => 'Il campo deve essere un testo',
            'numeric' => 'Il campo deve essere un numero',
            'boolean' => 'Il campo può avere solo un valore: selezionato o deselezionato',
            'file' => 'Il campo deve essere un file',
        ]);

        $dataApartment = $request->all();

        $url = "https://api.tomtom.com/search/2/structuredGeocode.json?key=vSAxkJlB4BU0GdRiKvwGGSjCvkYkn0qe&countryCode=IT&limit=1&ofss=0&streetNumber=" . trim(str_replace(' ', '%20', $dataApartment['civic_number'])) . "&streetName=" . trim(str_replace(' ', '%20', $dataApartment['address'])) . "&municipality=" . trim(str_replace(' ', '%20', $dataApartment['city'])) . "&countrySubdivision=" . trim(str_replace(' ', '%20', $dataApartment['countrySubdivision'])) . "&postalCode=" . trim(str_replace(' ', '%20', $dataApartment['postalCode'])) . "&mapcodes=Local,Alternative,International";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        $obj = json_decode($resp, true);

        $apartment = new Apartment();
        $apartment->fill($dataApartment);


        $apartment->visible = 0;  //test


        $slug = Str::slug($apartment->apartment_title);
        $slug_base = $slug;
        $counter = 1;
        $existingApartment = Apartment::where('apartment_slug', $slug)->first();
        while ($existingApartment) {
            $slug = $slug_base . '_' . $counter;
            $counter++;
            $existingApartment = Apartment::where('apartment_slug', $slug)->first();
        }
        $apartment->apartment_slug = $slug;

        $apartment->latitude = $obj['results'][0]['position']['lat'];
        $apartment->longitude = $obj['results'][0]['position']['lon'];
        $apartment->save();

        return redirect()->route('ura.apartments.show', $apartment->apartment_slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('ura.apartments.show', compact('apartment'));
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
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('ura.apartments.index');
    }
}
