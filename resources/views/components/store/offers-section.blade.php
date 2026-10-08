@props([
    'offers' => config('storefront.offers'),
])

<section class="store-showcase" id="ofertas">
    <div class="container">
        <div class="store-showcase__header">
            <h2>{{ $offers['title'] }}</h2>
            <a href="{{ $offers['view_all_href'] }}">
                {{ $offers['view_all_label'] }}
                <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="offer-grid">
            @foreach ($offers['items'] as $offer)
                <article class="offer-card">
                    <div class="offer-card__media">
                        <span class="offer-card__badge">Oferta</span>
                        <span class="offer-card__placeholder" aria-hidden="true">&#9636;</span>
                        <small>Producto</small>
                    </div>
                    <div class="offer-card__body">
                        <h3>{{ $offer['name'] }}</h3>
                        <strong>{{ $offer['price'] }}</strong>
                        <p>{{ $offer['note'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
