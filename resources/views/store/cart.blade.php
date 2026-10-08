@extends('layouts.store')

@section('title', 'Carrito | Oliva')

@section('content')
    <section class="page-hero">
        <div class="container">
            <p class="eyebrow">Compra</p>
            <h1>Carrito</h1>
            <p>Vista base del carrito para que luego conectemos cantidades, cupones, envios y pasarela de pago.</p>
        </div>
    </section>

    <section class="section">
        <div class="container cart-layout">
            <div>
                @foreach ($products as $product)
                    <article class="cart-item">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                        <div>
                            <h3>{{ $product['name'] }}</h3>
                            <span>Cantidad: 1</span>
                        </div>
                        <strong class="price">{{ $product['price'] }}</strong>
                    </article>
                @endforeach
            </div>

            <aside class="summary-box">
                <h2>Resumen</h2>
                <div class="summary-row">
                    <span>Subtotal</span>
                    <strong>S/ 250.00</strong>
                </div>
                <div class="summary-row">
                    <span>Envio</span>
                    <strong>S/ 0.00</strong>
                </div>
                <div class="summary-row total">
                    <span>Total</span>
                    <strong>S/ 250.00</strong>
                </div>
                <a class="button" href="#">Continuar compra</a>
            </aside>
        </div>
    </section>
@endsection
