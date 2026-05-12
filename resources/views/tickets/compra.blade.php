@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto my-10 p-8 bg-white shadow-lg rounded-lg border-t-4 border-[#1a233a]">
    
    
    @if(is_null($purchase))
        <div class="text-center py-10">
            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h1 class="text-xl font-bold text-gray-700 mb-2">Sin papeletas registradas</h1>
            <p class="text-gray-500 text-sm max-w-sm mx-auto mb-6">Aún no has adquirido ninguna papeleta de sitio en La Revirá para esta Semana Santa.</p>
            <a href="/" class="bg-[#1a233a] hover:bg-indigo-950 text-white font-semibold py-2 px-6 rounded shadow text-sm transition">
                Ver Hermandades
            </a>
        </div>

    
    @else
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold uppercase tracking-wider text-[#1a233a]">Resumen de Inscripción</h1>
            <p class="text-sm text-gray-500">La Revirá - Semana Santa de Sevilla</p>
        </div>

        {{-- Este aviso de éxito SOLO saldrá si acaba de realizar la compra ahora mismo --}}
        @if(session('success') || request()->is('papeletas/comprar/*'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r">
                <p class="text-green-700 font-medium text-sm">¡Inscripción confirmada y pago simulado con éxito!</p>
            </div>
        @endif

        <div class="border-b pb-4 mb-4">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">Datos del Hermano</h2>
            <p class="text-gray-600"><strong class="text-gray-800">Nombre y Apellidos:</strong> {{ $purchase->nombre_hermano }}</p>
            <p class="text-gray-600"><strong class="text-gray-800">DNI:</strong> {{ $purchase->dni_hermano }}</p>
            <p class="text-gray-600"><strong class="text-gray-800">Teléfono:</strong> {{ $purchase->telefono_hermano }}</p>
        </div>

        <div class="border-b pb-4 mb-4">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">Detalles de la Papeleta</h2>
            <p class="text-gray-600"><strong class="text-gray-800">Tipo de Sitio:</strong> {{ $ticketType->name ?? 'Papeleta de Sitio' }}</p>
            <p class="text-gray-600"><strong class="text-gray-800">Importe Pagado:</strong> {{ number_format($purchase->amount, 2) }} €</p>
            <p class="text-gray-600"><strong class="text-gray-800">Referencia de Transacción:</strong> #REV-{{ str_pad($purchase->id, 6, '0', STR_PAD_LEFT) }}</p>
            <p class="text-gray-600"><strong class="text-gray-800">Fecha de Emisión:</strong> {{ $purchase->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div class="text-center my-8 p-4 bg-gray-50 rounded border border-dashed border-gray-300">
            <div class="font-mono text-xs text-gray-400 mb-1">CÓDIGO DE CONTROL DIGITAL</div>
            <div class="inline-block bg-black text-white px-10 py-3 tracking-[0.5em] font-bold select-none">
                ||||| | |||| ||| || |||
            </div>
            <p class="text-xs text-gray-500 mt-2">Muestre este código en la cofradía el día de la salida.</p>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="/" class="text-sm text-indigo-600 hover:underline font-medium">← Volver al Inicio</a>
            <button onclick="window.print()" class="bg-[#1a233a] hover:bg-indigo-950 text-white font-semibold py-2 px-6 rounded shadow text-sm transition">
                Imprimir Papeleta
            </button>
        </div>
    @endif

</div>
@endsection