@extends('layouts.app')

@section('content')
    <h4 class="container text-secondary mt-4 ">
        {{ count($messageApartment) > 0 ? 'Ci sono ' . count($messageApartment) . ' messaggi per l\'apparamento "' . $aparment_title . '":' : 'Non ci sono messaggi per l\'apparamento "' . $aparment_title . '":' }}
    </h4>
    @if (count($messageApartment) > 0)
        <div class="container text-secondary">
            <div class="my-5 p-3">
                @foreach ($messageApartment as $message)
                    <div class="d-flex align-items-center border-bottom border-dark p-1">
                        @if ($message->read_status == 0)
                            <i class="fa-solid fa-envelope fa-2xl text-dark"></i>
                            <a href="{{ route('message.show', $message->id) }}"><h5 class="pt-2 mx-3 text-dark">{{ $message->name }} - {{ $message->email }}</h5></a>

                        @else
                            <i class="fa-solid fa-envelope-open fa-2xl text-secondary"></i>
                        <a href="{{ route('message.show', $message->id) }}"><h5 class="pt-2 mx-3 text-secondary">{{ $message->name }} - {{ $message->email }}</h5></a>

                        @endif


                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="my-5 text-center">
        <a href="{{ route('ura.apartments.index') }}"><input class="btn btn-outline-dark" type="button" value="Torna indietro"></a>
    </div>
@endsection
