<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <div class="navbar-brand" style="text-align:center; user-select:none;">
            Projekt zaliczeniowy<br>Programowanie aplikacji internetowych
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{'Konto'}}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (Route::has('login'))
                                <li><a id="productsButton" class="dropdown-item" href="{{ route('login') }}">{{'Zaloguj się'}}</a></li>
                            @endif
                            @if (Route::has('register'))
                                <li><a id="popularButton" class="dropdown-item" href="{{ route('register') }}">{{'Zarejestruj się'}}</a></li>
                            @endif
                        </ul>
                    </li>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->login }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('account') }}">{{'Ustawienia konta'}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('showOrders') }}">{{'Zamówienia'}}</a></li>
                            <li>
                                <a class="dropdown-item btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Wyloguj się') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                <!-- Link do Strony Głównej -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('/') }}">{{'Strona główna'}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{'Sklep'}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('products') }}">{{'Wszystkie produkty'}}</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('popular') }}">{{'Popularne'}}</a></li>
                        <li><a class="dropdown-item" href="{{ route('newArrivals') }}">{{'Nowości'}}</a></li>
                    </ul>
                </li>
            </ul>
            <a class="nav-link" href="{{ route('cart') }}">
                <button class="btn btn-outline-dark">
                    <i class="bi-cart-fill me-1"></i>
                    {{'Koszyk'}}
                    <span id="cartItemsCounter" class="badge bg-dark text-white ms-1 rounded-pill"></span>
                    <script>
                        document.getElementById('cartItemsCounter').innerHTML = sessionStorage.length;
                    </script>
                </button>
            </a>
        </div>
    </div>
</nav>
