@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col d-flex p-4 justify-content-around">
                <h3>I tuoi appartamenti</h3>
                <p>Appartamenti totali: <strong>{{ $apartmentNumber }}</strong></p>
            </div>
        </div>
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
                                <a class="btn btn-primary" href="">Modifica</a>
                                <a class="btn btn-danger" href="">Elimina</a>
                                <a class="btn btn-dark" href="">Messaggi</a>
                                <a class="btn btn-success" href="">Sponsorizza</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
