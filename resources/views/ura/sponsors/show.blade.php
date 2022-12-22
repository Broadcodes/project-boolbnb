@extends('layouts.app')
<!-- In questa pagina avviene la conferma del pagamento -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <p>
                    Hai selezionato il piano <strong>{{ $sponsor->type }}</strong> <br>
                    al costo di &euro;{{ $sponsor->price }} e della durata di {{ $sponsor->duration }} ore, <br>
                    per l'appartamento "{{ $apartment->apartment_title }}"
                </p>
                <button>
                    <a href="{{ route('ura.token', [($id = $apartment->id), ($sponsor_id = $sponsor->id)]) }}">Paga</a>
                </button>
            </div>
        </div>
    </div>
@endsection
