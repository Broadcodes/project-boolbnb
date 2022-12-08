@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($apartments as $apartment)
            <li>
                <a
                    href="{{ route('ura.apartments.show', $apartment->apartment_slug) }}">{{ $apartment->apartment_title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
