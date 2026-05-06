<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hermandad->nombre }} - La Revirá</title>
    <link rel="icon" type="image/jpg" href="{{ asset('img/Logo.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-blue { background-color: #171E38; }
        .text-custom-blue { color: #171E38; }
        .bg-custom-white { background-color: #F6F6F6; }
        /* Suavizar el scroll para los enlaces internos */
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-custom-white font-sans text-gray-900">

    <header class="bg-white border-b border-gray-200"> 
        <div class="container mx-auto px-4 py-8 flex flex-col items-center"> 
            <div class="flex flex-col items-center justify-center w-full mb-8"> 
                <img src="{{ asset('img/Logo.jpg') }}" alt="La Revirá Logo" class="h-36 w-auto mb-3"> 
                <p class="text-xl font-bold tracking-[0.3em] text-custom-blue text-center uppercase leading-none"> Semana Santa en Sevilla </p> 
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
    <nav class="bg-[#171E38] text-white py-3 sticky top-0 z-50"> 
        <div class="container mx-auto px-6 flex justify-center space-x-8 text-sm font-bold uppercase tracking-widest"> 
            <a href="#historia" class="hover:text-gray-300">Historia</a> 
            <a href="#pasos" class="hover:text-gray-300">Pasos</a>
            <a href="#musica" class="hover:text-gray-300">A. Musical</a> 
            <a href="#recorrido" class="hover:text-gray-300">Recorrido Oficial</a> 
            <a href="/papeletas" class="hover:text-gray-300">Papeletas de sitio</a> 
        </div> 
    </nav>

    <main class="container mx-auto px-4 py-12 max-w-6xl">
        
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16 items-center">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-800 mb-6 uppercase tracking-tight">
                    Hermandad de {{ $hermandad->nombre }}
                </h1>
                <p class="text-gray-600 leading-relaxed text-lg italic">
                    {{ $hermandad->descripcion }}
                </p>
            </div>
            <div class="rounded-xl overflow-hidden shadow-2xl">
                <img src="{{ asset($hermandad->imagen_basilica) }}" alt="Sede de {{ $hermandad->nombre }}" class="w-full h-[400px] object-cover">
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 space-y-16">
                
                <section id="historia">
                    <h2 class="text-2xl font-bold text-custom-blue mb-6 border-l-4 border-custom-blue pl-4">■ Historia de la Hermandad</h2>
                    <div class="prose max-w-none text-gray-700 leading-loose">
                        {!! nl2br(e($hermandad->historia)) !!}
                    </div>
                </section>

                <section id="pasos" class="space-y-12">
                    <h2 class="text-2xl font-bold text-custom-blue mb-6 border-l-4 border-custom-blue pl-4">■ Pasos</h2>
                    
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <img src="{{ asset($hermandad->imagen_cristo) }}" class="w-full md:w-1/2 rounded-lg shadow-md h-80 object-cover">
                        <div class="md:w-1/2">
                            <p class="text-gray-700 leading-relaxed">{{ $hermandad->info_cristo }}</p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row-reverse gap-8 items-start">
                        <img src="{{ asset($hermandad->imagen_virgen) }}" class="w-full md:w-1/2 rounded-lg shadow-md h-80 object-cover">
                        <div class="md:w-1/2">
                            <p class="text-gray-700 leading-relaxed">{{ $hermandad->info_virgen }}</p>
                        </div>
                    </div>
                </section>

                <section id="musica">
                    <h2 class="text-2xl font-bold text-custom-blue mb-6 border-l-4 border-custom-blue pl-4">■ Acompañamiento Musical</h2>
                    <p class="text-gray-700 leading-relaxed bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                        {{ $hermandad->musica }}
                    </p>
                </section>
            </div>

            <aside class="space-y-8">
                <div id="datos" class="bg-custom-blue text-white p-8 rounded-2xl shadow-xl sticky top-24">
                    <h3 class="text-xl font-bold mb-6 border-b border-gray-600 pb-2">Datos de la Hermandad</h3>
                    <ul class="space-y-6 text-sm">
                        <li>
                            <span class="block text-gray-400 uppercase text-xs tracking-widest mb-1">Nombre completo</span>
                            <span class="font-medium">{{ $hermandad->nombre }}</span>
                        </li>
                        <li>
                            <span class="block text-gray-400 uppercase text-xs tracking-widest mb-1">Fundación</span>
                            <span class="font-medium">{{ $hermandad->fundacion }}</span>
                        </li>
                        <li>
                            <span class="block text-gray-400 uppercase text-xs tracking-widest mb-1">Sede Canónica</span>
                            <span class="font-medium">{{ $hermandad->sede }}</span>
                        </li>
                        <li>
                            <span class="block text-gray-400 uppercase text-xs tracking-widest mb-1">Día de salida</span>
                            <span class="font-bold text-yellow-500 text-lg">{{ $hermandad->dia_salida }}</span>
                        </li>
                    </ul>
                    <a href="/hermandades" class="mt-8 block text-center bg-white text-custom-blue py-3 rounded-lg font-bold hover:bg-gray-200 transition-colors">
                        Volver al listado
                    </a>
                </div>
            </aside>

        </div>
    </main>

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