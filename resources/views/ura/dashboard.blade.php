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
                        <div class="nc-card">

                        </div>
                        <div class="nc-userAction">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
