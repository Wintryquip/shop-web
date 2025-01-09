@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{$description}}</h1>
                <form action="{{ route('search') }}" method="GET">
                    <div class="lead fw-normal text-white-50 mb-0">
                        <div class="input-group">
                            <input type="text" class="form-control" name="productName" placeholder="Wyszukaj produkt...">
                            <button type="submit" class="btn btn-primary"> {{ __('Szukaj') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 justify-content-center">
                <script>
                    let product;
                </script>
                @if(!$products->isEmpty())
                    @foreach ($products as $product)
                        <div class="col mb-5">
                            <div class="card h-100">
                                @if ($product->Discount)
                                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                                @endif
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">
                                            {{$product->ProductName}}
                                        </h5>
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            @for($i = 0; $i < 5; $i++)
                                                @if ($i < round($product->averageRating))
                                                    <div class="bi-star-fill"> </div>
                                                @else
                                                    <div class="bi-star"> </div>
                                                @endif
                                            @endfor
                                        </div>
                                        @if ($product->Discount)
                                            <span class="text-muted text-decoration-line-through">
                                                {{$product->Price}} zł
                                            </span>
                                            {{$product->Price - $product->discountAmount}} zł
                                        @else
                                            {{$product->Price}} zł
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <div id="cartButton{{$product->id}}">
                                            <div class="text-center" id="cartButton{{$product->id}}">
                                                <script>
                                                    product = sessionStorage.getItem('productId:{{$product->id}}');

                                                    if (product !== null) {
                                                        document.getElementById('cartButton{{$product->id}}').innerHTML = "<button class='btn btn-outline-danger mt-auto' onclick='removeFromCart({{$product->id}})'>Usuń z koszyka</button>";
                                                    } else {
                                                        document.getElementById('cartButton{{$product->id}}').innerHTML = "<button class='btn btn-outline-success mt-auto' onclick='addToCart({{$product->id}}, \"{{ addslashes($product->ProductName) }}\", {{$product->Price}}, {{$product->Discount ? $product->discountAmount : 0}}, {{$product->Discount ? $product->Price - $product->discountAmount : $product->Price}})'>Dodaj do koszyka</button>";
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <a href="{{ route('show', $product->id) }}" class="btn btn-outline-dark mt-auto"> Zobacz więcej </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center role=alert"> Nie znaleziono rekordów w bazie danych </div>
                @endif
            </div>
        </div>
    </section>
@endsection
