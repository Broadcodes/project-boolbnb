<!--
    dashboard utente registrato,
    landing page dopo il log-in
    <a class="btn btn-success" href="{{ route('ura.apartments.index') }}">My Apartments</a>
-->

@extends('layouts.app')

@section('content')
    <div id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="nc-accountInfo d-flex">
                        <div class="nc-card d-flex flex-column align-items-center">
                            <img class="img-fluid nc-profilePic mt-3" src="{{ url('/images/profile-pic.png') }}" alt="profile pic">
                            <h3>{{ $user->name }} {{ $user->surname }}</h3>
                            <div class="personalInfo">
                                <p>
                                    <strong>Email:</strong>
                                    <span>{{ $user->email }}</span>
                                </p>
                                <p>
                                    <strong>Data di nascita:</strong>
                                    <span>{{ $user->date_of_birth }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="nc-userAction d-flex flex-column justify-content-around">
                            <div>
                                <p>
                                    Ciao, <strong>{{ $user->name }}</strong>
                                <p>
                                <h5>Su BoolBnb dal: {{ $onBoolBnb }}</h5>
                            </div>
                            <div>
                                <hr>
                                <a class="btn btn-primary my-4" href="{{ route('ura.apartments.index') }}">Miei
                                    Appartamenti</a>
                                <a class="btn btn-success mx-2">Statistiche Appartamenti</a>
                                <a class="btn btn-danger">Sponsorizza un appartamento</a>
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
