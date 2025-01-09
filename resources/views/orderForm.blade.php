@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Składanie zamówienia</h1>
                <p class="lead fw-normal text-white-50 mb-0" id="OrderAmount">Kwota twojego zamówienia wynosi: </p>
            </div>
        </div>
    </header>
    <form action="{{ route('submitOrder') }}" method="POST" class="container mt-5" id="orderForm">
        @csrf
        <div class="mb-3">
            <label for="paymentMethod" class="form-label">Metoda płatności:</label>
            <select id="paymentMethod" name="paymentMethod" class="form-select" required>
                <option value="Przelew">Przelew</option>
                <option value="Przy odbiorze">Przy odbiorze</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="deliveryMethod" class="form-label">Metoda dostawy:</label>
            <select id="deliveryMethod" name="deliveryMethod" class="form-select">
                <option value="Odbior">Odbiór</option>
                <option value="Kurier">Kurier</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="submitOrderBtn">Złóż zamówienie</button>
        </div>
    </form>
    <script>
        var result = 0;
        var cartData = [];

        for (let i = 0; i < sessionStorage.length; i++) {
            const key = sessionStorage.key(i);
            if (key.startsWith("productId:")) {
                const product = JSON.parse(sessionStorage.getItem(key));
                cartData.push(product);
                result += product.quantity * product.productPrice;
            }
        }

        document.getElementById("OrderAmount").innerHTML += result + " zł";

        var hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "cartData";
        hiddenInput.value = JSON.stringify(cartData);
        document.getElementById("orderForm").appendChild(hiddenInput);
    </script>
@endsection
