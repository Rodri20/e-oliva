<?php

return [
    'header' => [
        'welcome' => 'Bienvenido a E-OLIVA - Aceite de oliva para disfrutar',
        'logo_src' => 'images/storefront/e-oliva-logo.png',
        'logo_alt' => 'E-OLIVA',
        'utility_links' => [
            ['label' => 'Envios segun cobertura', 'href' => '#'],
            ['label' => 'Sigue tu pedido', 'href' => '#'],
            ['label' => 'Promociones', 'href' => '#promociones'],
        ],
        'search_placeholder' => 'Buscar aceite de oliva, packs o regalos...',
        'actions' => [
            ['label' => 'Mi cuenta', 'href' => '#'],
            ['label' => 'Favoritos', 'href' => '#'],
            ['label' => 'Carrito', 'href' => '/carrito'],
        ],
        'categories' => [
            ['label' => 'Todos los productos', 'href' => '/tienda', 'featured' => true],
            ['label' => 'Aceite extra virgen', 'href' => '/tienda'],
            ['label' => 'Presentaciones', 'href' => '/tienda'],
            ['label' => 'Packs y regalos', 'href' => '/tienda'],
            ['label' => 'Colecciones', 'href' => '#colecciones'],
            ['label' => 'Recetas', 'href' => '#'],
            ['label' => 'Ofertas', 'href' => '#promociones'],
        ],
    ],

    'hero' => [
        'eyebrow' => 'Promociones destacadas',
        'title' => 'Ofertas para darle mas sabor a tu mesa.',
        'description' => 'Descubre las campanas, descuentos y packs vigentes de E-OLIVA.',
        'cta_label' => 'Ver promociones',
        'cta_href' => '#promociones',
        'legal' => 'Los descuentos y precios se mostraran segun cada campana.',
        'media_label' => 'Producto o campana principal',
        'media_src' => 'images/storefront/olive-hero-bottle.png',
        'media_alt' => 'Botella premium de aceite de oliva con ramas y aceitunas',
    ],

    'offers' => [
        'title' => 'Las mejores ofertas de E-OLIVA',
        'view_all_label' => 'Ver todos',
        'view_all_href' => '/tienda',
        'items' => [
            ['name' => 'Oliva Clasico', 'price' => 'S/ -.-', 'note' => 'Precio y ahorro por confirmar'],
            ['name' => 'Reserva Especial', 'price' => 'S/ -.-', 'note' => 'Precio y ahorro por confirmar'],
            ['name' => 'Extra Virgen', 'price' => 'S/ -.-', 'note' => 'Precio y ahorro por confirmar'],
            ['name' => 'Pack Familiar', 'price' => 'S/ -.-', 'note' => 'Precio y ahorro por confirmar'],
            ['name' => 'Seleccion Gourmet', 'price' => 'S/ -.-', 'note' => 'Precio y ahorro por confirmar'],
        ],
    ],

    'shop_categories' => [
        'title' => 'Compra por categoria',
        'view_all_label' => 'Ver todos',
        'view_all_href' => '/tienda',
        'items' => [
            ['name' => 'Extra virgen', 'href' => '/tienda'],
            ['name' => 'Botellas', 'href' => '/tienda'],
            ['name' => 'Packs', 'href' => '/tienda'],
            ['name' => 'Regalos', 'href' => '/tienda'],
            ['name' => 'Cocina', 'href' => '/tienda'],
            ['name' => 'Gourmet', 'href' => '/tienda'],
            ['name' => 'Ediciones', 'href' => '/tienda'],
        ],
    ],
];
