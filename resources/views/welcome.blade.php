<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Oliva') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
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

        .container {
            margin: 0 auto;
            max-width: 1180px;
            padding: 0 24px;
        }

        .topbar {
            background: var(--olive-dark);
            color: var(--white);
            font-size: 13px;
            padding: 10px 0;
            text-align: center;
        }

        .navbar {
            background: rgba(251, 252, 247, .92);
            border-bottom: 1px solid var(--line);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav-inner {
            align-items: center;
            display: flex;
            gap: 24px;
            justify-content: space-between;
            min-height: 72px;
        }

        .brand {
            align-items: center;
            display: inline-flex;
            font-size: 24px;
            font-weight: 700;
            gap: 10px;
        }

        .brand-mark {
            align-items: center;
            background: var(--olive);
            border-radius: 999px;
            color: var(--white);
            display: inline-flex;
            font-size: 14px;
            height: 34px;
            justify-content: center;
            width: 34px;
        }

        .nav-links {
            align-items: center;
            display: flex;
            gap: 22px;
            color: var(--muted);
            font-size: 15px;
            font-weight: 600;
        }

        .nav-actions {
            align-items: center;
            display: flex;
            gap: 10px;
        }

        .icon-button,
        .button {
            align-items: center;
            border: 1px solid var(--line);
            border-radius: 8px;
            display: inline-flex;
            font-weight: 700;
            justify-content: center;
            min-height: 42px;
            transition: transform .18s ease, border-color .18s ease, background .18s ease;
        }

        .icon-button {
            background: var(--white);
            color: var(--ink);
            font-size: 18px;
            width: 42px;
        }

        .button {
            background: var(--olive-dark);
            color: var(--white);
            padding: 0 18px;
        }

        .button.secondary {
            background: var(--white);
            color: var(--ink);
        }

        .icon-button:hover,
        .button:hover {
            border-color: var(--olive);
            transform: translateY(-1px);
        }

        .hero {
            border-bottom: 1px solid var(--line);
            min-height: 620px;
            overflow: hidden;
            position: relative;
        }

        .hero::before {
            background:
                linear-gradient(90deg, rgba(29, 37, 32, .82), rgba(29, 37, 32, .42) 44%, rgba(29, 37, 32, .08)),
                url("https://images.unsplash.com/photo-1607082349566-187342175e2f?auto=format&fit=crop&w=1800&q=80") center / cover;
            content: "";
            inset: 0;
            position: absolute;
        }

        .hero-content {
            color: var(--white);
            display: grid;
            min-height: 620px;
            padding: 92px 0 72px;
            place-items: center start;
            position: relative;
        }

        .hero-copy { max-width: 620px; }

        .eyebrow {
            color: #f0d49b;
            font-size: 13px;
            font-weight: 700;
            margin: 0 0 18px;
            text-transform: uppercase;
        }

        h1 {
            font-size: clamp(44px, 7vw, 78px);
            line-height: .95;
            margin: 0;
            max-width: 720px;
        }

        .hero-copy p {
            color: rgba(255, 255, 255, .84);
            font-size: 18px;
            line-height: 1.7;
            margin: 24px 0 32px;
            max-width: 560px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-actions .button { min-height: 48px; }

        .hero-actions .secondary {
            background: rgba(255, 255, 255, .14);
            border-color: rgba(255, 255, 255, .36);
            color: var(--white);
        }

        .section { padding: 72px 0; }

        .section-heading {
            align-items: end;
            display: flex;
            gap: 24px;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .section-heading h2 {
            font-size: clamp(30px, 4vw, 46px);
            line-height: 1.05;
            margin: 0;
        }

        .section-heading p {
            color: var(--muted);
            line-height: 1.6;
            margin: 0;
            max-width: 480px;
        }

        .category-grid,
        .product-grid {
            display: grid;
            gap: 18px;
        }

        .category-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); }

        .category,
        .product {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 8px;
            overflow: hidden;
        }

        .category img {
            aspect-ratio: 4 / 3;
            object-fit: cover;
            width: 100%;
        }

        .category strong,
        .category span {
            display: block;
            padding: 0 16px;
        }

        .category strong {
            font-size: 18px;
            padding-top: 16px;
        }

        .category span {
            color: var(--muted);
            font-size: 14px;
            padding-bottom: 18px;
            padding-top: 4px;
        }

        .product-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }

        .product-media {
            background: var(--soft);
            position: relative;
        }

        .product-media img {
            aspect-ratio: 1 / 1;
            object-fit: cover;
            width: 100%;
        }

        .badge {
            background: var(--gold);
            border-radius: 999px;
            color: var(--ink);
            font-size: 12px;
            font-weight: 700;
            left: 14px;
            padding: 6px 10px;
            position: absolute;
            top: 14px;
        }

        .product-body { padding: 18px; }

        .product-body h3 {
            font-size: 19px;
            margin: 0 0 8px;
        }

        .product-body p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.55;
            margin: 0 0 16px;
        }

        .product-footer {
            align-items: center;
            display: flex;
            justify-content: space-between;
        }

        .price {
            color: var(--olive-dark);
            font-size: 20px;
            font-weight: 700;
        }

        .add {
            background: var(--olive);
            border: 0;
            border-radius: 8px;
            color: var(--white);
            cursor: pointer;
            font-weight: 700;
            min-height: 40px;
            padding: 0 14px;
        }

        .band {
            background: var(--olive-dark);
            color: var(--white);
            padding: 56px 0;
        }

        .band-inner {
            align-items: center;
            display: flex;
            gap: 28px;
            justify-content: space-between;
        }

        .band h2 {
            font-size: clamp(28px, 4vw, 44px);
            line-height: 1.05;
            margin: 0 0 12px;
        }

        .band p {
            color: rgba(255, 255, 255, .74);
            line-height: 1.65;
            margin: 0;
            max-width: 620px;
        }

        .features {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .feature {
            border-top: 1px solid var(--line);
            padding-top: 22px;
        }

        .feature strong {
            display: block;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .feature span {
            color: var(--muted);
            display: block;
            line-height: 1.55;
        }

        footer {
            border-top: 1px solid var(--line);
            color: var(--muted);
            padding: 28px 0;
        }

        .footer-inner {
            align-items: center;
            display: flex;
            justify-content: space-between;
        }

        @media (max-width: 860px) {
            .nav-links { display: none; }
            .hero, .hero-content { min-height: 560px; }
            .category-grid, .product-grid, .features { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .section-heading, .band-inner, .footer-inner {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 580px) {
            .container { padding: 0 18px; }
            .topbar { font-size: 12px; }
            .brand { font-size: 21px; }
            .nav-actions .secondary { display: none; }
            .hero, .hero-content { min-height: 540px; }
            .hero-content { padding: 70px 0 56px; }
            .hero-copy p { font-size: 16px; }
            .category-grid, .product-grid, .features { grid-template-columns: 1fr; }
            .section { padding: 56px 0; }
        }
    </style>
</head>
<body>
    @php
        $categories = [
            ['name' => 'Cuidado personal', 'items' => 'Aceites, jabones y kits', 'image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=900&q=80'],
            ['name' => 'Despensa premium', 'items' => 'Selecciones naturales', 'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=900&q=80'],
            ['name' => 'Hogar consciente', 'items' => 'Aromas y accesorios', 'image' => 'https://images.unsplash.com/photo-1602874801007-bd458bb1b8b6?auto=format&fit=crop&w=900&q=80'],
            ['name' => 'Regalos listos', 'items' => 'Combos para ocasiones', 'image' => 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?auto=format&fit=crop&w=900&q=80'],
        ];

        $products = [
            ['name' => 'Kit Oliva esencial', 'description' => 'Rutina diaria con aceite corporal, jabon artesanal y crema ligera.', 'price' => 'S/ 89.00', 'badge' => 'Nuevo', 'image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80'],
            ['name' => 'Aceite extra virgen', 'description' => 'Botella premium para cocina saludable, regalos corporativos y despensa gourmet.', 'price' => 'S/ 42.00', 'badge' => 'Top venta', 'image' => 'https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?auto=format&fit=crop&w=900&q=80'],
            ['name' => 'Caja regalo botanic', 'description' => 'Pack curado con productos naturales y empaque listo para entregar.', 'price' => 'S/ 119.00', 'badge' => 'Gift', 'image' => 'https://images.unsplash.com/photo-1607083206968-13611e3d76db?auto=format&fit=crop&w=900&q=80'],
        ];
    @endphp

    <div class="topbar">Envio gratis desde S/ 150 en Lima Metropolitana</div>

    <header class="navbar">
        <div class="container nav-inner">
            <a class="brand" href="#">
                <span class="brand-mark">O</span>
                Oliva
            </a>
            <nav class="nav-links" aria-label="Navegacion principal">
                <a href="#categorias">Categorias</a>
                <a href="#productos">Productos</a>
                <a href="#beneficios">Beneficios</a>
                <a href="#contacto">Contacto</a>
            </nav>
            <div class="nav-actions">
                <a class="button secondary" href="#productos">Ver tienda</a>
                <a class="icon-button" href="#carrito" aria-label="Carrito">+</a>
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-content">
                <div class="hero-copy">
                    <p class="eyebrow">Ecommerce natural y premium</p>
                    <h1>Oliva, tu tienda lista para crecer.</h1>
                    <p>Una base visual para iniciar el proyecto: catalogo, categorias, productos destacados y llamados de compra preparados para conectar luego con modelos, carrito y pagos.</p>
                    <div class="hero-actions">
                        <a class="button" href="#productos">Explorar productos</a>
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

        <section class="section" id="productos">
            <div class="container">
                <div class="section-heading">
                    <h2>Productos destacados</h2>
                    <p>Tarjetas de producto listas para reemplazarse por datos reales desde base de datos cuando armemos el catalogo.</p>
                </div>
                <div class="product-grid">
                    @foreach ($products as $product)
                        <article class="product">
                            <div class="product-media">
                                <span class="badge">{{ $product['badge'] }}</span>
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                            </div>
                            <div class="product-body">
                                <h3>{{ $product['name'] }}</h3>
                                <p>{{ $product['description'] }}</p>
                                <div class="product-footer">
                                    <span class="price">{{ $product['price'] }}</span>
                                    <button class="add" type="button">Agregar</button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="band" id="contacto">
            <div class="container band-inner">
                <div>
                    <h2>Base ecommerce preparada para iterar.</h2>
                    <p>El siguiente paso natural es convertir estos bloques en layout reusable, crear modelos de productos y conectar carrito, checkout y panel administrativo.</p>
                </div>
                <a class="button secondary" href="mailto:hola@oliva.test">Cotizar proyecto</a>
            </div>
        </section>

        <section class="section" id="beneficios">
            <div class="container features">
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
    </main>

    <footer>
        <div class="container footer-inner">
            <span>Oliva Ecommerce Base</span>
            <span>Laravel {{ app()->version() }}</span>
        </div>
    </footer>
</body>
</html>
