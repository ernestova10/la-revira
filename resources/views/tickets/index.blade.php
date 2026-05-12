<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción Papeleta de Sitio - La Revirá</title>
    <link rel="icon" type="image/jpg" href="{{ asset('img/Logo.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-blue { background-color: #171E38; }
        .text-custom-blue { color: #171E38; }
        .bg-custom-white { background-color: #F6F6F6; }
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

                <a href="/que-ocurre" class="pb-1 border-b-2 transition-colors border-transparent hover:text-custom-blue hover:border-custom-blue">
                    ¿Qué ocurre en Semana Santa?
                </a>

                <a href="/celebraciones" class="pb-1 border-b-2 transition-colors border-transparent hover:text-custom-blue hover:border-custom-blue">
                    Celebraciones principales
                </a>

                <a href="/hermandades" class="pb-1 border-b-2 transition-colors text-custom-blue border-custom-blue">
                    Hermandades
                </a>

                <a href="/vida-cofrade" class="pb-1 border-b-2 transition-colors border-transparent hover:text-custom-blue hover:border-custom-blue">
                    Vida Cofrade
                </a>

                @guest
                    <a href="/register" class="pb-1 border-b-2 transition-colors border-transparent hover:text-custom-blue hover:border-custom-blue">
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
                            <a href="/profile" class="hover:text-custom-blue hover:scale-110 transition-transform"><strong>{{ Auth::user()->name }}</strong></a>
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
            <a href="/hermandades/{{ $hermandad->id }}#historia" class="hover:text-gray-300">Historia</a> 
            <a href="/hermandades/{{ $hermandad->id }}#pasos" class="hover:text-gray-300">Pasos</a>
            <a href="/hermandades/{{ $hermandad->id }}#musica" class="hover:text-gray-300">A. Musical</a> 
            <a href="#" class="text-yellow-500">Papeletas de Sitio</a> 
        </div> 
    </nav>

    <main class="container mx-auto px-4 py-12 max-w-5xl">
        
        {{-- Mensajes de Notificación superiores --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-800 rounded-lg shadow-sm font-semibold text-center">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-800 rounded-lg shadow-sm font-semibold text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-8 rounded-2xl overflow-hidden shadow-xl max-h-80">
            <img src="{{ asset($hermandad->imagen_cristo ?? 'img/Logo.jpg') }}" alt="La Revirá Cofradías" class="w-full object-cover h-80">
        </div>

        <div class="bg-[#EAEAEA] rounded-2xl p-8 md:p-12 shadow-lg max-w-4xl mx-auto">
            
            <form action="/papeletas/comprar/{{ $ticketTypes->first()->id ?? 1 }}" method="POST" id="form-papeleta">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 text-center text-sm font-bold text-gray-700 tracking-wider uppercase">
                    <div>Datos personales</div>
                    <div>Selecciona hermandad</div>
                    <div>Selecciona papeleta</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
                    
                    <div class="space-y-4 text-xs font-bold text-gray-700">
                        <div>
                            <label class="block mb-1 uppercase tracking-wide">Nombre y Apellidos</label>
                            <input type="text" name="nombre" required class="w-full p-2.5 border border-gray-300 rounded bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-[#171E38]">
                        </div>
                        <div>
                            <label class="block mb-1 uppercase tracking-wide">DNI</label>
                            <input type="text" name="dni" required class="w-full p-2.5 border border-gray-300 rounded bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-[#171E38]">
                        </div>
                        <div>
                            <label class="block mb-1 uppercase tracking-wide">Correo electrónico</label>
                            <input type="email" name="email" required class="w-full p-2.5 border border-gray-300 rounded bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-[#171E38]">
                        </div>
                        <div>
                            <label class="block mb-1 uppercase tracking-wide">Teléfono</label>
                            <input type="text" name="telefono" required class="w-full p-2.5 border border-gray-300 rounded bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-[#171E38]">
                        </div>
                        <div>
                            <label class="block mb-1 uppercase tracking-wide">Dirección</label>
                            <input type="text" name="direccion" required class="w-full p-2.5 border border-gray-300 rounded bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-[#171E38]">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <div class="w-full p-2.5 bg-white border border-gray-300 rounded text-center font-bold text-gray-800 tracking-wide shadow-sm uppercase text-xs">
                                {{ $hermandad->nombre }}
                            </div>
                        </div>
                        <div class="bg-white p-5 rounded border border-gray-300 shadow-sm space-y-3 text-xs text-gray-700 min-h-[160px]">
                            <p class="font-bold border-b pb-1 uppercase tracking-wider text-gray-500">Día de salida:</p>
                            <p class="font-medium text-gray-900 text-sm">{{ $hermandad->dia_salida }}</p>
                            
                            <p class="font-bold border-b pb-1 uppercase tracking-wider text-gray-500 pt-2">Sede:</p>
                            <p class="font-medium text-gray-900 leading-tight">{{ $hermandad->sede }}</p>
                        </div>
                    </div>

                    <div class="space-y-5 flex flex-col justify-between h-full">
                        <div>
                            <select name="ticket_type_id" id="ticket_type_id" onchange="actualizarInfoPapeleta()" class="w-full p-2.5 border border-gray-300 rounded bg-white shadow-sm font-semibold text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#171E38] text-xs uppercase tracking-wide">
                                @forelse ($ticketTypes as $ticket)
                                    <option value="{{ $ticket->id }}" data-precio="{{ number_format($ticket->price, 2) }}" data-stock="{{ $ticket->stock }}">
                                        {{ $ticket->name }} {{ $ticket->stock <= 0 ? '(Agotado)' : '' }}
                                    </option>
                                @empty
                                    <option value="">No hay tipos de puestos</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="bg-white p-4 rounded border border-gray-300 shadow-sm text-center space-y-2 min-h-[100px] flex flex-col justify-center">
                            <p id="papeleta-nombre" class="font-bold text-gray-800 text-sm uppercase tracking-wider">Cargando...</p>
                            <p class="text-xs text-gray-600 font-medium">Precio: <span id="papeleta-precio" class="font-bold text-[#171E38]">0.00 €</span></p>
                            <p id="papeleta-stock" class="text-[10px] font-bold"></p>
                        </div>
                        
                        <div class="bg-[#171E38] text-white p-5 rounded-xl shadow-md space-y-3">
                            <div class="text-center text-[10px] font-bold tracking-widest uppercase opacity-80">Número de tarjeta</div>
                            <input type="text" name="card_number" placeholder="XXXX XXXX XXXX XXXX" required class="w-full p-2 text-center text-xs text-gray-900 rounded border-0 font-mono tracking-widest focus:ring-2 focus:ring-blue-400">
                            
                            <div class="grid grid-cols-2 gap-3 text-center">
                                <div>
                                    <label class="block text-[9px] uppercase font-bold opacity-80 mb-1 tracking-wider">Caducidad</label>
                                    <input type="text" name="card_expiry" placeholder="MM/AA" required class="w-full p-2 text-center text-xs text-gray-900 rounded border-0 font-mono">
                                </div>
                                <div>
                                    <label class="block text-[9px] uppercase font-bold opacity-80 mb-1 tracking-wider">CVV</label>
                                    <input type="text" name="card_cvv" placeholder="123" required class="w-full p-2 text-center text-xs text-gray-900 rounded border-0 font-mono">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-8 text-center">
                    <button type="submit" id="btn-submit" class="bg-[#171E38] hover:bg-slate-800 text-white font-bold py-3.5 px-10 rounded text-xs uppercase tracking-[0.2em] shadow-md transition duration-200">
                        Confirmar inscripción y pagar
                    </button>
                </div>
            </form>

        </div>
    </main>

    <footer class="bg-custom-blue text-white py-10">
        <div class="container mx-auto px-4 flex flex-col items-center">
            <p class="text-[10px] text-gray-400 tracking-[0.2em] uppercase text-center">
                © 2026 La Revirá - Sevilla. Todos los derechos reservados.
            </p>
            <div class="flex items-center space-x-8 mt-8">
                <a href="https://www.instagram.com/_lareviradesevilla_/" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-all duration-300 hover:scale-110">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="https://twitter.com/lareviradesev" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-all duration-300 hover:scale-110">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>

    <script>
        function actualizarInfoPapeleta() {
            const select = document.getElementById('ticket_type_id');
            if(!select || select.options.length === 0 || select.value === "") return;

            const option = select.options[select.selectedIndex];
            const precio = option.getAttribute('data-precio');
            const stock = parseInt(option.getAttribute('data-stock'));
            const nombre = option.text;
            const id = select.value;

            // Pintar la info en el cuadro blanco central
            document.getElementById('papeleta-nombre').innerText = nombre;
            document.getElementById('papeleta-precio').innerText = precio + ' €';
            
            const stockLabel = document.getElementById('papeleta-stock');
            const btnSubmit = document.getElementById('btn-submit');
            const form = document.getElementById('form-papeleta');

            // Actualizar la ruta del formulario de manera nativa sin helpers conflictivos
            form.action = "/papeletas/comprar/" + id;

            // Validar stock disponible
            if (stock > 0) {
                stockLabel.innerText = "Quedan " + stock + " plazas disponibles";
                stockLabel.className = "text-[10px] font-bold text-green-600 uppercase tracking-wider";
                btnSubmit.disabled = false;
                btnSubmit.className = "bg-[#171E38] hover:bg-slate-800 text-white font-bold py-3.5 px-10 rounded text-xs uppercase tracking-[0.2em] shadow-md transition duration-200 cursor-pointer";
                btnSubmit.innerText = "Confirmar inscripción y pagar";
            } else {
                stockLabel.innerText = "Plazas completamente agotadas";
                stockLabel.className = "text-[10px] font-bold text-red-600 uppercase tracking-wider";
                btnSubmit.disabled = true;
                btnSubmit.className = "bg-gray-400 text-gray-200 font-bold py-3.5 px-10 rounded text-xs uppercase tracking-[0.2em] cursor-not-allowed shadow-sm";
                btnSubmit.innerText = "Agotado";
            }
        }

        // Lanzar la sincronización al cargar la estructura HTML
        document.addEventListener('DOMContentLoaded', actualizarInfoPapeleta);
    </script>
</body>
</html>