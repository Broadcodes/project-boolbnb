@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Codice univoco struttura: {{ $apartment->id }}</h1>

        {{-- immagine --}}
        <div class="m-5">
            @if ($apartment->apartment_images)
                <img class="img-fluid w-50" src="{{ asset('storage/' . $apartment->apartment_images) }}"
                    alt="{{ $apartment->apartment_title }}" />
            @else
                <h6 class="mx-4">{{ __('Nessuna immagine presente') }}</h6>
            @endif
        </div>

        {{-- elenco voci --}}
        <ul class="m-5 list-group">
            <li class="list-group-item">{{ __('Titolo annuncio') }}: {{ $apartment->apartment_title }}</li>
            <li class="list-group-item">{{ __('Descrizione') }}: {{ $apartment->description }}</li>
            <li class="list-group-item">{{ __('Numero di stanze') }}: {{ $apartment->bedrooms }}</li>
            <li class="list-group-item">{{ __('Numero di letti') }}: {{ $apartment->bed }}</li>
            <li class="list-group-item">{{ __('Numero di bagni') }}: {{ $apartment->bathrooms }}</li>
            <li class="list-group-item">{{ __('MQ') }}: {{ $apartment->sqm }}</li>
            <li class="list-group-item">{{ __('Categoria') }}: {{ $apartment->category }}</li>
            <li class="list-group-item">{{ __('Prezzo') }}: {{ $apartment->price }}</li>
            <li class="list-group-item">{{ __('Indirizzo') }}: {{ $apartment->address }}</li>
            <li class="list-group-item">{{ __('Civico') }}: {{ $apartment->civic_number }}</li>
            <li class="list-group-item">{{ __('CAP') }}: {{ $apartment->postalCode }}</li>
            <li class="list-group-item">{{ __('Città') }}: {{ $apartment->city }}</li>
            <li class="list-group-item">{{ __('Provincia') }}: {{ $apartment->countrySubdivision }}</li>
            <li class="list-group-item">{{ __('Longitudine') }}: {{ $apartment->longitude }}</li>
            <li class="list-group-item">{{ __('Latitudine') }}: {{ $apartment->latitude }}</li>
        </ul>

        <a href="{{ route('ura.apartments.index') }}" class="btn btn-primary">Torna ai miei annunci</a>
    </div>
@endsection
