@extends('layouts.store')

@section('title', 'Oliva | Ecommerce natural')

@section('content')
    <section class="hero">
        <div class="container hero-content">
            <div class="hero-copy">
                <p class="eyebrow">Ecommerce natural y premium</p>
                <h1>Oliva, tu tienda lista para crecer.</h1>
                <p>Una base visual para iniciar el proyecto con catalogo, categorias, productos destacados y llamados de compra preparados para conectar luego con modelos, carrito y pagos.</p>
                <div class="hero-actions">
                    <a class="button" href="{{ route('products.index') }}">Explorar productos</a>
                    <a class="button secondary" href="#categorias">Ver categorias</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="categorias">
        <div class="container">
            <div class="section-heading">
                <h2>Categorias principales</h2>
                <p>Organiza el catalogo desde el primer dia con secciones claras para una experiencia de compra directa.</p>
            </div>
            <div class="category-grid">
                @foreach ($categories as $category)
                    <article class="category">
                        <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}">
                        <strong>{{ $category['name'] }}</strong>
                        <span>{{ $category['items'] }}</span>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <h2>Productos destacados</h2>
                <p>Tarjetas listas para reemplazarse por datos reales desde base de datos cuando armemos el catalogo.</p>
            </div>
            <div class="product-grid">
                @foreach ($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </section>

    <section class="band">
        <div class="container band-inner">
            <div>
                <h2>Base ecommerce preparada para iterar.</h2>
                <p>El siguiente paso natural es crear modelos de productos, categorias, carrito, checkout y panel administrativo.</p>
            </div>
            <a class="button secondary" href="{{ route('products.index') }}">Ver catalogo</a>
        </div>
    </section>

    <section class="section" id="beneficios">
        <div class="container feature-grid">
            <div class="feature">
                <strong>Catalogo escalable</strong>
                <span>Estructura visual pensada para categorias, filtros y productos destacados.</span>
            </div>
            <div class="feature">
                <strong>Checkout futuro</strong>
                <span>La interfaz deja el camino listo para carrito, cupones, pagos y envios.</span>
            </div>
            <div class="feature">
                <strong>Marca flexible</strong>
                <span>Paleta sobria y natural, facil de adaptar a identidad visual y contenido real.</span>
            </div>
        </div>
    </section>
@endsection
