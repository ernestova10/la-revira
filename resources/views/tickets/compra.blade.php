@extends('layouts.app') @section('content')
<div class="max-w-2xl mx-auto my-10 p-8 bg-white shadow-lg rounded-lg border-t-4 border-[#1a233a]">
    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold uppercase tracking-wider text-[#1a233a]">Resumen de Inscripción</h1>
        <p class="text-sm text-gray-500">La Revirá - Semana Santa de Sevilla</p>
    </div>

    <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
        <p class="text-green-700 font-medium">¡Inscripción confirmada y pago simulado con éxito!</p>
    </div>

    <div class="border-b pb-4 mb-4">
        <h2 class="text-lg font-semibold mb-2 text-gray-700">Datos del Hermano</h2>
        <p><strong>Nombre y Apellidos:</strong> {{ $purchase->nombre_hermano }}</p>
        <p><strong>DNI:</strong> {{ $purchase->dni_hermano }}</p>
        <p><strong>Teléfono:</strong> {{ $purchase->telefono_hermano }}</p>
    </div>

    <div class="border-b pb-4 mb-4">
        <h2 class="text-lg font-semibold mb-2 text-gray-700">Detalles de la Papeleta</h2>
        <p><strong>Tipo de Sitio:</strong> {{ $ticketType->name }}</p>
        <p><strong>Importe Pagado:</strong> {{ number_format($purchase->amount, 2) }} €</p>
        <p><strong>Referencia de Transacción:</strong> #REV-{{ str_pad($purchase->id, 6, '0', STR_PAD_LEFT) }}</p>
        <p><strong>Fecha:</strong> {{ $purchase->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="text-center my-8 p-4 bg-gray-50 rounded border border-dashed border-gray-300">
        <div class="font-mono text-xs text-gray-400 mb-1">CÓDIGO DE CONTROL DIGITAL</div>
        <div class="inline-block bg-black text-white px-10 py-3 tracking-[0.5em] font-bold">
            ||||| | |||| ||| || |||
        </div>
        <p class="text-xs text-gray-500 mt-2">Muestre este código en la cofradía el día de la salida.</p>
    </div>

    <div class="flex justify-between items-center mt-6">
        <a href="/" class="text-sm text-indigo-600 hover:underline">← Volver al Inicio</a>
        <button onclick="window.print()" class="bg-[#1a233a] hover:bg-indigo-950 text-white font-semibold py-2 px-6 rounded shadow text-sm transition">
            Imprimir Papeleta
        </button>
    </div>
</div>
@endsection