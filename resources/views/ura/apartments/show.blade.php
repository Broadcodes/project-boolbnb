@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>show apartments id: {{ $apartment->id }}</h1>

        <ul class="m-5">
            <li>{{ __('Titolo annuncio') }}: {{ $apartment->apartment_title }}</li>
            <li>{{ __('Descrizione') }}: {{ $apartment->description }}</li>
            <li>{{ __('Numero di stanze') }}: {{ $apartment->bedrooms }}</li>
            <li>{{ __('Numero di letti') }}: {{ $apartment->bed }}</li>
            <li>{{ __('Numero di bagni') }}: {{ $apartment->bathrooms }}</li>
            <li>{{ __('MQ') }}: {{ $apartment->sqm }}</li>
            <li>{{ __('Categoria') }}: {{ $apartment->category }}</li>
            <li>{{ __('Prezzo') }}: {{ $apartment->price }}</li>
            <li>{{ __('Immagine') }}: {{ $apartment->apartment_images }}</li>
            <li>{{ __('Indirizzo') }}: {{ $apartment->address }}</li>
            <li>{{ __('Civico') }}: {{ $apartment->civic_number }}</li>
            <li>{{ __('CAP') }}: {{ $apartment->postalCode }}</li>
            <li>{{ __('Città') }}: {{ $apartment->city }}</li>
            <li>{{ __('Provincia') }}: {{ $apartment->countrySubdivision }}</li>
            <li>{{ __('Longitudine') }}: {{ $apartment->longitude }}</li>
            <li>{{ __('Latitudine') }}: {{ $apartment->latitude }}</li>
        </ul>

        <a href="{{ route('ura.apartments.index') }}">Torna ai miei annunci</a>
    </div>
@endsection
