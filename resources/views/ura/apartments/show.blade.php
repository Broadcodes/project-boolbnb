@extends('layouts.app')

@section('content')
    <div class="title d-flex justify-content-center">
        <h1>{{ $apartment->apartment_title }}</h1>
    </div>

    <div class="containerShow d-flex p-5 ">

        <div class="text-center">

            {{-- immagine --}}
            <div class="m-5" style="width: 300px; height=800px;">
                @if ($apartment->apartment_images)
                    <img class="img-fluid w-50" src="{{ asset('storage/' . $apartment->apartment_images) }}"
                        alt="{{ $apartment->apartment_title }}" />
                @else
                    <h6 class="mx-4">{{ __('Nessuna immagine presente') }}</h6>
                @endif
            </div>
        </div>

        <div class="row mt-5">
            <div class="col4 w-25 p-2 d-flex ">

                <div class="p-2 lh-1 fw-bolder text-center">
                    <p class=" fs-2">{{ $apartment->bedrooms }} Camere</p>
                    <img class="w-25" src="https://www.svgrepo.com/show/21422/living-room.svg" alt="">
                </div>

            </div>
            <div class="col4 w-25 p-2 d-flex ">

                <div class="p-2 lh-1 fw-bolder text-center">
                    <p class="text-center fs-2">{{ $apartment->bed }} Letti</p>
                    <img class="w-25" src="https://www.svgrepo.com/show/17785/bed.svg" alt="">
                </div>
            </div>
            <div class="col4 w-25 p-2 d-flex ">

                <div class="p-2 lh-1 fw-bolder text-center">
                    <p class="text-center fs-2">{{ $apartment->bathrooms }} Bagni</p>
                    <img class="w-25" src="https://www.svgrepo.com/show/15059/bathtub.svg" alt="">
                </div>
            </div>
            <div class="col4 w-25 p-2 d-flex ">

                <div class="p-2 lh-1 fw-bolder text-center">
                    <p class="text-center fs-2">{{ $apartment->sqm }} Mq</p>
                    <img class="w-25" src="https://www.svgrepo.com/show/352332/pen-square.svg" alt="">
                </div>
            </div>
            <div class="col4 w-25 p-2  d-flex ">

                <div class="p-2 lh-1 fw-bolder text-center">
                    <img class="w-25 mb-3" src="https://www.svgrepo.com/show/98251/price-tag.svg" alt="">
                    <p class="text-center fs-2">{{ $apartment->price }} €/D</p>

                </div>
            </div>
            <div class="col4 w-25 p-2  d-flex ">

                <div class="p-2 lh-1 fw-bolder text-center">
                    <img class="w-25 mb-3" src="https://www.svgrepo.com/show/82659/mountains.svg" alt="">
                    <p class="fs-2">{{ $apartment->category }}</p>

                </div>
            </div>
            <div class="col4 w-25 p-2  d-flex ">

                <div class="p-2 lh-1 fw-bolder text-center">
                    <img class="w-25 mb-3" src="https://www.svgrepo.com/show/45412/location.svg" alt="">
                    <p class="fs-3">{{ $apartment->address }},{{ $apartment->civic_number }}</p>

                </div>
            </div>
            <div class="col4 w-25 p-2  d-flex ">

                <div class="p-2 lh-1 fw-bolder text-center">
                    <img class="w-25 mb-3" src="https://www.svgrepo.com/show/8269/location.svg" alt="">
                    <p class="text-center fs-2">{{ $apartment->postalCode }}</p>
                    <p class="fs-3">{{ $apartment->city }},{{ $apartment->countrySubdivision }}</p>

                </div>
            </div>
            <div class="col12 p-5">
                <h1>Descrizione</h1>
                <p>{{ $apartment->description }}</p>
            </div>
        </div>


    </div>
    <div class="text-center">
        <a href="{{ route('ura.apartments.index') }}" class="btn btn-primary">Torna ai miei annunci</a>
    </div>
@endsection
