@extends('layouts.app')
@section('content')
sei loggato
dashboard
<a href="">cerca appartamenti</a>
<a href="">sezione statistiche</a>
<a href="">messaggi</a>
<a href="">user</a>
<a href="{{route('apartments.index')}}">miei appartamenti</a>

@endsection
