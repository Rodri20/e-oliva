@props([
    'categories' => config('storefront.shop_categories'),
])

<section class="store-showcase store-showcase--compact" id="categorias">
    <div class="container">
        <div class="store-showcase__header">
            <h2>{{ $categories['title'] }}</h2>
            <a href="{{ $categories['view_all_href'] }}">
                {{ $categories['view_all_label'] }}
                <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="category-shortcuts">
            @foreach ($categories['items'] as $category)
                <a class="category-shortcut" href="{{ $category['href'] }}">
                    <span class="category-shortcut__media">
                        <span aria-hidden="true">&#9636;</span>
                    </span>
                    <strong>{{ $category['name'] }}</strong>
                </a>
            @endforeach
        </div>
    </div>
</section>
