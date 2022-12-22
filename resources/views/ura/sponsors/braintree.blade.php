@extends('layouts.app')

@section('content')
    <div class="container" id="posizione">

            <form id="payment-form" action="{{ route('ura.process', [($id = $apartment->id), ($sponsor_id = $sponsor->id)]) }}">
                @csrf
                @method('GET')
                <div id="dropin-container"></div>
                <button class="bg-btn m-2 btn btn-outline-success" type="submit"><i class="fa-solid fa-check"></i> Conferma</button>


                <input type="hidden" id="nonce" name="payment_method_nonce" />
            </form>

            <a id="posizione2" href="{{route('homePage')}}"><button class="bg-btn m-2 btn btn-outline-danger" type="submit"><i class="fa-solid fa-xmark"></i> Torna alla home</button></a>

    </div>

    <script>
        var form = document.querySelector('#payment-form');


        braintree.dropin.create({
            authorization: "{{ $clientToken }}",
            container: '#dropin-container'
        }, (error, dropinInstance) => {
            if (error) console.error(error);
            form.addEventListener('submit', event => {
                event.preventDefault();
                dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) console.error(error);
                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection

