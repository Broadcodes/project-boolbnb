@extends('layouts.app')

@section('content')
    <h4 class="text-primary mb-3 mx-5">
        {{ count($messageApartment) > 0 ? 'Ci sono ' . count($messageApartment) . ' messaggi per l\'apparamento "' . $aparment_title . '":' : 'Non ci sono messaggi per l\'apparamento "' . $aparment_title . '":' }}
    </h4>
    @if (count($messageApartment) > 0)
        <div class="containerMessageIndex">
            <div class="areaMessages">
                @foreach ($messageApartment as $message)
                    <div class="cardsMessages">
                        <div class="d-flex">
                            <h3 class="mr-3">Mittente:</h3>
                            <h3 class="text-secondary">{{ $message->name }}</h3>
                        </div>
                        <div class="d-flex my-3">
                            <h3 class="mr-3">Email:</h3>
                            <h3 class="text-secondary">{{ $message->email }}</h3>
                        </div>
                        <div>
                            <h3>Messaggio:</h3>
                            <div class="areaMessageText mt-3">
                                <p class="text-secondary">{{ $message->content_message }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
