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
                            <img class="nc-profilePic mt-3" src="{{ url('/images/profile-pic.png') }}" alt="profile pic">
                            <h3>Nicola Caddeo</h3>
                            <div class="personalInfo">
                                <p>
                                    <strong>Email:</strong>
                                    <span>nicola.caddeo58@gmail.com</span>
                                </p>
                                <p>
                                    <strong>Data di nascita:</strong>
                                    <span>11/09/1999</span>
                                </p>
                            </div>
                        </div>
                        <div class="nc-userAction">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
