@extends('layouts.app')

@section('content')
    <h4 class="text-secondary mt-4 mx-5">
        {{ count($messageApartment) > 0 ? 'Ci sono ' . count($messageApartment) . ' messaggi per l\'apparamento "' . $aparment_title . '":' : 'Non ci sono messaggi per l\'apparamento "' . $aparment_title . '":' }}
    </h4>
    @if (count($messageApartment) > 0)
        <div class="container">
            <div class="border border-dark my-5 p-4">
                @foreach ($messageApartment as $message)
                    <div class="d-flex align-items-center">
                        @if ($message->read_status == 0)
                            <img class="imgMessage" src="../images/email.png" alt="New message">
                        @else
                            <img class="imgMessage" src="../images/email_letta.png" alt="Message read">
                        @endif

                        <a href="{{ route('message.show', $message->id) }}"><h5 class="pt-2 mx-3">{{ $message->name }} - {{ $message->email }}</h5></a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="my-5 text-center">
        <a href="{{ route('ura.apartments.index') }}"><input class="btn btn-primary" type="button" value="Torna indietro"></a>
    </div>
@endsection
