<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Papeletas de Sitio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Mensaje de éxito --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Mensaje de error --}}
            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800">Selecciona tu puesto en la Hermandad</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @forelse ($ticketTypes as $ticket)
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col justify-between shadow-sm">
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">{{ $ticket->name }}</h4>
                                    <p class="text-gray-600 mb-4 text-lg">Precio: <span class="text-indigo-600 font-extrabold">{{ number_format($ticket->price, 2) }} €</span></p>
                                    
                                    @if ($ticket->stock > 0)
                                        <p class="text-sm text-green-600 font-medium mb-6">
                                            <span class="inline-block w-2.5 h-2.5 bg-green-500 rounded-full mr-1"></span> Quedan {{ $ticket->stock }} unidades disponibles
                                        </p>
                                    @else
                                        <p class="text-sm text-red-600 font-bold mb-6">
                                            <span class="inline-block w-2.5 h-2.5 bg-red-500 rounded-full mr-1"></span> No hay existencias
                                        </p>
                                    @endif
                                </div>

                                <div>
                                    <form action="{{ route('tickets.buy', $ticket->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" 
                                            class="w-full py-3 px-4 rounded-md font-semibold text-white transition duration-200 shadow-sm 
                                            {{ $ticket->stock > 0 ? 'bg-indigo-600 hover:bg-indigo-700 cursor-pointer' : 'bg-gray-400 cursor-not-allowed' }}" 
                                            {{ $ticket->stock > 0 ? '' : 'disabled' }}>
                                            {{ $ticket->stock > 0 ? 'Comprar Papeleta' : 'Agotado' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-8 text-gray-500 bg-gray-50 rounded-lg border border-gray-200 shadow-sm">
                                <p class="text-lg">No hay tipos de papeletas disponibles en este momento. Ejecuta el seeder para crearlos.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>