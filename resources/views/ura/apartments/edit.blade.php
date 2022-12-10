@extends('layouts.app')

@section('content')
    <div class="py-4">
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

            <div class="p-3">
                <label class="px-2" for="apartment_title">{{ __('Titolo annuncio') }}</label>
                <input type="text" name="apartment_title" id="apartment_title"
                    value="{{ old('apartment_title', $apartment->apartment_title) }}">
                @error('apartment_title')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="description">{{ __('Descrizione') }}</label>
                <textarea name="description" id="description" cols="30" rows="10"> {{ old('description', $apartment->description) }} </textarea>
                @error('description')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="bedrooms">{{ __('Numero di stanze') }}</label>
                <select name="bedrooms" id="bedrooms">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ old('bedrooms') == $i ? 'selected' : '' }}>
                            {{ $i }}</option>
                    @endfor
                </select>
                @error('bedrooms')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="bed">{{ __('Numero di letti') }}</label>
                <select name="bed" id="bed">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ old('bed') == $i ? 'selected' : '' }}>{{ $i }}
                        </option>
                    @endfor
                </select>
                @error('bed')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

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

            <div class="p-3">
                <label class="px-2" for="sqm">{{ __('MQ') }}</label>
                <input type="number" name="sqm" id="sqm" step=".01"
                    value="{{ old('sqm', $apartment->sqm) }}">
                @error('sqm')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

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

            <div class="p-3">
                <label class="px-2" for="price">{{ __('Prezzo') }}</label>
                <input type="number" name="price" id="price" step=".01"
                    value="{{ old('price', $apartment->price) }}">
                @error('price')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                @if ($apartment->apartment_images)
                    <img class="img-fluid w-50" src="{{ asset('storage/' . $apartment->apartment_images) }}" alt="{{ $apartment->apartment_title }}" />
                @else
                    <h6 class="mx-4">{{ __('Nessuna immagine presente') }}</h6>
                @endif

                <label class="px-2" for="apartment_images">{{ __('Immagine') }}</label>
                <input type="file" name="apartment_images" id="apartment_images"
                    value="{{ old('apartment_images', $apartment->apartment_images) }}">

                @error('apartment_images')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="address">{{ __('Indirizzo') }}</label>
                <input type="text" name="address" id="address" value="{{ old('address', $apartment->address) }}">
                @error('address')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="civic_number">{{ __('Civico') }}</label>
                <input type="number" name="civic_number" id="civic_number"
                    value="{{ old('civic_number', $apartment->civic_number) }}">
                @error('civic_number')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="postalCode">{{ __('CAP') }}</label>
                <input type="text" name="postalCode" id="postalCode" maxlength='5'
                    value="{{ old('postalCode', $apartment->postalCode) }}">
                @error('postalCode')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="city">{{ __('Città') }}</label>
                <input type="text" name="city" id="city" value="{{ old('city', $apartment->city) }}">
                @error('city')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="countrySubdivision">{{ __('Provincia') }}</label>
                <input type="text" name="countrySubdivision" id="countrySubdivision"
                    value="{{ old('countrySubdivision', $apartment->countrySubdivision) }}">
                @error('countrySubdivision')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <input type="submit" value="Aggiorna">
            </div>

        </form>
    </div>
@endsection
