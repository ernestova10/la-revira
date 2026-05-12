<x-app-layout>
    <div class="py-12 bg-white">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Mensajes de Feedback superiores --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded shadow-sm font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded shadow-sm font-semibold">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-6 rounded-lg overflow-hidden shadow">
                <img src="/path-a-tu-imagen-de-la-giralda.jpg" alt="La Revirá" class="w-full object-cover h-64">
            </div>

            <form action="{{ route('tickets.buy', 1) }}" method="POST" id="form-papeleta" class="bg-gray-200 rounded-xl p-8 shadow-md text-gray-800 font-sans">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 text-center font-bold text-sm text-gray-700 tracking-wider">
                    <div>DATOS PERSONALES</div>
                    <div>SELECCIONA HERMANDAD</div>
                    <div>SELECCIONA PAPELETA</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    {{-- Bloque 1: Datos Personales --}}
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold mb-1 text-gray-700 uppercase">Nombre y Apellidos</label>
                            <input type="text" name="nombre" required class="w-full p-2 border-0 rounded bg-white shadow-sm focus:ring-2 focus:ring-indigo-900">
                        </div>
                        <div>
                            <label class="block text-xs font-bold mb-1 text-gray-700 uppercase">DNI</label>
                            <input type="text" name="dni" required class="w-full p-2 border-0 rounded bg-white shadow-sm focus:ring-2 focus:ring-indigo-900">
                        </div>
                        <div>
                            <label class="block text-xs font-bold mb-1 text-gray-700 uppercase">Correo electrónico</label>
                            <input type="email" name="email" required class="w-full p-2 border-0 rounded bg-white shadow-sm focus:ring-2 focus:ring-indigo-900">
                        </div>
                        <div>
                            <label class="block text-xs font-bold mb-1 text-gray-700 uppercase">Teléfono</label>
                            <input type="text" name="telefono" required class="w-full p-2 border-0 rounded bg-white shadow-sm focus:ring-2 focus:ring-indigo-900">
                        </div>
                        <div>
                            <label class="block text-xs font-bold mb-1 text-gray-700 uppercase">Dirección</label>
                            <input type="text" name="direccion" required class="w-full p-2 border-0 rounded bg-white shadow-sm focus:ring-2 focus:ring-indigo-900">
                        </div>
                    </div>

                    {{-- Bloque 2: Selecciona Hermandad (Datos fijos de la consulta) --}}
                    <div class="space-y-4">
                        <div>
                            <span class="block text-xs font-bold mb-1 text-gray-700 uppercase">Hermandad</span>
                            <div class="w-full p-2 bg-white rounded shadow-sm text-center font-semibold border-0 text-gray-600">
                                {{ $hermandad->nombre }}
                            </div>
                        </div>
                        
                        <div class="bg-white p-4 rounded shadow-sm space-y-2 text-xs text-gray-600 min-h-[120px]">
                            <p class="font-bold text-gray-700">Día de salida:</p>
                            <p class="mb-2">{{ $hermandad->dia_salida ?? 'Por determinar' }}</p>
                            <p class="font-bold text-gray-700">Templo:</p>
                            <p>{{ $hermandad->templo ?? 'Por determinar' }}</p>
                        </div>
                    </div>

                    {{-- Bloque 3: Selecciona Papeleta (Aquí inyectamos dinámicamente tus datos) --}}
                    <div class="space-y-4 flex flex-col justify-between">
                        <div>
                            <label class="block text-xs font-bold mb-1 text-gray-700 uppercase">Tipo de Papeleta</label>
                            <select name="ticket_type_id" id="ticket_type_id" onchange="actualizarInfoPapeleta()" class="w-full p-2 border-0 rounded bg-white shadow-sm focus:ring-2 focus:ring-indigo-900 text-sm">
                                @foreach ($ticketTypes as $ticket)
                                    <option value="{{ $ticket->id }}" data-precio="{{ number_format($ticket->price, 2) }}" data-stock="{{ $ticket->stock }}">
                                        {{ $ticket->name }} {{ $ticket->stock <= 0 ? '(Agotado)' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Cuadro dinámico que muestra los detalles del ticket seleccionado --}}
                        <div class="bg-white p-4 rounded shadow-sm text-center space-y-3 min-h-[120px] flex flex-col justify-center">
                            <p id="papeleta-nombre" class="font-bold text-gray-800 text-sm">Cargando...</p>
                            <p class="text-xs text-gray-600">Precio: <span id="papeleta-precio" class="font-bold text-indigo-900">0.00 €</span></p>
                            <p id="papeleta-stock" class="text-[10px] font-medium text-gray-400"></p>
                        </div>
                        
                        {{-- Caja Azul Oscuro de la Tarjeta de Crédito --}}
                        <div class="bg-[#1a233a] text-white p-4 rounded-lg shadow-inner space-y-3">
                            <div class="text-center text-[10px] font-semibold tracking-wider uppercase opacity-80">Número de tarjeta</div>
                            <input type="text" name="card_number" placeholder="XXXX XXXX XXXX XXXX" required class="w-full p-1.5 text-center text-xs text-gray-900 rounded border-0 focus:ring-2 focus:ring-indigo-400">
                            
                            <div class="grid grid-cols-2 gap-2 text-center">
                                <div>
                                    <label class="block text-[9px] uppercase font-semibold opacity-80 mb-0.5">Fecha caducidad</label>
                                    <input type="text" name="card_expiry" placeholder="MM/AA" required class="w-full p-1.5 text-center text-xs text-gray-900 rounded border-0">
                                </div>
                                <div>
                                    <label class="block text-[9px] uppercase font-semibold opacity-80 mb-0.5">CVV</label>
                                    <input type="text" name="card_cvv" placeholder="123" required class="w-full p-1.5 text-center text-xs text-gray-900 rounded border-0">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Botón inferior de Confirmación --}}
                <div class="mt-8 text-center">
                    <button type="submit" id="btn-submit" class="bg-[#1a233a] hover:bg-indigo-950 text-white font-bold py-3 px-8 rounded tracking-widest text-xs uppercase shadow transition duration-200">
                        CONFIRMAR INSCRIPCIÓN Y PAGAR
                    </button>
                </div>
            </form>

        </div>
    </div>

    {{-- Script para cambiar el precio y la acción del formulario según el desplegable --}}
    <script>
        function actualizarInfoPapeleta() {
            const select = document.getElementById('ticket_type_id');
            const option = select.options[select.selectedIndex];
            
            const precio = option.getAttribute('data-precio');
            const stock = parseInt(option.getAttribute('data-stock'));
            const nombre = option.text;
            const id = select.value;

            // Actualizamos los textos del cuadro blanco
            document.getElementById('papeleta-nombre').innerText = nombre;
            document.getElementById('papeleta-precio').innerText = precio + ' €';
            
            const stockLabel = document.getElementById('papeleta-stock');
            const btnSubmit = document.getElementById('btn-submit');
            const form = document.getElementById('form-papeleta');

            // Cambiamos la ruta del formulario dinámicamente para que apunte al ID correcto
            form.action = "{{ route('tickets.buy', '') }}/" + id;

            if (stock > 0) {
                stockLabel.innerText = "Quedan " + stock + " unidades disponibles";
                stockLabel.className = "text-[10px] font-medium text-green-600";
                btnSubmit.disabled = false;
                btnSubmit.className = "bg-[#1a233a] hover:bg-indigo-950 text-white font-bold py-3 px-8 rounded tracking-widest text-xs uppercase shadow transition duration-200";
                btnSubmit.innerText = "CONFIRMAR INSCRIPCIÓN Y PAGAR";
            } else {
                stockLabel.innerText = "No hay existencias disponibles";
                stockLabel.className = "text-[10px] font-bold text-red-600";
                btnSubmit.disabled = true;
                btnSubmit.className = "bg-gray-400 text-gray-200 font-bold py-3 px-8 rounded tracking-widest text-xs uppercase cursor-not-allowed shadow";
                btnSubmit.innerText = "AGOTADO";
            }
        }

        // Ejecutar al cargar la página por primera vez
        document.addEventListener('DOMContentLoaded', actualizarInfoPapeleta);
    </script>
</x-app-layout>