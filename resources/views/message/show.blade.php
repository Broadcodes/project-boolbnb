@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <div class="py-3 ">
            <div class="mx-4 d-flex px-4 border-bottom border-secondary align-items-center">
                <h5 class="mt-2"><i class="fa-solid fa-user"></i></h5>
                <h5 class="testoMess mt-2 mx-3">{{ $message->name }}</h5>
            </div>
            <div class="mx-4 mt-3 d-flex px-4 border-bottom border-secondary">
                <h4 class="mt-2"><i class="fa-solid fa-at"></i></h4>
                <h4 class="testoMess mt-2 mx-3">{{ $message->email }}</h4>
            </div>
            <div class="mx-4 mt-3 d-flex px-4 border-bottom border-secondary">
                <h4 class="mt-2"><i class="fa-solid fa-calendar"></i></h4>
                <h4 class="testoMess mt-2 mx-3">{{ $message->created_at }}</h4>
            </div>
        </div>

        <div class="my-5 py-3 border-bottom border-secondary">
            <div class="mx-4 px-4 py-3">
                <h5 class="mb-5 text-secondary">Messaggio:</h5>
                <h4 class="areaMessaggioTesto testoMess mt-2 mx-3">{{ $message->content_message }} </h4>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="my-1 mx-2">
                <a href="{{ route('ura.apartments.index') }}"><input class="btn btn-outline-dark" type="button" value="Torna indietro"></a>
            </div>
            <div class="my-1 mx-2">
                <form action="{{ route('message.destroy', $message->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-outline-danger" type="submit" value="Elimina Messaggio">
                </form>
            </div>
        </div>

    </div>
@endsection
