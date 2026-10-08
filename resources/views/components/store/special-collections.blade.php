@props([
    'collections' => config('storefront.special_collections'),
])

<section class="store-showcase store-showcase--special" id="campanas">
    <div class="container">
        <div class="store-showcase__header">
            <h2>{{ $collections['title'] }}</h2>
            <a href="{{ $collections['view_all_href'] }}">
                {{ $collections['view_all_label'] }}
                <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="special-collections">
            @foreach ($collections['items'] as $collection)
                <article class="special-card special-card--{{ $collection['tone'] }}">
                    <div class="special-card__copy">
                        <p>{{ $collection['eyebrow'] }}</p>
                        <h3>{{ $collection['title'] }}</h3>
                        <a href="{{ $collection['href'] }}">
                            {{ $collection['cta_label'] }}
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>

                    <div class="special-card__media">
                        <span aria-hidden="true">&#9636;</span>
                        <small>Coleccion</small>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
