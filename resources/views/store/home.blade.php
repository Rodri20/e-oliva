@extends('layouts.store')

@section('title', 'Oliva | Aceites, cuidado y regalos naturales')

@section('content')
    <section class="home-hero">
        <div class="container home-hero-grid">
            <div class="home-hero-copy">
                <p class="eyebrow">Cosecha natural para todos los dias</p>
                <h1>Productos de oliva para cocinar, cuidar y regalar mejor.</h1>
                <p>Una experiencia ecommerce pensada para descubrir productos naturales, comparar opciones y comprar con confianza desde cualquier dispositivo.</p>
                <div class="hero-actions">
                    <a class="button" href="{{ route('products.index') }}">Comprar ahora</a>
                    <a class="button secondary" href="#colecciones">Ver colecciones</a>
                </div>
                <dl class="hero-metrics" aria-label="Beneficios principales">
                    <div>
                        <dt>24h</dt>
                        <dd>preparacion estimada</dd>
                    </div>
                    <div>
                        <dt>S/150</dt>
                        <dd>envio gratis Lima</dd>
                    </div>
                    <div>
                        <dt>100%</dt>
                        <dd>seleccion curada</dd>
                    </div>
                </dl>
            </div>
            <div class="home-hero-media" aria-label="Productos Oliva destacados">
                <img src="https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?auto=format&fit=crop&w=1000&q=80" alt="Aceite de oliva servido en mesa natural">
                <div class="hero-note">
                    <strong>Seleccion premium</strong>
                    <span>Aceites, kits y regalos listos para despacho.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section home-strip" aria-label="Ventajas de compra">
        <div class="container home-strip-grid">
            <div>
                <strong>Pago seguro</strong>
                <span>Preparado para integrar pasarela y confirmacion por servidor.</span>
            </div>
            <div>
                <strong>Stock claro</strong>
                <span>Base lista para variantes, inventario y estados de producto.</span>
            </div>
            <div>
                <strong>Compra movil</strong>
                <span>Interfaz responsive desde 360 px para flujos clave.</span>
            </div>
        </div>
    </section>

    <section class="section" id="colecciones">
        <div class="container">
            <div class="section-heading">
                <h2>Colecciones para cada momento</h2>
                <p>Organiza el catalogo por intencion de compra y ayuda al cliente a decidir mas rapido.</p>
            </div>
            <div class="collection-grid">
                @foreach ($categories as $category)
                    <a class="collection-tile" href="{{ route('products.index') }}">
                        <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}">
                        <span>{{ $category['items'] }}</span>
                        <strong>{{ $category['name'] }}</strong>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section featured-products">
        <div class="container">
            <div class="section-heading">
                <h2>Favoritos de temporada</h2>
                <p>Productos destacados para validar la experiencia de descubrimiento, ficha y compra.</p>
            </div>
            <div class="product-grid">
                @foreach ($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </section>

    <section class="home-story">
        <div class="container home-story-grid">
            <div>
                <p class="eyebrow">Compra con criterio</p>
                <h2>Del catalogo al checkout con una experiencia simple.</h2>
            </div>
            <div class="story-steps">
                <div>
                    <span>01</span>
                    <strong>Explora</strong>
                    <p>Colecciones, productos destacados y fichas claras.</p>
                </div>
                <div>
                    <span>02</span>
                    <strong>Elige</strong>
                    <p>Variantes, precios, stock y beneficios visibles.</p>
                </div>
                <div>
                    <span>03</span>
                    <strong>Compra</strong>
                    <p>Carrito y checkout preparados para pago y entrega.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="contacto">
        <div class="container contact-grid">
            <div class="contact-copy">
                <p class="eyebrow">Novedades y pedidos especiales</p>
                <h2>Recibe lanzamientos o solicita una compra corporativa.</h2>
                <p>Formulario base con validacion Laravel, mensajes accesibles y estados claros para integrarlo luego con CRM o mailing.</p>
            </div>

            <div>
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
        </div>
    </section>
@endsection
