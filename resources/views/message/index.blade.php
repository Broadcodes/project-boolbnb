@extends('layouts.app')

@section('content')
    <div class="container">

        <h4>{{count($messageApartment) > 1 ? 'Ci sono ' . count($messageApartment) . ' messaggi per l\'apparamento "' . $aparment_title . '":' : 'C\'è ' . count($messageApartment) . ' messaggio per l\'apparamento "' . $aparment_title . '":'}}</h4>

        @foreach ($messageApartment as $message)
            <div class="border border-dark m-3">
                <p>ID_Appartamento: {{ $message->apartment_id }}</p>
                <p>Nome: {{ $message->name }}</p>
                <p>Email: {{ $message->email }}</p>
                <p>Messaggio: {{ $message->content_message }}</p>
            </div>
        @endforeach
    </div>

@endsection
