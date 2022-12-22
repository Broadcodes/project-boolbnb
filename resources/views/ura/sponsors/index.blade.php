@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center ">Scegli il tipo di sponsorizzazione per l'appartamento "{{ $apartment->apartment_title }}":</h2>
        <hr>
        @foreach ($sponsors as $sponsor)
            <div class="my-3">
                <h4 class="my-4">Sponsorizzazione {{ $sponsor->type }} per l'appartamento:</h4>
                <p>Prezzo: &euro; {{ $sponsor->price }}</p>
                <p>Durata: {{ $sponsor->duration }} ore</p>
                <a class="btn btn-outline-success"
                    href="{{ route('ura.summary', [($id = $apartment->id), ($sponsor_id = $sponsor->id)]) }}">Scegli
                    sponsorizzazione</a>
            </div>
        @endforeach
    </div>
@endsection
