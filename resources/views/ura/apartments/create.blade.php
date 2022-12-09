@extends('layouts.app')

@section('content')
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
                <input type="text" name="apartment_title" id="apartment_title" value="{{ old('apartment_title', '')}}">
            </div>
            <div class="p-3">
                <label class="px-2" for="description">{{ __('Descrizione') }}</label>
                <textarea name="description" id="description" cols="30" rows="10"> {{ old('description', '')}} </textarea>
            </div>
            <div class="p-3">
                <label class="px-2" for="bedrooms">{{ __('Numero di stanze') }}</label>
                <select name="bedrooms" id="bedrooms">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="p-3">
                <label class="px-2" for="bed">{{ __('Numero di letti') }}</label>
                <select name="bed" id="bed">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="p-3">
                <label class="px-2" for="bathrooms">{{ __('Numero di bagni') }}</label>
                <select name="bathrooms" id="bathrooms">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="p-3">
                <label class="px-2" for="sqm">{{ __('MQ') }}</label>
                <input type="number" name="sqm" id="sqm" value="{{ old('sqm', '')}}">
            </div>
            <div class="p-3">
                <label class="px-2" for="category">{{ __('Categoria') }}</label>
                <select name="category" id="category">
                    <option value="">Campo vuoto</option>
                    <option value="">Campo vuoto</option>
                    <option value="">Campo vuoto</option>
                    <option value="">Campo vuoto</option>
                    <option value="">Campo vuoto</option>
                </select>
            </div>
            <div class="p-3">
                <label class="px-2" for="price">{{ __('Prezzo') }}</label>
                <input type="number" name="price" id="price" value="{{ old('price', '')}}">
            </div>
            <div class="p-3">
                <label class="px-2" for="visible">{{ __('Visibile') }}</label>
                <input type="checkbox" name="visible" id="visible" value="{{ old('visible', '')}}">
            </div>
            <div class="p-3">
                <label class="px-2" for="apartment_images">{{ __('Immagine') }}</label>
                <input type="file" name="apartment_images" id="apartment_images" value="{{ old('apartment_images', '')}}">
            </div>
            <div class="p-3">
                <label class="px-2" for="address">{{ __('Indirizzo') }}</label>
                <input type="text" name="address" id="address" value="{{ old('address', '')}}">
            </div>
            <div class="p-3">
                <label class="px-2" for="civic_number">{{ __('Civico') }}</label>
                <input type="number" name="civic_number" id="civic_number" value="{{ old('civic_number', '')}}">
            </div>
            <div class="p-3">
                <label class="px-2" for="postalCode">{{ __('CAP') }}</label>
                <input type="text" name="postalCode" id="postalCode" value="{{ old('postalCode', '')}}">
            </div>
            <div class="p-3">
                <label class="px-2" for="city">{{ __('Città') }}</label>
                <input type="text" name="city" id="city" value="{{ old('city', '')}}">
            </div>
            <div class="p-3">
                <label class="px-2" for="countrySubdivision">{{ __('Provincia') }}</label>
                <input type="text" name="countrySubdivision" id="countrySubdivision" value="{{ old('countrySubdivision', '')}}">
            </div>
            <div class="p-3">
                <input type="submit" value="Crea">
            </div>
        </form>
    </div>
@endsection
