@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Witamy w naszym sklepie</h1>
                <p class="lead fw-normal text-white-50 mb-0">Najlepsze produkty w jednym miejscu.</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">O nas</h2>
                <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </div>
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-6 mb-5">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">Nasz cel</h5>
                                <p class="text-muted">Zapewniamy najwyższej jakości produkty w konkurencyjnych cenach.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">Kontakt</h5>
                                <p class="text-muted">Skontaktuj się z nami pod adresem email@example.com lub zadzwoń na 123-456-789.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-outline-dark" href=" {{ route('products') }}">Przejrzyj produkty</a>
            </div>
        </div>
    </section>
@endsection
