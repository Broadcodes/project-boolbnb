<?php

namespace App\Http\Controllers\apiGuest;

use App\Http\Controllers\Controller;
use App\Message;
use App\Apartment;
use Illuminate\Http\Request;

class messageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Apartment $apartment)
    {
        $slug_apartment = $_SERVER['REQUEST_URI'];        //passare lo slug
        $slug_apartment = substr(strstr($slug_apartment, '?'), 1);

        $apartment->messages;
        $messages = Message::all();
        $apartments = Apartment::all();
        $messageApartment = [];
        $aparment_title = '';
        $id_apartment = '';

        foreach ($apartments as $apartment) {
            if ($slug_apartment == $apartment->apartment_slug) {
                $aparment_title = $apartment->apartment_title;
                $id_apartment = $apartment->id;
            }
        }

        if(count($messages) > 0){
            foreach ($messages as $message) {
                if ($id_apartment == $message->apartment_id) {
                    array_push($messageApartment, $message);
                }
            }
        }

        return view('message.index', compact(['messageApartment', 'aparment_title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataMessage = $request->all();

        $message = new Message();
        $message->fill($dataMessage);
        $message->save();

        return redirect()->route('homePage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        dd($message);
        return view('ura.apartments.show', compact('message'));
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
