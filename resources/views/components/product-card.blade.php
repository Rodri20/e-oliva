<article class="product-card">
    <a class="product-media" href="{{ route('products.show', $product['slug']) }}">
        <span class="badge">{{ $product['badge'] }}</span>
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
    </a>
    <div class="product-body">
        <h3>
            <a href="{{ route('products.show', $product['slug']) }}">{{ $product['name'] }}</a>
        </h3>
        <p>{{ $product['description'] }}</p>
        <div class="product-footer">
            <span class="price">{{ $product['price'] }}</span>
            <button class="add" type="button">Agregar</button>
        </div>
    </div>
</article>
