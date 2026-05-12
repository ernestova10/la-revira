<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketType;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;


class TicketController extends Controller
{
    
    public function index($hermandad_id)
    {
    
        $hermandad = \App\Models\Hermandad::findOrFail($hermandad_id);

        
        $ticketTypes = \App\Models\TicketType::where('hermandad_id', $hermandad_id)->get();

        
        return view('tickets.index', compact('ticketTypes', 'hermandad'));
    }

    
    public function buy(Request $request, $id)
    {
        // 1. Verificar si el usuario ya tiene una papeleta comprada
        $yaTienePapeleta = Purchase::where('user_id', auth()->id())->exists();

        if ($yaTienePapeleta) {
            return redirect()->back()->with('error', 'Lo sentimos, este usuario ya tiene registrada una papeleta de sitio y no puede adquirir otra.');
        }

        // 2. Buscar el tipo de papeleta que quiere comprar
        $ticketType = TicketType::findOrFail($id);

        // Validar que haya stock suficiente
        if ($ticketType->stock <= 0) {
            return redirect()->back()->with('error', 'Lo sentimos, ya no quedan existencias para este tipo de papeleta.');
        }

        // 3. Restar stock del inventario
        $ticketType->decrement('stock');

        // 4. Registrar la compra en la Base de Datos con todos los datos del hermano
        $purchase = Purchase::create([
            'user_id'          => auth()->id(),
            'ticket_type_id'   => $ticketType->id,
            'amount'           => $ticketType->price,
            'status'           => 'completed', 
            'nombre_hermano'   => $request->input('nombre'),   
            'dni_hermano'      => $request->input('dni'),      
            'telefono_hermano' => $request->input('telefono'),
        ]);

        // 5. Redirigir a una pantalla de Recibo o Resumen pasando los datos de la compra
        return view('tickets.compra', compact('purchase', 'ticketType'));
    }




    public function myPurchases()
    {
        
        $purchase = Purchase::where('user_id', auth()->id())
                            ->latest()
                            ->first(); 

        if (!$purchase) {
            return view('tickets.resumen', ['purchase' => null, 'ticketType' => null]);
        }

        $ticketType = $purchase->ticketType;

        return view('tickets.resumen', compact('purchase', 'ticketType'));
    }
}