@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center p-4">
            <h1 class="display-5">I tuoi appartamenti</h1>
            <p class="pt-2">Appartamenti totali: <strong>{{ $apartmentNumber }}</strong></p>
            <a class="mt-0 btn btn-primary" href="{{ route('ura.apartments.create') }}">Aggiungi un appartamento!</a>
            <!-- CRUD create -->
        </div>



        @if ($apartmentNumber > 0)
            <!-- se l'utente possiede appartamenti visualizza questa porzione-->
                <div class="row">
                    @foreach ($apartments as $apartment)
                        {{-- contenitore card --}}
                        <div class="col-12 col-lg-4 col-md-6  my-3">
                            <div class="card">
                                <img class="card-img-top" src="../images/campeggio-italia.webp" alt="immagine">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Appartamento</h5>
                                        <p class="card-text">
                                            <a href="{{ route('ura.apartments.show', $apartment->apartment_slug) }}">{{ $apartment->apartment_title }}
                                        </p>
                                    </div>
                                    <div class="bottoni text-center p-3">
                                        <a href="{{ route('ura.apartments.edit', $apartment->apartment_slug) }}"> <button type="button" class="btn btn-warning bg-orange text-light"><i class="fa-solid fa-circle-info"></i>
                                            Modifica
                                        </button></a>
                                        <button type="button" class="btn btn-lightgreen text-light"><i class="fa-solid fa-envelope"></i> Messaggi</button>
                                        <button type="button" class="btn btn-success"> <i class="fa-solid fa-pen"></i> Sponsorizza</button>
                                        <form action="{{ route('ura.apartments.destroy', $apartment->apartment_slug) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger m-1" type="submit" value="Elimina">
                                            <!-- CRUD delete -->
                                        </form>
                                    </div>
                            </div>
                        </div>
                    @endforeach
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
