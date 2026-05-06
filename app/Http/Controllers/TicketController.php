<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketType;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    
    public function index()
    {
        $ticketTypes = TicketType::all();
        return view('tickets.index', compact('ticketTypes'));
    }

    
    public function buy(Request $request, $id)
    {
        $ticketType = TicketType::findOrFail($id);

        // Validamos si hay stock disponible
        if ($ticketType->stock <= 0) {
            return back()->with('error', 'Lo sentimos, ya no quedan papeletas de este tipo.');
        }

        // Usamos una transacción para asegurar la integridad de los datos
        DB::transaction(function () use ($ticketType) {
            // 1. Restamos del stock y sumamos al stock reservado
            $ticketType->decrement('stock');
            $ticketType->increment('reserved_stock');

            // 2. Registramos la compra en estado 'pending'
            Purchase::create([
                'user_id' => auth()->id(),
                'ticket_type_id' => $ticketType->id,
                'amount' => $ticketType->price,
                'status' => 'pending', 
            ]);
        });

        return back()->with('success', 'Papeleta seleccionada. Redirigiendo a la pasarela de pago...');
    }
}