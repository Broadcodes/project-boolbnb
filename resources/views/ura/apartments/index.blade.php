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
                    <div class="col-12 col-lg-4 col-md-6 my-3">
                        <div class="card">
                            <img class="card-img-top resize-img" src="{{ asset('storage/' . $apartment->apartment_images) }}"
                                alt="{{ $apartment->apartment_title }}" />
                            <div class="card-body text-center">
                                <a href="{{ route('ura.apartments.show', $apartment->apartment_slug) }}">
                                    <h3 class="card-title">{{ $apartment->apartment_title }}</h3>
                                </a>
                                <p class="card-text">
                                <h5>{{ substr($apartment->description, 0, 50) }}
                                    @if (strlen($apartment->description) > 50)
                                        ...
                                    @endif
                                </h5>
                                </p>
                            </div>
                            <div class="bottoni text-center">
                                <a href="{{ route('ura.apartments.edit', $apartment->apartment_slug) }}"> <button
                                        type="button" class="m-2 btn btn-warning bg-orange text-light"><i
                                            class="fa-solid fa-circle-info"></i>
                                        Modifica
                                    </button></a>
                                <a href="{{ route('message.index', $apartment->id) }}"><button type="button"
                                        class="m-2 btn btn-lightgreen text-light"><i class="fa-solid fa-envelope"></i>
                                        Messaggi</button></a>
                                <button type="button" class="m-2 btn btn-success"> <i class="fa-solid fa-pen"></i>
                                    Sponsorizza</button>
                                <form action="{{ route('ura.apartments.destroy', $apartment->apartment_slug) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="m-2 btn btn-danger" type="submit" value="Elimina">
                                    <!-- CRUD delete -->
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!--------------------------------------------------------------------------------------------------------------->
            @else
                <div class="row">
                    <!-- se non si hanno appartamenti registrati -->
                    <div class="col d-flex flex-column p-4 align-items-center py-5">
                        <h3>Non possiedi un appartamento. Inseriscine subito uno nuovo!</h3>
                        <a class="btn btn-primary my-3" href="{{ route('ura.apartments.create') }}">Aggiungi
                            Appartamento</a>
                        <!-- CRUD create -->
                    </div>
                </div>
        @endif
    </div>
@endsection
