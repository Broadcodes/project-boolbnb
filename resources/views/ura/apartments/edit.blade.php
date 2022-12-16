@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <form action="{{ route('ura.apartments.update', $apartment->apartment_slug) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- titolo annuncio --}}
            <div class="p-3">
                <label class="px-2 fs-1 form-label" for="apartment_title">{{ __('Titolo annuncio') }}</label>
                <input type="text" class="form-control" name="apartment_title" id="apartment_title" required
                    maxlength="255" value="{{ old('apartment_title', $apartment->apartment_title) }}">
                @error('apartment_title')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            {{-- categoria --}}
            <div class="p-3">
                <label class="px-2" for="category">{{ __('Categoria') }}</label>
                <select name="category" class="form-control" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                            {{ $category }}</option>
                    @endforeach
                </select>
                @error('category')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            {{-- descrizione --}}
            <div class="p-3">
                <label class="px-2" for="description">{{ __('Descrizione') }}</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10"> {{ old('description', $apartment->description) }} </textarea>
                @error('description')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            {{-- stanze-letti-bagni --}}

            <div class="d-flex">
                {{-- stanze --}}
                <div class="p-3">
                    <label class="px-2" for="bedrooms">{{ __('Numero di stanze') }}</label>
                    <select name="bedrooms" class="form-control" id="bedrooms">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ old('bedrooms') == $i ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                    @error('bedrooms')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- letti --}}
                <div class="p-3">
                    <label class="px-2" for="bed">{{ __('Numero di letti') }}</label>
                    <select name="bed" class="form-control" id="bed">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ old('bed') == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                    @error('bed')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- bagni --}}
                <div class="p-3">
                    <label class="px-2" for="bathrooms">{{ __('Numero di bagni') }}</label>
                    <select name="bathrooms" class="form-control" id="bathrooms">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ old('bathrooms') == $i ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                    @error('bathrooms')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
            </div>

            {{-- mq-prezzo --}}
            <div class="d-flex">
                {{-- mq --}}
                <div class="p-3 d-flex align-items-baseline">
                    <label class="px-2" for="sqm">{{ __('MQ') }}</label>
                    <input type="number" class="form-control" name="sqm" id="sqm" step=".01"
                        value="{{ old('sqm', $apartment->sqm) }}">
                    @error('sqm')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- prezzo --}}
                <div class="p-3 d-flex align-items-baseline">
                    <label class="px-2" for="price">{{ __('Prezzo') }}</label>
                    <input type="number" class="form-control" name="price" id="price" step=".01"
                        value="{{ old('price', $apartment->price) }}">
                    @error('price')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
            </div>

            {{-- immagine --}}
            <div class="p-3">
                <div>
                    @if ($apartment->apartment_images)
                        <img class="img-fluid w-50" src="{{ asset('storage/' . $apartment->apartment_images) }}"
                            alt="{{ $apartment->apartment_title }}" />
                    @else
                        <h6 class="mx-4">{{ __('Nessuna immagine presente') }}</h6>
                    @endif
                </div>
                <div class="mt-4">
                    <label class="px-2" for="apartment_images">{{ __('Inserisci un\'immagine->') }}</label>
                    <input type="file" name="apartment_images" id="apartment_images"
                        value="{{ old('apartment_images', $apartment->apartment_images) }}">

                    @error('apartment_images')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
            </div>

            {{-- indirizzo-civico-CAP-città-provincia --}}
            <div class="d-flex">
                {{-- indirizzo --}}
                <div class="p-3">
                    <label class="px-2" for="address">{{ __('Indirizzo') }}</label>
                    <input type="text" class="form-control" name="address" id="address"
                        value="{{ old('address', $apartment->address) }}">
                    @error('address')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- civico --}}
                <div class="p-3">
                    <label class="px-2" for="civic_number">{{ __('Civico') }}</label>
                    <input type="number" class="form-control" name="civic_number" id="civic_number"
                        value="{{ old('civic_number', $apartment->civic_number) }}">
                    @error('civic_number')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- CAP --}}
                <div class="p-3">
                    <label class="px-2" for="postalCode">{{ __('CAP') }}</label>
                    <input type="text" class="form-control" name="postalCode" id="postalCode" maxlength='5'
                        value="{{ old('postalCode', $apartment->postalCode) }}">
                    @error('postalCode')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- città --}}
                <div class="p-3">
                    <label class="px-2" for="city">{{ __('Città') }}</label>
                    <input type="text" class="form-control" name="city" id="city"
                        value="{{ old('city', $apartment->city) }}">
                    @error('city')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- provincia --}}
                <div class="p-3">
                    <label class="px-2" for="countrySubdivision">{{ __('Provincia') }}</label>
                    <input type="text" class="form-control" name="countrySubdivision" id="countrySubdivision"
                        value="{{ old('countrySubdivision', $apartment->countrySubdivision) }}">
                    @error('countrySubdivision')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
            </div>
            {{-- input aggiorna --}}

            <input type="submit" class="btn btn-success" value="Aggiorna">

            {{-- bottone annulla --}}
            <button type="submit" class="btn btn-warning"><a
                    href="{{ route('ura.apartments.index') }}">Annulla</a></button>
        </form>
    </div>
@endsection
