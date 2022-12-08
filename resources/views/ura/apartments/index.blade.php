@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($apartments as $apartment)
            <li>
                <a href="{{ route('ura.apartments.show', $apartment->id) }}">{{ $apartment->apartment_title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
