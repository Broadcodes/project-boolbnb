@extends('layouts.app')

@section('content')
    <div class="contenitore">
        <div class="text-center">
            <h1>{{ $apartment->apartment_title }}</h1>
            <div class="d-flex justify-content-center align-items-baseline pt-3">
                <i class="fa-regular fa-lightbulb light"></i>
                <p class="testo-categoria mt-4">Categoria:</p><span class="categoria">{{ $apartment->category }}</span>
            </div>
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

        {{-- prezzo --}}
        <div class="d-flex justify-content-center align-items-baseline m-3">
            <h3 class="prezzo">Prezzo a notte: <span class="price">€ {{ $apartment->price }}</span></h3>
        </div>

        <div class="background">
            {{-- stanze-letti-bagni-mq --}}
            <div class="container d-flex justify-content-around mt-5 background">
                <div class="d-flex flex-column align-items-center p-2 first-line">
                    <span><i
                            class="fa-solid fa-people-roof"></i></span><span>{{ $apartment->bedrooms }}</span><span>{{ __('Numero di stanze') }}</span>
                </div>
                <div class="d-flex flex-column align-items-center p-2 first-line">
                    <span><i
                            class="fa-solid fa-bed"></i></span><span>{{ $apartment->bed }}</span><span>{{ __('Numero di letti') }}</span>
                </div>
                <div class="d-flex flex-column align-items-center p-2 first-line">
                    <span><i
                            class="fa-solid fa-bath"></i></span><span>{{ $apartment->bathrooms }}</span><span>{{ __('Numero di bagni') }}</span>
                </div>
                <div class="d-flex flex-column align-items-center p-2 first-line">
                    <span><i
                            class="fa-solid fa-ruler"></i></span><span>{{ $apartment->sqm }}</span><span>{{ __('MQ') }}</span>
                </div>
            </div>

            {{-- indirizzo-civico-CAP-città-provincia --}}
            <div class="container d-flex justify-content-around mt-5 background">
                <div class="d-flex flex-column align-items-center p-2 first-line">
                    <span><i
                            class="fa-solid fa-location-dot"></i></span><span>{{ __('Indirizzo') }}</span><span>{{ $apartment->address }}</span>
                </div>
                <div class="d-flex flex-column align-items-center p-2 first-line">
                    <span><i
                            class="fa-solid fa-arrow-up-9-1"></i></span><span>{{ __('Civico') }}</span><span>{{ $apartment->civic_number }}</span>
                </div>
                <div class="d-flex flex-column align-items-center p-2 first-line">
                    <span><i
                            class="fa-solid fa-envelopes-bulk"></i></span><span>{{ __('CAP') }}</span><span>{{ $apartment->postalCode }}</span>
                </div>
                <div class="d-flex flex-column align-items-center p-2 first-line">
                    <span><i
                            class="fa-solid fa-city"></i></span><span>{{ __('Città') }}</span><span>{{ $apartment->city }}</span>
                </div>
                <div class="d-flex flex-column align-items-center p-2 first-line">
                    <span><i
                            class="fa-solid fa-map-location-dot"></i></span><span>{{ __('Nazione') }}</span><span>{{ $apartment->countrySubdivision }}</span>
                </div>
            </div>
        </div>

        <hr>

        <div class="text-center mt-5">
            <a href="{{ route('ura.apartments.index') }}" class="btn btn-outline-dark">Torna ai miei annunci</a>
        </div>

    </div>
@endsection
