@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <form action="{{ route('ura.apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                <label class="px-2 fs-1 form-label" for="apartment_title">{{ __('Titolo alloggio') }}</label>

                <input type="text" class="form-control" name="apartment_title" id="apartment_title"
                    value="{{ old('apartment_title', '') }}">

                {{-- <select class="form-select" aria-label="Default select example">
                    <option selected>Casa</option>
                    <option value="1">Appartamento</option>
                    <option value="2">Fienile</option>
                    <option value="3">B&B</option>
                    <option value="4">Baita</option>
                    <option value="5">Barca</option>
                    <option value="6">Camper</option>
                    <option value="7">Castello</option>
                    <option value="8">Grotta</option>
                </select> --}}
                @error('apartment_title')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            {{-- categoria --}}
            <div class="p-3">
                <label class="px-2" for="category">{{ __('Categoria') }}</label>
                <select name="category" id="category">
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
                <label class="px-2 form-label" for="description">{{ __('Descrizione') }}</label>
                <textarea name="description" class="form-control" id="description" cols="100" rows="5">{{ old('description', '') }}</textarea>
                @error('description')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>
            {{-- stanze-letti-bagni --}}
            <div class="d-flex">
                {{-- stanze --}}
                <div class="p-3">
                    <label class="px-2" for="bedrooms">{{ __('Numero di stanze') }}</label>
                    <select class="form-select" name="bedrooms" id="bedrooms">
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
                    <select name="bed" id="bed">
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
                    <select name="bathrooms" id="bathrooms">
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
                <div class="p-3">
                    <label class="px-2 form-label" for="sqm">{{ __('MQ') }}</label>
                    <input type="number" class="form-control" name="sqm" id="sqm" step=".01"
                        value="{{ old('sqm', '') }}">
                    @error('sqm')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>

                {{-- prezzo --}}
                <div class="p-3">
                    <label class="px-2 form-label" for="price">{{ __('Prezzo') }}</label>
                    <input type="number" class="form-control" name="price" id="price" step=".01"
                        value="{{ old('price', '') }}">
                    @error('price')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
            </div>
            {{-- immagine --}}
            <div class="p-3 input-group mb-3">
                <label class="px-2" for="apartment_images">{{ __('Immagine') }}</label>
                <input class="input-group-text" type="file" name="apartment_images" id="apartment_images"
                    value="{{ old('apartment_images', '') }}">
                @error('apartment_images')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>
            {{-- indirizzo-civico-CAP-città-provincia --}}
            <div class="d-flex">
                {{-- indirizzo --}}
                <div class="p-3">
                    <label class="px-2 form-label" for="address">{{ __('Indirizzo') }}</label>
                    <input type="text" class="form-control" name="address" id="address"
                        value="{{ old('address', '') }}">
                    @error('address')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- civico --}}
                <div class="p-3">
                    <label class="px-2 form-label" for="civic_number">{{ __('Civico') }}</label>
                    <input type="number" class="form-control" name="civic_number" id="civic_number"
                        value="{{ old('civic_number', '') }}">
                    @error('civic_number')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- CAP --}}
                <div class="p-3">
                    <label class="px-2 form-label" for="postalCode">{{ __('CAP') }}</label>
                    <input type="text" class="form-control" name="postalCode" id="postalCode" maxlength='5'
                        value="{{ old('postalCode', '') }}">
                    @error('postalCode')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- città --}}
                <div class="p-3">
                    <label class="px-2 form-label" for="city">{{ __('Città') }}</label>
                    <input type="text" class="form-control" name="city" id="city"
                        value="{{ old('city', '') }}">
                    @error('city')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
                {{-- provincia --}}
                <div class="p-3">
                    <label class="px-2 form-label" for="countrySubdivision">{{ __('Provincia') }}</label>
                    <input type="text" class="form-control" name="countrySubdivision" id="countrySubdivision"
                        value="{{ old('countrySubdivision', '') }}">
                    @error('countrySubdivision')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>
            </div>
            {{-- input crea --}}

            <input class="btn btn-success" type="submit" value="Crea">
            {{-- bottone indietro --}}
            <button type="submit" class="btn btn-warning"><a
                    href="{{ route('ura.apartments.index') }}">Indietro</a></button>

        </form>
    </div>
@endsection
