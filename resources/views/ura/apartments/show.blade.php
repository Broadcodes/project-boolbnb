@extends('layouts.app')

@section('content')
    <h1>show apartments id: {{ $apartment->id }}</h1>
    <p>
        Latitudine: {{ $apartment->latitude }}
    </p>
    <p>
        Longitudine: {{ $apartment->longitude }}
    </p>
@endsection
