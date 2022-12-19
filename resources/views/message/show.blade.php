@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <div class="py-3 bg-message">
            <div class="mx-4 d-flex px-4">
                <h4 class="mt-2 text-primary">Mittente:</h4>
                <h4 class="testoMess mt-2 mx-3">{{ $message->name }}</h4>
            </div>
            <div class="mx-4 d-flex px-4">
                <h4 class="mt-2 text-primary">Email:</h4>
                <h4 class="testoMess mt-2 mx-3">{{ $message->email }}</h4>
            </div>
        </div>

        <div class="my-5 py-3 bg-message">
            <div class="mx-4 px-4 py-3">
                <h4 class="mt-2 text-primary">Messaggio:</h4>
                <h4 class="areaMessaggioTesto testoMess mt-2 mx-3">{{ $message->content_message }} </h4>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="my-1 mx-2">
                <a href="{{ route('ura.apartments.index') }}"><input class="btn btn-primary" type="button" value="Torna indietro"></a>
            </div>
            <div class="my-1 mx-2">
                <form action="{{ route('message.destroy', $message->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Elimina Messaggio">
                </form>
            </div>
        </div>

    </div>
@endsection
