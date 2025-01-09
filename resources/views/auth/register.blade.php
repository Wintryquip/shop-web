@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ __('Zarejestruj się') }}</h1>
            </div>
        </div>
    </header>
    <div class="container" style="margin-top: 60px">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <!-- Pierwsza karta: Dane osobowe i adresowe -->
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">{{ __('Dane osobowe i adresowe') }}</div>
                                <div class="card-body">

                                    <!-- Imię i Nazwisko -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">{{ __('Imię') }}</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="surname" class="form-label">{{ __('Nazwisko') }}</label>
                                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname">
                                            @error('surname')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Miasto -->
                                    <div class="mb-3">
                                        <label for="city" class="form-label">{{ __('Miasto') }}</label>
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Ulica -->
                                    <div class="mb-3">
                                        <label for="street" class="form-label">{{ __('Ulica') }}</label>
                                        <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="street">
                                        @error('street')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Numer budynku i Numer lokalu -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="houseNumber" class="form-label">{{ __('Numer budynku') }}</label>
                                            <input id="houseNumber" type="text" class="form-control @error('houseNumber') is-invalid @enderror" name="houseNumber" value="{{ old('houseNumber') }}" required>
                                            @error('houseNumber')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="apartmentNumber" class="form-label">{{ __('Numer lokalu') }}</label>
                                            <input id="apartmentNumber" type="text" class="form-control @error('apartmentNumber') is-invalid @enderror" name="apartmentNumber" value="{{ old('apartmentNumber') }}">
                                            @error('apartmentNumber')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Druga karta: Dane logowania -->
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">{{ __('Dane logowania') }}</div>
                                <div class="card-body">

                                    <!-- Login -->
                                    <div class="mb-3">
                                        <label for="login" class="form-label">{{ __('Login') }}</label>
                                        <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="username">
                                        @error('login')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Hasło -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Hasło') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Potwierdzenie hasła -->
                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">{{ __('Potwierdź hasło') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Przycisk zarejestruj -->
                    <div class="row mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Zarejestruj') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
