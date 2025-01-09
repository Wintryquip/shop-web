@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ __('Zamówienie złożone') }}</h1>
                <p class="lead fw-normal text-white-50 mb-0">Poniżej znajdują się szczegóły Twojego zamówienia</p>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <h2 class="mb-4">Podsumowanie zamówienia</h2>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Dane zamówienia</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Id użytkownika:</strong> {{ $user_id }}</li>
                    <li class="list-group-item"><strong>Metoda płatności:</strong> {{ $paymentMethod }}</li>
                    <li class="list-group-item"><strong>Metoda dostawy:</strong> {{ $deliveryMethod }}</li>
                </ul>
            </div>
        </div>

        <h3 class="mb-4">Szczegóły koszyka</h3>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>Nazwa produktu</th>
                    <th>Cena oryginalna (zł)</th>
                    <th>Rabat (zł)</th>
                    <th>Cena po rabacie (zł)</th>
                    <th>Ilość</th>
                    <th>Łączna wartość (zł)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartData as $product)
                    <tr>
                        <td>{{ $product['productName'] }}</td>
                        <td>{{ number_format($product['productPrice'], 2) }}</td>
                        <td>{{ number_format($product['discount'], 2) }}</td>
                        <td>{{ number_format($product['discountPrice'], 2) }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ number_format($product['discountPrice'] * $product['quantity'], 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="alert alert-success mt-4" role="alert">
            Dziękujemy za złożenie zamówienia!
        </div>
    </div>

    <script>
        sessionStorage.clear();
    </script>
@endsection
