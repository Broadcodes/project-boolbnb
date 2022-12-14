@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center bg_color_af p-4">
            <h3 class="text-uppercase">I tuoi appartamenti</h3>
            <p class="pt-2">Appartamenti totali: <strong>{{ $apartmentNumber }}</strong></p>
            <a class="mt-0 btn btn-outline-primary" href="{{ route('ura.apartments.create') }}">Aggiungi appartamento</a>
            <!-- CRUD create -->
        </div>



        @if ($apartmentNumber > 0)
            <!-- se l'utente possiede appartamenti visualizza questa porzione-->
            <div class="container">
                <div class="row">
                    @foreach ($apartments as $apartment)
                        {{-- contenitore card --}}
                        <div class="card_af mt-3 p-3 text-center col-4 rounded-fill">
                            <div>
                                <a href="{{ route('ura.apartments.show', $apartment->apartment_slug) }}">{{ $apartment->apartment_title }}
                                </a>
                            </div>
                            <div class="ar_contenitore_immagini">
                                <img src="" alt="">
                                <p>immagine </p>
                            </div>
                            {{-- div bottoni --}}
                            <div class="d-flex justify-content-center mt-4">
                                <a class="btn btn-primary m-1" role="button"
                                    href="{{ route('ura.apartments.edit', $apartment->apartment_slug) }}">Modifica</a>
                                <!-- CRUD edit -->
                                <form action="{{ route('ura.apartments.destroy', $apartment->apartment_slug) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger m-1" type="submit" value="Elimina">
                                    <!-- CRUD delete -->
                                </form>
                                <a class="btn btn-warning m-1" href="">Messaggi</a>
                                <!-- messages.index ? -->
                                <a class="btn btn-success m-1" href="">Sponsorizza</a> <!-- sponsors.index ? -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="row">
                <!-- se non si hanno appartamenti registrati -->
                <div class="col d-flex flex-column p-4 align-items-center py-5">
                    <h3>Non possiedi un appartamento. Inseriscine subito uno nuovo!</h3>
                    <a class="btn btn-primary my-3" href="{{ route('ura.apartments.create') }}">Aggiungi Appartamento</a>
                    <!-- CRUD create -->
                </div>
            </div>
        @endif
    </div>
@endsection
