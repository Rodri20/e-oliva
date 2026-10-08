@props([
    'hero' => config('storefront.hero'),
])

<section class="promo-hero" id="promociones" aria-labelledby="promo-hero-title">
    <div class="promo-hero__control promo-hero__control--prev" aria-hidden="true">&lsaquo;</div>

    <div class="promo-hero__content">
        <p class="promo-hero__eyebrow">{{ $hero['eyebrow'] }}</p>
        <h1 id="promo-hero-title">{{ $hero['title'] }}</h1>
        <p>{{ $hero['description'] }}</p>
        <a class="promo-hero__cta" href="{{ $hero['cta_href'] }}">
            {{ $hero['cta_label'] }}
            <span aria-hidden="true">&nearr;</span>
        </a>
        <small>{{ $hero['legal'] }}</small>

        <div class="promo-hero__dots" aria-label="Promociones disponibles">
            <span class="is-active"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="promo-hero__visual" aria-label="{{ $hero['media_label'] }}">
        <div class="promo-hero__circle"></div>
        <div class="promo-hero__product-card">
            <span aria-hidden="true">&#9636;</span>
            <small>{{ $hero['media_label'] }}</small>
        </div>
    </div>

    <div class="promo-hero__control promo-hero__control--next" aria-hidden="true">&rsaquo;</div>
</section>
