<?php

use Illuminate\Support\Facades\Route;

$categories = [
    ['name' => 'Cuidado personal', 'items' => 'Aceites, jabones y kits', 'image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=900&q=80'],
    ['name' => 'Despensa premium', 'items' => 'Selecciones naturales', 'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=900&q=80'],
    ['name' => 'Hogar consciente', 'items' => 'Aromas y accesorios', 'image' => 'https://images.unsplash.com/photo-1602874801007-bd458bb1b8b6?auto=format&fit=crop&w=900&q=80'],
    ['name' => 'Regalos listos', 'items' => 'Combos para ocasiones', 'image' => 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?auto=format&fit=crop&w=900&q=80'],
];

$products = [
    [
        'slug' => 'kit-oliva-esencial',
        'name' => 'Kit Oliva esencial',
        'description' => 'Rutina diaria con aceite corporal, jabon artesanal y crema ligera.',
        'price' => 'S/ 89.00',
        'badge' => 'Nuevo',
        'image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'slug' => 'aceite-extra-virgen',
        'name' => 'Aceite extra virgen',
        'description' => 'Botella premium para cocina saludable, regalos corporativos y despensa gourmet.',
        'price' => 'S/ 42.00',
        'badge' => 'Top venta',
        'image' => 'https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'slug' => 'caja-regalo-botanic',
        'name' => 'Caja regalo botanic',
        'description' => 'Pack curado con productos naturales y empaque listo para entregar.',
        'price' => 'S/ 119.00',
        'badge' => 'Gift',
        'image' => 'https://images.unsplash.com/photo-1607083206968-13611e3d76db?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'slug' => 'vela-aromatica-oliva',
        'name' => 'Vela aromatica Oliva',
        'description' => 'Aroma suave para espacios calidos, con envase reutilizable.',
        'price' => 'S/ 55.00',
        'badge' => 'Hogar',
        'image' => 'https://images.unsplash.com/photo-1603006905003-be475563bc59?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'slug' => 'jabon-artesanal',
        'name' => 'Jabon artesanal',
        'description' => 'Barra natural para uso diario, ideal para piel sensible.',
        'price' => 'S/ 24.00',
        'badge' => 'Natural',
        'image' => 'https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'slug' => 'pack-despensa-gourmet',
        'name' => 'Pack despensa gourmet',
        'description' => 'Seleccion de productos para cocina saludable y regalos corporativos.',
        'price' => 'S/ 135.00',
        'badge' => 'Premium',
        'image' => 'https://images.unsplash.com/photo-1606787366850-de6330128bfc?auto=format&fit=crop&w=900&q=80',
    ],
];

Route::get('/', fn () => view('store.home', [
    'categories' => $categories,
    'products' => array_slice($products, 0, 3),
]))->name('home');

Route::get('/tienda', fn () => view('products.index', [
    'products' => $products,
]))->name('products.index');

Route::get('/tienda/{slug}', function (string $slug) use ($products) {
    $product = collect($products)->firstWhere('slug', $slug);

    abort_if($product === null, 404);

    return view('products.show', ['product' => $product]);
})->name('products.show');

Route::get('/carrito', fn () => view('store.cart', [
    'products' => array_slice($products, 0, 2),
]))->name('cart');

Route::post('/contacto', function () {
    request()->validate([
        'name' => ['required', 'string', 'max:120'],
        'email' => ['required', 'email', 'max:160'],
        'interest' => ['required', 'in:catalogo,regalos,mayorista'],
        'phone' => ['nullable', 'string', 'max:40'],
        'message' => ['nullable', 'string', 'max:1000'],
    ]);

    return back()->with('contact_status', 'Gracias. Registramos tu solicitud y pronto podremos conectarla al flujo comercial.');
})->name('contact.store');
