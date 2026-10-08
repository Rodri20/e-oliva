@extends('layouts.store')

@section('title', $product['name'] . ' | Oliva')

@section('content')
    <section class="section">
        <div class="container product-detail">
            <div class="detail-image">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
            </div>
            <article class="detail-panel">
                <p class="eyebrow">{{ $product['badge'] }}</p>
                <h1>{{ $product['name'] }}</h1>
                <p>{{ $product['description'] }}</p>
                <div class="price">{{ $product['price'] }}</div>
                <div class="option-row" aria-label="Opciones de producto">
                    <span class="option">Stock disponible</span>
                    <span class="option">Envio Lima</span>
                    <span class="option">Cambio simple</span>
                </div>
                <button class="button" type="button">Agregar al carrito</button>
                <a class="button secondary" href="{{ route('products.index') }}">Volver a tienda</a>
            </article>
        </div>
    </section>
@endsection
