@extends('layouts.app')

@section('content')
    @foreach ($messages as $message)
        @if ($id_apartment == $message->apartment_id)
            <div class="border border-dark m-3">
                <p>ID_Appartamento: {{ $message->apartment_id }}</p>
                <p>Nome: {{ $message->name }}</p>
                <p>Email: {{ $message->email }}</p>
                <p>Messaggio: {{ $message->content_message }}</p>
            </div>
        @endif
    @endforeach
@endsection
