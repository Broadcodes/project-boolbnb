@extends('layouts.app')

@section('content')

    <div class="container">





        @if ($apartmentNumber > 0)
            <div class="text-center p-4 border-bottom">
                <h1 class="display-4">I miei annunci</h1>
                <p class="pt-2">Appartamenti totali: <strong>{{ $apartmentNumber }}</strong></p>
                <a class="mt-0 btn btn-outline-primary" href="{{ route('ura.apartments.create') }}">Aggiungi un
                    appartamento!</a>
                <!-- CRUD create -->
            </div>


            <!-- se l'utente possiede appartamenti visualizza questa porzione-->
            <div class="row">
                @foreach ($apartments as $apartment)
                    {{-- contenitore card --}}
                    <div class="col-12 col-lg-4 col-md-6 my-3">
                        <div class="card">
                            <img class="card-img-top resize-img" src="{{ asset('storage/' . $apartment->apartment_images) }}"
                                alt="{{ $apartment->apartment_title }}" />
                            <div class="card-body text-center pb-0">
                                <a href="{{ route('ura.apartments.show', $apartment->apartment_slug) }}">
                                    <h3 class="card-title text-muted">{{ substr($apartment->apartment_title, 0, 20) }}
                                        @if (strlen($apartment->apartment_title) > 20)
                                            ...
                                        @endif
                                    </h3>
                                </a>
                                <hr>
                                <p class="card-text">
                                <h5>{{ substr($apartment->description, 0, 50) }}
                                    @if (strlen($apartment->description) > 50)
                                        ...
                                    @endif
                                </h5>
                                </p>
                            </div>

                            <div class="d-flex flex-wrap justify-content-center mb-4">
                                <a href="{{ route('ura.apartments.edit', $apartment->apartment_slug) }}"> <button
                                        type="button" class="m-2 btn btn-outline-dark">
                                        <i class="fa-solid fa-pen"></i>
                                        Modifica
                                    </button></a>
                                <a href="{{ route('message.index', $apartment->apartment_slug) }}">
                                    <button id="notificationMessage-btn" type="button" class="m-2 btn btn-outline-dark">
                                        <i class="fa-solid fa-envelope"></i> Messaggi
                                        @php
                                            $numMessage = 0;
                                        @endphp
                                        @foreach ($messages as $message)
                                            @if ($message->apartment_id == $apartment->id)
                                                @if ($message->read_status == 0)
                                                    @php
                                                        $numMessage++;
                                                    @endphp
                                                @endif
                                            @endif
                                        @endforeach
                                        @if ($numMessage > 0)
                                            <span id="notificationMessage">{{ $numMessage }}</span>
                                        @endif
                                    </button>
                                </a>
                                <button type="button" class="m-2 btn btn-outline-dark" id="skin-color"> <i
                                        class="fa-regular fa-star"></i>
                                    <a href="{{ route('ura.sponsor', $apartment->id) }}">Sponsorizza</a></button>
                                <form action="{{ route('ura.apartments.destroy', $apartment->apartment_slug) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-btn m-2 btn btn-outline-dark" type="submit"><i
                                            class="fa-solid fa-trash-can"></i> Elimina</button>

                                    <!-- CRUD delete -->
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!--------------------------------------------------------------------------------------------------------------->
            @else
                <div class="row">
                    <!-- se non si hanno appartamenti registrati -->
                    <div class="col d-flex flex-column p-4 align-items-center py-5">
                        <h3>Non possiedi un appartamento. Inseriscine subito uno nuovo!</h3>
                        <a class="btn btn-primary my-3" href="{{ route('ura.apartments.create') }}">Aggiungi
                            Appartamento</a>
                        <!-- CRUD create -->
                    </div>
                </div>
        @endif
    </div>
@endsection
