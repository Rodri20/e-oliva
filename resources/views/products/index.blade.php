@extends('layouts.store')

@section('title', 'Tienda | Oliva')

@section('content')
    <section class="page-hero">
        <div class="container">
            <p class="eyebrow">Catalogo</p>
            <h1>Tienda Oliva</h1>
            <p>Una vista base de productos con filtros visuales. Luego estos bloques pueden conectarse a categorias, marcas, stock y busqueda real.</p>
        </div>
    </section>

    <section class="section">
        <div class="container catalog-layout">
            <aside class="filters">
                <h2>Filtros</h2>
                <div class="filter-group">
                    <strong>Categoria</strong>
                    <label><input type="checkbox"> Cuidado personal</label>
                    <label><input type="checkbox"> Despensa premium</label>
                    <label><input type="checkbox"> Regalos</label>
                </div>
                <div class="filter-group">
                    <strong>Precio</strong>
                    <label><input type="radio" name="price"> Hasta S/ 50</label>
                    <label><input type="radio" name="price"> S/ 50 a S/ 100</label>
                    <label><input type="radio" name="price"> Mas de S/ 100</label>
                </div>
                <a class="button secondary" href="{{ route('products.index') }}">Limpiar</a>
            </aside>

            <div class="product-grid">
                @foreach ($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </section>
@endsection
