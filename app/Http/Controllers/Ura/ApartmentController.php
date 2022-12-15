<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        $categories = $this->categories();
        return view('ura.apartments.create', compact('categories'));
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
            'apartment_images' => 'file|max:1280',
            'apartment_images.max' => 'Inserire fino ad un massimo di :max kb',
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

        if(array_key_exists('apartment_images', $dataApartment)){
            $path_image = Storage::put('apartments_img', $dataApartment['apartment_images']);
            $dataApartment['apartment_images'] = $path_image;
        }

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

        $apartment->visible = true;
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
        $apartment->user_id = Auth::id();
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
    public function edit(Apartment $apartment)
    {
        $categories = $this->categories();
        return view('ura.apartments.edit', compact(['apartment', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
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
            'apartment_images' => 'file|max:1280',
            'apartment_images.max' => 'Inserire fino ad un massimo di :max kb',
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

        if(array_key_exists('apartment_images', $dataApartment)){
            if($apartment->apartment_images){
                Storage::delete($apartment->apartment_images);
            }
            $path_image = Storage::put('apartments_img', $dataApartment['apartment_images']);
            $dataApartment['apartment_images'] = $path_image;
        }

        if ($apartment->apartment_title != $dataApartment['apartment_title']) {
            $slug = Str::slug($apartment->apartment_title);
            $slug_base = $slug;
            $counter = 1;
            $existingPost = Apartment::where('apartment_slug', $slug)->first();
            while ($existingPost) {
                $slug =  $slug_base . '_' . $counter;
                $counter++;
                $existingPost = Apartment::where('apartment_slug', $slug)->first();
            }

            $dataApartment['slug'] = $slug;
        }

        if (
            $apartment->address !== $dataApartment['address'] || $apartment->address !== $dataApartment['civic_number'] ||
            $apartment->civic_number !== $dataApartment['postalCode'] || $apartment->postalCode !== $dataApartment['city'] ||
            $apartment->city !== $dataApartment['countrySubdivision'] || $apartment->address !== $dataApartment['countrySubdivision']
        ) {
            $url = "https://api.tomtom.com/search/2/structuredGeocode.json?key=vSAxkJlB4BU0GdRiKvwGGSjCvkYkn0qe&countryCode=IT&limit=1&ofss=0&streetNumber=" . trim(str_replace(' ', '%20', $dataApartment['civic_number'])) . "&streetName=" . trim(str_replace(' ', '%20', $dataApartment['address'])) . "&municipality=" . trim(str_replace(' ', '%20', $dataApartment['city'])) . "&countrySubdivision=" . trim(str_replace(' ', '%20', $dataApartment['countrySubdivision'])) . "&postalCode=" . trim(str_replace(' ', '%20', $dataApartment['postalCode'])) . "&mapcodes=Local,Alternative,International";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $resp = curl_exec($curl);
            $obj = json_decode($resp);

            $dataApartment['latitude'] = $obj->results[0]->position->lat;
            $dataApartment['longitude'] = $obj->results[0]->position->lon;
        }

        $dataApartment['visible'] = true;

        $apartment->update($dataApartment);

        return redirect()->route('ura.apartments.show', $apartment->apartment_slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        if($apartment->apartment_images){
            Storage::delete($apartment->apartment_images);
        }
        $apartment->delete();
        return redirect()->route('ura.apartments.index');
    }

    private function categories()
    {
        return [
            'Parchi nazionali',
            'Baite',
            'Viste mozzafiato',
            'Spazi accessibili',
            'Novità',
            'Sulle piste',
            'Case sull\'albero',
            'Design',
            'Wow!',
            'Minicase',
            'Fronte lago',
            'Castelli',
            'Piscine incredibili',
            'Campagna',
            'Luxe',
            'Dimore storiche',
            'Luoghi remoti',
            'Ville',
            'Stanze private',
            'In cima al mondo',
            'BnB',
            'Agriturismi',
            'Tropicali',
            'Spiaggia',
            'Grotte',
            'Di tendenza',
            'Città popolari',
            'Polo nord',
            'Spazi per giocare',
            'Isole',
            'Sull\'acqua',
            'Spazi creativi',
            'Case galleggianti',
            'Vigneti',
            'Iurte',
            'Case organiche',
            'Torri',
            'Cupole',
            'Fienili',
            'Ryokan',
        ];
    }
}
