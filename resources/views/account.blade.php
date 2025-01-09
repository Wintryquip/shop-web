@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ __('Twoje konto') }}</h1>
            </div>
        </div>
    </header>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group" style="margin: 12px 0 12px 0;">
                    <li class="list-group-item"><strong>{{ __('Dane użytkownika') }}</strong></li>

                    <!-- Login -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ __('Login: ') }}</strong> <span id="login-span">{{ Auth::user()->login }}</span>
                            <div id="login-form" class="form-container" style="display: none;">
                                <form action="{{ route('account.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" value="{{ Auth::user()->login }}" required>
                                    @error('login')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-2">{{ __('Zapisz') }}</button>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary ms-auto" onClick="toggleForm('login-form', 'login-span')">{{ __('Edytuj') }}</button>
                    </li>

                    <!-- Email -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ __('E-mail: ') }}</strong> <span id="email-span">{{ Auth::user()->email }}</span>
                            <div id="email-form" class="form-container" style="display: none;">
                                <form action="{{ route('account.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-2">{{ __('Zapisz') }}</button>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary ms-auto" onClick="toggleForm('email-form', 'email-span')">{{ __('Edytuj') }}</button>
                    </li>

                    <!-- Hasło -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ __('Hasło: ') }}</strong> <span id="password-span">{{ str_repeat('•', 10) }}</span>
                            <div id="password-form" class="form-container" style="display: none;">
                                <form action="{{ route('account.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-2">{{ __('Zapisz') }}</button>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary ms-auto" onClick="toggleForm('password-form', 'password-span')">{{ __('Edytuj') }}</button>
                    </li>

                    <!-- Imię -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ __('Imię: ') }}</strong> <span id="name-span">{{ Auth::user()->name }}</span>
                            <div id="name-form" class="form-container" style="display: none;">
                                <form action="{{ route('account.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-2">{{ __('Zapisz') }}</button>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary ms-auto" onClick="toggleForm('name-form', 'name-span')">{{ __('Edytuj') }}</button>
                    </li>

                    <!-- Nazwisko -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ __('Nazwisko: ') }}</strong> <span id="surname-span">{{ Auth::user()->surname }}</span>
                            <div id="surname-form" class="form-container" style="display: none;">
                                <form action="{{ route('account.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ Auth::user()->surname }}" required>
                                    @error('surname')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-2">{{ __('Zapisz') }}</button>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary ms-auto" onClick="toggleForm('surname-form', 'surname-span')">{{ __('Edytuj') }}</button>
                    </li>

                    <!-- Miasto -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ __('Miasto: ') }}</strong> <span id="city-span">{{ Auth::user()->city }}</span>
                            <div id="city-form" class="form-container" style="display: none;">
                                <form action="{{ route('account.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ Auth::user()->city }}" required>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-2">{{ __('Zapisz') }}</button>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary ms-auto" onClick="toggleForm('city-form', 'city-span')">{{ __('Edytuj') }}</button>
                    </li>

                    <!-- Ulica -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ __('Ulica: ') }}</strong> <span id="street-span">{{ Auth::user()->street }}</span>
                            <div id="street-form" class="form-container" style="display: none;">
                                <form action="{{ route('account.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ Auth::user()->street }}" required>
                                    @error('street')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-2">{{ __('Zapisz') }}</button>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary ms-auto" onClick="toggleForm('street-form', 'street-span')">{{ __('Edytuj') }}</button>
                    </li>

                    <!-- Numer budynku -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ __('Numer budynku: ') }}</strong> <span id="houseNumber-span">{{ Auth::user()->houseNumber }}</span>
                            <div id="houseNumber-form" class="form-container" style="display: none;">
                                <form action="{{ route('account.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="houseNumber" class="form-control @error('houseNumber') is-invalid @enderror" value="{{ Auth::user()->houseNumber }}" required>
                                    @error('houseNumber')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-2">{{ __('Zapisz') }}</button>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary ms-auto" onClick="toggleForm('houseNumber-form', 'houseNumber-span')">{{ __('Edytuj') }}</button>
                    </li>

                    <!-- Numer lokalu -->
                    @if(!empty(Auth::user()->apartmentNumber))
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ __('Numer lokalu: ') }}</strong> <span id="apartmentNumber-span">{{ Auth::user()->apartmentNumber }}</span>
                                <div id="apartmentNumber-form" class="form-container" style="display: none;">
                                    <form action="{{ route('account.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="apartmentNumber" class="form-control @error('apartmentNumber') is-invalid @enderror" value="{{ Auth::user()->apartmentNumber }}">
                                        @error('apartmentNumber')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                        <button type="submit" class="btn btn-primary mt-2">{{ __('Zapisz') }}</button>
                                    </form>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary ms-auto" onClick="toggleForm('apartmentNumber-form', 'apartmentNumber-span')">{{ __('Edytuj') }}</button>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <script>
        function toggleForm(formId, spanId) {
            var form = document.getElementById(formId);
            var span = document.getElementById(spanId);
            if (form.style.display === "none") {
                form.style.display = "block";
                span.style.display = "none";
            } else {
                form.style.display = "none";
                span.style.display = "inline";
            }
        }
    </script>
@endsection
