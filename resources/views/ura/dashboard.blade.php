<!--
    dashboard utente registrato,
    landing page dopo il log-in
-->

@extends('layouts.app')
@section('content')
    <h1>Sei loggato nella dashboard</h1>
    <h3>Utente con id: {{ $id }}</h3>

    <a class="btn btn-success" href="{{ route('ura.apartments.index') }}">My Apartments</a>
@endsection
