@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Koszyk</h1>
                <p class="lead fw-normal text-white-50 mb-0">Wybrane przez Ciebie pozycje</p>
            </div>
        </div>
    </header>
    <section id="main">
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <form action="{{ route('order') }}" method="GET">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" style="margin-bottom:20px"> Złóż zamówienie</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div id="showCartItems"></div>
            </div>
        </section>
        <script>
            function updateQuantityInSessionStorage(productId, newQuantity) {
                let productInfo = JSON.parse(sessionStorage.getItem(productId));
                if (productInfo) {
                    productInfo.quantity = newQuantity;
                    sessionStorage.setItem(productId, JSON.stringify(productInfo));
                }
            }

            var data = "";
            for (let i = 0; i < sessionStorage.length; i++) {
                const key = sessionStorage.key(i);
                const productInfo = JSON.parse(sessionStorage.getItem(key));

                data += '<div class="row mb-3 justify-content-center">' +
                    '<div class="col-md-8 product-card">' +
                    '<div class="card">' +
                    '<div class="card-body d-flex justify-content-between align-items-center">' +
                    '<div class="d-flex flex-column">' +
                    '<h5 class="card-title">' + productInfo.productName + '</h5>' +
                    '<p class="card-text"><span>' + productInfo.productPrice + '</span> </p>' +
                    '<p class="card-text">' +
                    '<select class="form-select" name="quantity" style="width: auto;" onchange="updateQuantityInSessionStorage(\'' + key + '\', this.value)">';

                for (let j = 1; j < 10; j++) {
                    const selected = productInfo.quantity === j ? 'selected' : '';
                    data += '<option value="' + j + '" ' + selected + '>' + j + '</option>';
                }
                data += '</select></p></div>';
                data += '<div>' +
                    '<a href="{{ route('cart') }}">' +
                    '<button class="btn btn-outline-danger mt-auto" onclick="removeFromCart(\'' + parseInt(key.replace('productId:',''), 10) + '\')"> Usuń produkt z koszyka </button></a>';
                data += '</div></div></div></div></div>';
            }

            document.getElementById("showCartItems").innerHTML = data;

            if (sessionStorage.length === 0) {
                document.getElementById("main").innerHTML = '<section class="py-5"><div class="container px-4 px-lg-5 mt-5"><div class="alert alert-warning text-center role=alert" style="margin-top:70px;margin-bottom:70px"> Koszyk jest pusty </div></div></section>';
            }
        </script>
    </section>
@endsection
