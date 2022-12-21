@extends('layouts.app')

@section('content')
    <h2>Scegli il tipo di sponsorizzazione per l'appartamento "{{ $apartment->apartment_title }}":</h2>
    @foreach ($sponsors as $sponsor)
        <div>
            <h4>Sponsorizzazione {{ $sponsor->type }} per l'appartemento:</h4>
            <p>Prezzo: &euro;{{ $sponsor->price }}</p>
            <p>Durata: {{ $sponsor->duration }} ore</p>
            <a class="btn btn-primary"
                href="{{ route('ura.summary', [($id = $apartment->id), ($sponsor_id = $sponsor->id)]) }}">Scegli
                sponsorizzazione</a>
        </div>
    @endforeach
@endsection
