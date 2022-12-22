@extends('layouts.app')
<!-- In questa pagina avviene la conferma del pagamento -->
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="text-center my-4 border p-4 w-50">
                <h4>
                    Hai selezionato il piano <strong>{{ $sponsor->type }}</strong> <br>
                    al costo di &euro; {{ $sponsor->price }} e della durata di {{ $sponsor->duration }} ore, <br>
                    per l'appartamento "{{ $apartment->apartment_title }}"
                </h4>

                    <a class="btn btn-outline-success mt-3" href="{{ route('ura.token', [($id = $apartment->id), ($sponsor_id = $sponsor->id)]) }}">Conferma e Paga</a>



            </div>
        </div>
    </div>
@endsection
