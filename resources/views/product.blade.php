@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{$description}}</h1>
                <a href="{{ route('products') }}" class="btn btn-light mt-auto">Powrót</a>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row my-4">
            <div class="col-md-6">
                <img class="card-img-top" src="https://dummyimage.com/1920x1080/dee2e6/6c757d.jpg" alt="...">
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    @if($product->Discount)
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right:0.5rem">
                            Sale
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">
                                {{ $product->ProductName }}
                            </h5>
                            <p>
                                {{ $product->ProductDescription }}
                            </p>
                            @if ($product->Discount)
                                <span class="text-muted text-decoration-line-through"> {{ $product->Price }} </span>
                                {{$product->Price - $product->discountAmount}} zł
                            @else
                                {{$product->Price}} zł
                            @endif
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                @for($i = 0; $i < 5; $i++)
                                    @if ($i < round($product->averageRating))
                                        <div class="bi-star-fill"> </div>
                                    @else
                                        <div class="bi-star"> </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center" id="cartButton{{$product->id}}">
                            <script>
                                let product = sessionStorage.getItem('productId:{{$product->id}}');

                                if (product !== null) {
                                    document.getElementById('cartButton{{$product->id}}').innerHTML = "<button class='btn btn-outline-danger mt-auto' onclick='removeFromCart({{$product->id}})'>Usuń z koszyka</button>";
                                } else {
                                    document.getElementById('cartButton{{$product->id}}').innerHTML = "<button class='btn btn-outline-success mt-auto' onclick='addToCart({{$product->id}}, \"{{ addslashes($product->ProductName) }}\", {{$product->Price}}, {{$product->Discount ? $product->discountAmount : 0}}, {{$product->Discount ? $product->Price - $product->discountAmount : $product->Price}})'>Dodaj do koszyka</button>";
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        @auth
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <h2>Wyraź swoją opinie</h2>
                <div class="mb-3">
                    <label for="reviewText" class="form-label">Twoja opinia</label>
                    <textarea class="form-control" id="reviewText" name="comment" rows="3" required></textarea>
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                </div>
                <button type="submit" class="btn btn-primary">Wstaw</button>
            </form>
        @endauth
        <!-- Opinie użytkowników -->
        <h2> Opinie innych użytkowników </h2>
        @if(!$opinions->isEmpty())
            @foreach($opinions as $opinion)
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $opinion->user->login }}</h5>
                                <p class="card-text"> {{ $opinion->created_at }}</p>
                                <p class="card-text"> {{ $opinion->Comment }}</p>
                                @auth
                                @if($opinion->user->id == Auth::user()->id)
                                    <a href="{{ route('delete', $opinion->id) }}"
                                       class="btn btn-danger btn-xs"
                                       onclick="confirmDelete(event, '{{ route('delete', $opinion->id) }}')">
                                        Usuń
                                    </a>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning text-center" role="alert">Produkt nie ma jeszcze opinii.</div>
        @endif
    </div>
    <script>
        function confirmDelete(event, url) {
            event.preventDefault();
            Swal.fire({
                title: 'Jesteś pewien?',
                text: "Tej operacji nie można cofnąć!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Tak, usuń!',
                cancelButtonText: 'Anuluj'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
@endsection
