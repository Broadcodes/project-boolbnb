@extends('layouts.app')

@section('content')

    @if (session('popup'))
        <div class="alert alert-danger">
            {{ session('popup') }}
        </div>
    @endif

    <div class="py-4">
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

            <div class="p-3">
                <label class="px-2" for="apartment_title">{{ __('Titolo annuncio') }}</label>
                <input type="text" name="apartment_title" id="apartment_title" value="{{ old('apartment_title', '') }}" required maxlength="255">
                @error('apartment_title')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="description">{{ __('Descrizione') }}</label>
                <textarea name="description" id="description" cols="30" rows="10" required minlength="5">{{ old('description', '') }}</textarea>
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
                <input type="number" name="sqm" id="sqm" step=".01" value="{{ old('sqm', '') }}"
                    max="999.99" required>
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
                <input type="number" name="price" id="price" step=".01" value="{{ old('price', '') }}" required
                    max="999999.99">
                @error('price')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="apartment_images">{{ __('Immagine') }}</label>
                <input type="file" name="apartment_images" id="apartment_images"
                    value="{{ old('apartment_images', '') }}">
                @error('apartment_images')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="address">{{ __('Indirizzo') }}</label>
                <input type="text" name="address" id="address" value="{{ old('address', '') }}" required
                    maxlength="255">
                @error('address')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="civic_number">{{ __('Civico') }}</label>
                <input type="number" name="civic_number" id="civic_number" value="{{ old('civic_number', '') }}" required>
                @error('civic_number')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="postalCode">{{ __('CAP') }}</label>
                <input type="text" name="postalCode" id="postalCode" maxlength='5' required
                    value="{{ old('postalCode', '') }}">
                @error('postalCode')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="city">{{ __('Città') }}</label>
                <input type="text" name="city" id="city" value="{{ old('city', '') }}" required
                    maxlength="255">
                @error('city')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <label class="px-2" for="countrySubdivision">{{ __('Provincia') }}</label>
                <input type="text" name="countrySubdivision" id="countrySubdivision"
                    value="{{ old('countrySubdivision', '') }}" required maxlength="255">
                @error('countrySubdivision')
                    <h5 class="text-danger ml-4">{{ $message }}</h5>
                @enderror
            </div>

            <div class="p-3">
                <input type="submit" value="Crea">
            </div>

        </form>
    </div>
@endsection
