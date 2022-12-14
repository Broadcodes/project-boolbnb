@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col d-flex p-4 justify-content-around">
                <h3>I tuoi appartamenti</h3>
                <div class="d-flex generalInfo">
                    <p>Appartamenti totali: <strong>{{ $apartmentNumber }}</strong></p>
                    <a href="{{ route('ura.apartments.create') }}">Aggiungi appartamento</a> <!-- CRUD create -->
                </div>
            </div>
        </div>
        @if ($apartmentNumber > 0)
            <!-- se l'utente possiede appartamenti visualizza questa porzione-->
            <div class="row">
                <div class="col">
                    <div class="cardsContainer d-flex flex-column align-items-center">
                        @foreach ($apartments as $apartment)
                            <div class="apartmentCard p-3 d-flex justify-content-between align-items-center">
                                <div class="apartmentTitle w-50">
                                    <a href="{{ route('ura.apartments.show', $apartment->apartment_slug) }}">{{ $apartment->apartment_title }}
                                    </a>
                                </div>
                                <div class="userActions w-50">
                                    <a class="btn btn-primary"
                                        href="{{ route('ura.apartments.edit', $apartment->apartment_slug) }}">Modifica</a>
                                    <!-- CRUD edit -->
                                    <form action="{{ route('ura.apartments.destroy', $apartment->apartment_slug) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Elimina"
                                            onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                        <!-- CRUD delete -->
                                    </form>
                                    <a class="btn btn-dark" href="">Messaggi</a> <!-- messages.index ? -->
                                    <a class="btn btn-success" href="">Sponsorizza</a> <!-- sponsors.index ? -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--------------------------------------------------------------------------------------------------------------->
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
