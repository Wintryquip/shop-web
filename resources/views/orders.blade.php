@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ __('Twoje zamówienia') }}</h1>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        @if($orders->isEmpty())
            <div class="alert alert-warning" role="alert">
                {{ __('Nie masz żadnych zamówień.') }}
            </div>
        @else
            @foreach($orders as $order)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Zamówienie #{{ $order->id }}</h5>
                            <small class="text-muted">Data złożenia: {{ $order->OrderDate }}</small>
                        </div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#details-{{ $order->id }}" aria-expanded="false" aria-controls="details-{{ $order->id }}">
                            Szczegóły
                        </button>
                    </div>
                    <div class="card-body">
                        <p><strong>Metoda płatności:</strong> {{ $order->PaymentMethod }}</p>
                        <p><strong>Metoda dostawy:</strong> {{ $order->DeliveryMethod }}</p>
                        <p><strong>Status zamówienia:</strong> {{ $order->OrderStatus }}</p>
                        <p><strong>Data dostawy:</strong> {{ $order->DeliveryDate }}</p>
                    </div>
                    <div id="details-{{ $order->id }}" class="collapse">
                        <div class="card-body">
                            <h6>Szczegóły zamówienia:</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>Nazwa produktu</th>
                                        <th>Cena (zł)</th>
                                        <th>Ilość</th>
                                        <th>Łączna wartość (zł)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->orderDetails as $detail)
                                        <tr>
                                            <td>
                                                @if ($detail->product)
                                                    {{ $detail->product->ProductName }}
                                                @else
                                                    <span class="text-danger">Produkt usunięty</span>
                                                @endif
                                            </td>
                                            <td>{{ number_format($detail->price, 2) }}</td>
                                            <td>{{ $detail->quantity }}</td>
                                            <td>{{ number_format($detail->price * $detail->quantity, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
