<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Oliva'))</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --ink: #1d2520;
            --muted: #6a716b;
            --line: #dfe5dc;
            --paper: #fbfcf7;
            --soft: #eef4e8;
            --olive: #65754b;
            --olive-dark: #334126;
            --clay: #b86f4b;
            --gold: #d8a34a;
            --white: #ffffff;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: "Instrument Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        a { color: inherit; text-decoration: none; }
        img { display: block; height: auto; max-width: 100%; }
        button { font: inherit; }

        .container { margin: 0 auto; max-width: 1180px; padding: 0 24px; }
        .topbar { background: var(--olive-dark); color: var(--white); font-size: 13px; padding: 10px 0; text-align: center; }
        .navbar { background: rgba(251, 252, 247, .94); border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 10; }
        .nav-inner { align-items: center; display: flex; gap: 24px; justify-content: space-between; min-height: 72px; }
        .brand { align-items: center; display: inline-flex; font-size: 24px; font-weight: 700; gap: 10px; }
        .brand-mark { align-items: center; background: var(--olive); border-radius: 999px; color: var(--white); display: inline-flex; font-size: 14px; height: 34px; justify-content: center; width: 34px; }
        .nav-links { align-items: center; color: var(--muted); display: flex; font-size: 15px; font-weight: 600; gap: 22px; }
        .nav-actions { align-items: center; display: flex; gap: 10px; }
        .button, .icon-button {
            align-items: center;
            border: 1px solid var(--line);
            border-radius: 8px;
            display: inline-flex;
            font-weight: 700;
            justify-content: center;
            min-height: 42px;
            transition: transform .18s ease, border-color .18s ease, background .18s ease;
        }
        .button { background: var(--olive-dark); color: var(--white); padding: 0 18px; }
        .button.secondary { background: var(--white); color: var(--ink); }
        .icon-button { background: var(--white); color: var(--ink); font-size: 18px; width: 42px; }
        .button:hover, .icon-button:hover { border-color: var(--olive); transform: translateY(-1px); }

        .hero { border-bottom: 1px solid var(--line); min-height: 620px; overflow: hidden; position: relative; }
        .hero::before {
            background:
                linear-gradient(90deg, rgba(29, 37, 32, .82), rgba(29, 37, 32, .42) 44%, rgba(29, 37, 32, .08)),
                url("https://images.unsplash.com/photo-1607082349566-187342175e2f?auto=format&fit=crop&w=1800&q=80") center / cover;
            content: "";
            inset: 0;
            position: absolute;
        }
        .hero-content { color: var(--white); display: grid; min-height: 620px; padding: 92px 0 72px; place-items: center start; position: relative; }
        .hero-copy { max-width: 620px; }
        .eyebrow { color: #f0d49b; font-size: 13px; font-weight: 700; margin: 0 0 18px; text-transform: uppercase; }
        h1 { font-size: clamp(42px, 7vw, 78px); line-height: .95; margin: 0; max-width: 720px; }
        .hero-copy p { color: rgba(255, 255, 255, .84); font-size: 18px; line-height: 1.7; margin: 24px 0 32px; max-width: 560px; }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 12px; }
        .hero-actions .button { min-height: 48px; }
        .hero-actions .secondary { background: rgba(255, 255, 255, .14); border-color: rgba(255, 255, 255, .36); color: var(--white); }

        .page-hero { border-bottom: 1px solid var(--line); padding: 68px 0 42px; }
        .page-hero h1 { color: var(--ink); font-size: clamp(36px, 6vw, 64px); }
        .page-hero p { color: var(--muted); font-size: 18px; line-height: 1.65; margin: 18px 0 0; max-width: 680px; }
        .section { padding: 72px 0; }
        .section-heading { align-items: end; display: flex; gap: 24px; justify-content: space-between; margin-bottom: 28px; }
        .section-heading h2 { font-size: clamp(30px, 4vw, 46px); line-height: 1.05; margin: 0; }
        .section-heading p { color: var(--muted); line-height: 1.6; margin: 0; max-width: 480px; }
        .category-grid, .product-grid, .feature-grid { display: grid; gap: 18px; }
        .category-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .product-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .feature-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }

        .category, .product-card, .summary-box, .feature, .detail-panel {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 8px;
            overflow: hidden;
        }
        .category img { aspect-ratio: 4 / 3; object-fit: cover; width: 100%; }
        .category strong, .category span { display: block; padding: 0 16px; }
        .category strong { font-size: 18px; padding-top: 16px; }
        .category span { color: var(--muted); font-size: 14px; padding-bottom: 18px; padding-top: 4px; }
        .product-media { background: var(--soft); position: relative; }
        .product-media img { aspect-ratio: 1 / 1; object-fit: cover; width: 100%; }
        .badge { background: var(--gold); border-radius: 999px; color: var(--ink); font-size: 12px; font-weight: 700; left: 14px; padding: 6px 10px; position: absolute; top: 14px; }
        .product-body { padding: 18px; }
        .product-body h3 { font-size: 19px; margin: 0 0 8px; }
        .product-body p { color: var(--muted); font-size: 14px; line-height: 1.55; margin: 0 0 16px; }
        .product-footer { align-items: center; display: flex; justify-content: space-between; }
        .price { color: var(--olive-dark); font-size: 20px; font-weight: 700; }
        .add { background: var(--olive); border: 0; border-radius: 8px; color: var(--white); cursor: pointer; font-weight: 700; min-height: 40px; padding: 0 14px; }

        .band { background: var(--olive-dark); color: var(--white); padding: 56px 0; }
        .band-inner { align-items: center; display: flex; gap: 28px; justify-content: space-between; }
        .band h2 { font-size: clamp(28px, 4vw, 44px); line-height: 1.05; margin: 0 0 12px; }
        .band p { color: rgba(255, 255, 255, .74); line-height: 1.65; margin: 0; max-width: 620px; }
        .feature { padding: 22px; }
        .feature strong { display: block; font-size: 18px; margin-bottom: 8px; }
        .feature span { color: var(--muted); display: block; line-height: 1.55; }

        .catalog-layout { display: grid; gap: 24px; grid-template-columns: 250px 1fr; }
        .filters { background: var(--white); border: 1px solid var(--line); border-radius: 8px; padding: 18px; }
        .filters h2 { font-size: 18px; margin: 0 0 16px; }
        .filter-group { border-top: 1px solid var(--line); padding: 16px 0; }
        .filter-group:first-of-type { border-top: 0; padding-top: 0; }
        .filter-group strong { display: block; margin-bottom: 10px; }
        .filter-group label { color: var(--muted); display: block; font-size: 14px; margin: 8px 0; }

        .product-detail { display: grid; gap: 32px; grid-template-columns: minmax(0, 1.05fr) minmax(320px, .95fr); }
        .detail-image { background: var(--soft); border-radius: 8px; overflow: hidden; }
        .detail-image img { aspect-ratio: 1 / 1; object-fit: cover; width: 100%; }
        .detail-panel { padding: 28px; }
        .detail-panel h1 { font-size: clamp(34px, 5vw, 56px); line-height: 1; }
        .detail-panel p { color: var(--muted); line-height: 1.7; }
        .option-row { display: flex; flex-wrap: wrap; gap: 10px; margin: 18px 0 24px; }
        .option { background: var(--soft); border: 1px solid var(--line); border-radius: 999px; padding: 8px 12px; }

        .cart-layout { display: grid; gap: 24px; grid-template-columns: 1fr 340px; }
        .cart-item { align-items: center; background: var(--white); border: 1px solid var(--line); border-radius: 8px; display: grid; gap: 16px; grid-template-columns: 88px 1fr auto; margin-bottom: 14px; padding: 14px; }
        .cart-item img { aspect-ratio: 1 / 1; border-radius: 8px; object-fit: cover; width: 88px; }
        .cart-item h3 { margin: 0 0 6px; }
        .cart-item span { color: var(--muted); }
        .summary-box { padding: 20px; }
        .summary-row { border-bottom: 1px solid var(--line); display: flex; justify-content: space-between; padding: 12px 0; }
        .summary-row.total { border-bottom: 0; color: var(--olive-dark); font-size: 20px; font-weight: 700; }
        .summary-box .button { margin-top: 14px; width: 100%; }

        footer { border-top: 1px solid var(--line); color: var(--muted); padding: 28px 0; }
        .footer-inner { align-items: center; display: flex; justify-content: space-between; }

        @media (max-width: 920px) {
            .nav-links { align-items: flex-start; padding: 16px 0 0; }
            .hero, .hero-content { min-height: 560px; }
            .category-grid, .product-grid, .feature-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .catalog-layout, .product-detail, .cart-layout { grid-template-columns: 1fr; }
            .section-heading, .band-inner, .footer-inner { align-items: flex-start; flex-direction: column; }
        }

        @media (max-width: 580px) {
            .container { padding: 0 18px; }
            .topbar { font-size: 12px; }
            .brand { font-size: 21px; }
            .nav-actions .secondary { display: none; }
            .hero, .hero-content { min-height: 540px; }
            .hero-content { padding: 70px 0 56px; }
            .hero-copy p { font-size: 16px; }
            .category-grid, .product-grid, .feature-grid { grid-template-columns: 1fr; }
            .cart-item { grid-template-columns: 72px 1fr; }
            .cart-item .price { grid-column: 2; }
            .section { padding: 56px 0; }
        }
    </style>
</head>
<body>
    <div class="topbar">Envio gratis desde S/ 150 en Lima Metropolitana</div>

    <header class="navbar navbar-expand-lg">
        <div class="container nav-inner">
            <a class="brand navbar-brand" href="{{ route('home') }}">
                <span class="brand-mark">O</span>
                Oliva
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#store-navigation" aria-controls="store-navigation" aria-expanded="false" aria-label="Abrir navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="store-navigation">
                <nav class="nav-links navbar-nav ms-lg-auto" aria-label="Navegacion principal">
                    <a class="nav-link" href="{{ route('products.index') }}">Tienda</a>
                    <a class="nav-link" href="{{ route('home') }}#colecciones">Colecciones</a>
                    <a class="nav-link" href="{{ route('home') }}#beneficios">Beneficios</a>
                    <a class="nav-link" href="{{ route('cart') }}">Carrito</a>
                </nav>
                <div class="nav-actions ms-lg-4 mt-3 mt-lg-0">
                    <a class="button secondary" href="{{ route('products.index') }}">Ver tienda</a>
                    <a class="icon-button" href="{{ route('cart') }}" aria-label="Carrito">+</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container footer-inner">
            <span>Oliva Ecommerce Base</span>
            <span>Laravel {{ app()->version() }}</span>
        </div>
    </footer>
</body>
</html>
