@props([
    'hero' => config('storefront.hero'),
])

<section class="promo-hero" id="promociones" aria-labelledby="promo-hero-title">
    <button class="promo-hero__control promo-hero__control--prev" type="button" aria-label="Promocion anterior">
        <x-icons.left-arrow class="promo-hero__control-icon" :size="24" />
    </button>

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
        <div class="promo-hero__product-card">
            <img src="{{ asset($hero['media_src']) }}" alt="{{ $hero['media_alt'] }}" loading="eager">
        </div>
    </div>

    <button class="promo-hero__control promo-hero__control--next" type="button" aria-label="Promocion siguiente">
        <x-icons.left-arrow class="promo-hero__control-icon promo-hero__control-icon--next" :size="24" />
    </button>
</section>
