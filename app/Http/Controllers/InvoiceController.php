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
        // Traemos las facturas con sus relaciones
        $invoices = Invoice::with(['customer', 'payMode'])->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
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
            'pay_mode_id' => 'required|exists:pay_modes,id', // Corregido a plural 'pay_modes'
        ]);

        DB::transaction(function () use ($request) {
            $invoice = Invoice::create($request->all());

            // Guardamos el detalle inicial
            $invoice->details()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $request->price, 
            ]);
        });

        return redirect()->route('invoices.index')
                         ->with('success', 'Factura generada con éxito.');
    }

    // --- NUEVOS MÉTODOS AÑADIDOS ---

    public function show($id)
    {
        // Carga la factura con el cliente, el modo de pago y los productos dentro de los detalles
        $invoice = Invoice::with(['customer', 'payMode', 'details.product'])->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $customers = Customer::all();
        $pay_modes = PayMode::all();
        return view('invoices.edit', compact('invoice', 'customers', 'pay_modes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'required|unique:invoices,number,' . $id,
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'pay_mode_id' => 'required|exists:pay_modes,id',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', 'Factura actualizada con éxito.');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Factura eliminada.');
    }
}