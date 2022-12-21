@extends('layouts.app')

@section('content')
    <div class="py-12">
        <form id="payment-form" action="{{ route('ura.process', [($id = $apartment->id), ($sponsor_id = $sponsor->id)]) }}">
            @csrf
            @method('GET')
            <div id="dropin-container"></div>
            <input type="submit">
            <input type="hidden" id="nonce" name="payment_method_nonce" />
        </form>
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
