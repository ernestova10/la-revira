<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Revirá - Semana Santa en Sevilla</title>
    <link rel="icon" type="image/jpg" href="{{ asset('img/Logo.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Configuramos tus colores exactos de Figma */
        .bg-custom-blue { background-color: #171E38; }
        .text-custom-blue { color: #171E38; }
        .bg-custom-white { background-color: #F6F6F6; }
    </style>
</head>
<body class="bg-custom-white font-sans text-gray-900">

    <header class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-8 flex flex-col items-center">
        
        <div class="flex flex-col items-center justify-center w-full mb-8">
            <img src="{{ asset('img/Logo.jpg') }}" alt="La Revirá Logo" class="h-36 w-auto mb-3">
            
            <p class="text-xl font-bold tracking-[0.3em] text-custom-blue text-center uppercase leading-none">
                Semana Santa en Sevilla
            </p>
        </div>
        
        <nav class="flex items-center justify-center space-x-16 text-[16px] font-bold text-gray-800 uppercase tracking-[0.15em] w-full py-4">
                <a href="/" class="{{ request()->is('/') ? 'text-custom-blue' : 'hover:text-custom-blue' }} hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </a>

                <a href="/que-ocurre" 
                class="pb-1 border-b-2 transition-colors {{ request()->is('que-ocurre') ? 'text-custom-blue border-custom-blue' : 'border-transparent hover:text-custom-blue hover:border-custom-blue' }}">
                ¿Qué ocurre en Semana Santa?
                </a>

                <a href="/celebraciones" 
                class="pb-1 border-b-2 transition-colors {{ request()->is('celebraciones') ? 'text-custom-blue border-custom-blue' : 'border-transparent hover:text-custom-blue hover:border-custom-blue' }}">
                Celebraciones principales
                </a>

                <a href="/hermandades" 
                class="pb-1 border-b-2 transition-colors {{ request()->is('hermandades') ? 'text-custom-blue border-custom-blue' : 'border-transparent hover:text-custom-blue hover:border-custom-blue' }}">
                Hermandades
                </a>

                <a href="/vida-cofrade" 
                class="pb-1 border-b-2 transition-colors {{ request()->is('vida-cofrade') ? 'text-custom-blue border-custom-blue' : 'border-transparent hover:text-custom-blue hover:border-custom-blue' }}">
                Vida Cofrade
                </a>

                @guest
                    <a href="/register" 
                    class="pb-1 border-b-2 transition-colors {{ request()->is('register') ? 'text-custom-blue border-custom-blue' : 'border-transparent hover:text-custom-blue hover:border-custom-blue' }}">
                    Registrar
                    </a>

                    <a href="/login" class="hover:text-custom-blue hover:scale-110 transition-transform" title="Iniciar Sesión">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </a>
                @endguest

                @auth
                    <div class="flex items-center gap-4 pb-1 border-b-2 border-transparent">
                        
                        <span class="text-gray-500 leading-none">
                            <a href="/profile"
                                class="hover:text-custom-blue hover:scale-110 transition-transform"><strong>{{ Auth::user()->name }}</strong>
                            </a>
                        </span>
                        
                        <form method="POST" action="{{ route('logout') }}" class="flex items-center m-0">
                            @csrf
                            <button type="submit" class="text-red-500 hover:underline text-sm font-bold uppercase leading-none">
                                Salir
                            </button>
                        </form>
                        
                    </div>
                @endauth
        </nav>
    </div>
    </header>

    <section class="w-full bg-custom-blue py-6 md:py-8">
        <div class="container mx-auto px-4 flex justify-center">
            <img src="{{ asset('img/cartelSS26.jpeg') }}" 
                alt="Cartel Semana Santa 2026 - El Cachorro" 
                class="w-auto h-auto max-h-[55vh] shadow-[0_35px_60px_-15px_rgba(0,0,0,0.6)] rounded-sm transform transition-all duration-500 hover:scale-[1.01]">
        </div>
    </section>

    <section class="container mx-auto px-4 py-12">
    <div class="bg-custom-blue text-white p-10 max-w-4xl mx-auto relative overflow-hidden">
        <h2 class="text-2xl font-bold mb-6">¿Qué ocurre en Semana Santa?</h2>
        <p class="text-gray-300 leading-relaxed mb-8 max-w-2xl">
            La Semana Santa de Sevilla es una de las celebraciones religiosas y culturales más importantes de la ciudad y una de las más reconocidas a nivel mundial. Durante siete días, desde el Domingo de Ramos hasta el Domingo de Resurrección, Sevilla se transforma para acoger las procesiones de las distintas Hermandades y Cofradías.
        </p>
        <div class="flex justify-end">
            <a href="/que-ocurre" class="bg-white text-custom-blue px-6 py-2 text-xs font-bold uppercase tracking-widest hover:bg-gray-200 transition">Leer más</a>
        </div>
    </div>
</section>

<section class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto px-10">
        <h2 class="text-2xl font-bold text-custom-blue mb-6">Celebraciones principales</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            La Semana Santa de Sevilla está marcada por una serie de celebraciones religiosas y actos tradicionales que llenan la ciudad de solemnidad y emoción. Desde las estaciones de penitencia de las hermandades hasta los oficios litúrgicos en templos y parroquias, cada jornada posee un significado especial dentro del calendario cofrade.
        </p>
        <p class="text-gray-700 leading-relaxed mb-8">
            Momentos como la Madrugá, los cultos en la Catedral o el Domingo de Resurrección forman parte de una programación que combina fe, tradición y cultura, atrayendo cada año a miles de personas.
        </p>
        <div class="flex justify-end">
            <a href="/celebraciones" class="bg-custom-blue text-white px-6 py-2 text-xs font-bold uppercase tracking-widest hover:opacity-90 transition">Leer más</a>
        </div>
    </div>
</section>
    <footer class="bg-custom-blue text-white py-10">
        <div class="container mx-auto px-4 flex flex-col items-center">
            
            <p class="text-[10px] text-gray-400 tracking-[0.2em] uppercase text-center">
                © 2026 La Revirá - Sevilla. Todos los derechos reservados.
            </p>

            <div class="flex items-center space-x-8 mt-8">
                
                <a href="https://www.instagram.com/_lareviradesevilla_/" 
                target="_blank" 
                rel="noopener noreferrer" 
                class="text-gray-400 hover:text-white transition-all duration-300 hover:scale-110">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>

                <a href="https://twitter.com/lareviradesev" 
                target="_blank" 
                rel="noopener noreferrer" 
                class="text-gray-400 hover:text-white transition-all duration-300 hover:scale-110">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>

            </div>
        </div>
    </footer>   

</body>
</html>