@props([
    'header' => config('storefront.header'),
])

<header class="store-header">
    <div class="store-header__utility">
        <div class="container store-header__utility-inner">
            <span>{{ $header['welcome'] }}</span>
            <nav aria-label="Enlaces rapidos" class="store-header__utility-links">
                @foreach ($header['utility_links'] as $link)
                    <a href="{{ $link['href'] }}">+ {{ $link['label'] }}</a>
                @endforeach
            </nav>
        </div>
    </div>

    <div class="container store-header__main">
        <div class="store-header__brand-group">
            <button class="store-header__menu" type="button" aria-label="Abrir menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="store-header__brand" href="{{ route('home') }}" aria-label="E-OLIVA inicio">
                <span class="store-header__brand-mark">E</span>
                <span>E-OLIVA</span>
            </a>
        </div>

        <form class="store-header__search" action="{{ route('products.index') }}" method="GET" role="search">
            <label class="visually-hidden" for="store-search">Buscar productos</label>
            <span aria-hidden="true">&#9906;</span>
            <input id="store-search" name="q" type="search" placeholder="{{ $header['search_placeholder'] }}">
        </form>

        <nav class="store-header__actions" aria-label="Acciones de cuenta">
            @foreach ($header['actions'] as $action)
                <a href="{{ $action['href'] }}">{{ $action['label'] }}</a>
            @endforeach
        </nav>
    </div>

    <div class="container store-header__categories" aria-label="Categorias principales">
        @foreach ($header['categories'] as $category)
            <a
                class="store-header__category {{ ($category['featured'] ?? false) ? 'is-featured' : '' }}"
                href="{{ $category['href'] }}"
            >
                {{ $category['label'] }}
                <span aria-hidden="true">&#8964;</span>
            </a>
        @endforeach
    </div>
</header>
