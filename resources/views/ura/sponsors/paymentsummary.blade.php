@extends('layouts.app')

@section('content')
    <div id="paymentSummary">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="nc-CardContainer d-flex justify-content-center">
                        <div class="nc-card text-center">
                            <h3 class="mb-4">Transazione eseguita con successo</h3>
                            <div>
                                <label for="">
                                    <div class="checkIcon">

                                    </div>
                                </label>
                                <div class="paymentInfo">
                                    <div><strong>ID transazione:</strong> {{ $paymentInfo->id }}</div>
                                    <div><strong>Totale:</strong> {{ $paymentInfo->currencyIsoCode }}
                                        {{ $paymentInfo->amount }}
                                    </div>
                                    <p>
                                        L'appartamento <strong>{{ $apartment->apartment_title }}</strong> sarà sponsorizzato
                                        per
                                        {{ $sponsor->duration }} ore
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col text-center">
                <button class="btn btn-primary my-4 redirect">
                    <a href="{{ route('ura.home') }}">Torna alla DashBoard</a>
                </button>
            </div>
        </div>
    </div>
@endsection
