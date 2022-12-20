@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>{{ $apartment->apartment_title }}</h1>

            {{-- immagine --}}
            <div class="m-5">
                @if ($apartment->apartment_images)
                    <img class="img-fluid w-50" src="{{ asset('storage/' . $apartment->apartment_images) }}"
                        alt="{{ $apartment->apartment_title }}" />
                @else
                    <h6 class="mx-4">{{ __('Nessuna immagine presente') }}</h6>
                @endif
            </div>
        </div>

        {{-- elenco voci --}}
        <ul class="m-5 list-group">
            <li class="list-group-item">{{ __('Titolo annuncio') }}: <span
                    class="brown">{{ $apartment->apartment_title }}</span></li>
            <li class="list-group-item">{{ __('Descrizione') }}: <span class="brown">{{ $apartment->description }}</span>
            </li>
            <li class="list-group-item">{{ __('Numero di stanze') }}: <span class="brown">{{ $apartment->bedrooms }}</span>
            </li>
            <li class="list-group-item">{{ __('Numero di letti') }}: <span class="brown">{{ $apartment->bed }}</span>
            </li>
            <li class="list-group-item">{{ __('Numero di bagni') }}: <span
                    class="brown">{{ $apartment->bathrooms }}</span></li>
            <li class="list-group-item">{{ __('MQ') }}: <span class="brown">{{ $apartment->sqm }}</span></li>
            <li class="list-group-item">{{ __('Categoria') }}: <span class="brown">{{ $apartment->category }}</span></li>
            <li class="list-group-item">{{ __('Prezzo a Notte') }}: <span class="brown">{{ $apartment->price }}</span></li>
            <li class="list-group-item">{{ __('Indirizzo') }}: <span class="brown">{{ $apartment->address }}</span></li>
            <li class="list-group-item">{{ __('Civico') }}: <span class="brown">{{ $apartment->civic_number }}</span>
            </li>
            <li class="list-group-item">{{ __('CAP') }}: <span class="brown">{{ $apartment->postalCode }}</span></li>
            <li class="list-group-item">{{ __('Città') }}: <span class="brown">{{ $apartment->city }}</span></li>
            <li class="list-group-item">{{ __('Provincia') }}: <span
                    class="brown">{{ $apartment->countrySubdivision }}</span></li>
            <li class="list-group-item">{{ __('Longitudine') }}: <span class="green">{{ $apartment->longitude }}</span>
            </li>
            <li class="list-group-item">{{ __('Latitudine') }}: <span class="green">{{ $apartment->latitude }}</span>
            </li>
        </ul>

        <div class="text-center">
            <a href="{{ route('ura.apartments.index') }}" class="btn btn-primary">Torna ai miei annunci</a>
        </div>

    </div>
@endsection
