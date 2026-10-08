@extends('layouts.store')

@section('title', 'Oliva | Ecommerce natural')

@section('content')
    <section class="hero">
        <div class="container hero-content">
            <div class="hero-copy">
                <p class="eyebrow">Ecommerce natural y premium</p>
                <h1>Oliva, tu tienda lista para crecer.</h1>
                <p>Una base visual para iniciar el proyecto con catalogo, categorias, productos destacados y llamados de compra preparados para conectar luego con modelos, carrito y pagos.</p>
                <div class="hero-actions">
                    <a class="button" href="{{ route('products.index') }}">Explorar productos</a>
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

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <h2>Productos destacados</h2>
                <p>Tarjetas listas para reemplazarse por datos reales desde base de datos cuando armemos el catalogo.</p>
            </div>
            <div class="product-grid">
                @foreach ($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </section>

    <section class="band">
        <div class="container band-inner">
            <div>
                <h2>Base ecommerce preparada para iterar.</h2>
                <p>El siguiente paso natural es crear modelos de productos, categorias, carrito, checkout y panel administrativo.</p>
            </div>
            <a class="button secondary" href="{{ route('products.index') }}">Ver catalogo</a>
        </div>
    </section>

    <section class="section" id="contacto">
        <div class="container">
            <div class="section-heading">
                <h2>Recibir novedades</h2>
                <p>Formulario base con validacion de Laravel, mensajes accesibles y estados claros para integrarlo luego con CRM o mailing.</p>
            </div>

            @if (session('contact_status'))
                <div class="alert alert-success" role="status">
                    {{ session('contact_status') }}
                </div>
            @endif

            <form class="form-panel" method="POST" action="{{ route('contact.store') }}" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="contact-name">Nombre</label>
                        <input
                            class="form-control @error('name') is-invalid @enderror"
                            id="contact-name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            required
                            aria-describedby="contact-name-error"
                        >
                        @error('name')
                            <div class="invalid-feedback" id="contact-name-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="contact-email">Correo</label>
                        <input
                            class="form-control @error('email') is-invalid @enderror"
                            id="contact-email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            aria-describedby="contact-email-error"
                        >
                        @error('email')
                            <div class="invalid-feedback" id="contact-email-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="contact-interest">Interes</label>
                        <select
                            class="form-select @error('interest') is-invalid @enderror"
                            id="contact-interest"
                            name="interest"
                            required
                            aria-describedby="contact-interest-error"
                        >
                            <option value="">Selecciona una opcion</option>
                            <option value="catalogo" @selected(old('interest') === 'catalogo')>Catalogo y lanzamientos</option>
                            <option value="regalos" @selected(old('interest') === 'regalos')>Regalos corporativos</option>
                            <option value="mayorista" @selected(old('interest') === 'mayorista')>Compra mayorista</option>
                        </select>
                        @error('interest')
                            <div class="invalid-feedback" id="contact-interest-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="contact-phone">Telefono opcional</label>
                        <input
                            class="form-control @error('phone') is-invalid @enderror"
                            id="contact-phone"
                            name="phone"
                            type="tel"
                            value="{{ old('phone') }}"
                            autocomplete="tel"
                            aria-describedby="contact-phone-error"
                        >
                        @error('phone')
                            <div class="invalid-feedback" id="contact-phone-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="contact-message">Mensaje</label>
                        <textarea
                            class="form-control @error('message') is-invalid @enderror"
                            id="contact-message"
                            name="message"
                            rows="4"
                            aria-describedby="contact-message-error"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback" id="contact-message-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button class="button" type="submit">Enviar solicitud</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="section" id="beneficios">
        <div class="container feature-grid">
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
@endsection
