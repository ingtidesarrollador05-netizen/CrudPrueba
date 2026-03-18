<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use App\Models\PayMode;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        // Traemos las facturas con sus relaciones para mostrar nombres en la tabla
        $invoices = Invoice::with(['customer', 'payMode'])->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        // Necesitamos estos datos para los menús desplegables (selects)
        $customers = Customer::all();
        $pay_modes = PayMode::all();
        $products = Product::all(); 
        
        return view('invoices.new', compact('customers', 'pay_modes', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:invoices,number',
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'pay_mode_id' => 'required|exists:pay_mode,id',
        ]);

        // Usamos una transacción por seguridad: si falla el detalle, no se crea la factura
        DB::transaction(function () use ($request) {
            $invoice = Invoice::create($request->all());

            // Aquí se guardaría el primer detalle enviado desde el formulario
            $invoice->details()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $request->price, // El precio se guarda para registro histórico
            ]);
        });

        return redirect()->route('invoices.index')
                         ->with('success', 'Factura generada con éxito.');
    }
}