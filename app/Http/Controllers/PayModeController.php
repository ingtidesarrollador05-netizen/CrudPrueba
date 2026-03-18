<?php

namespace App\Http\Controllers;

use App\Models\PayMode;
use Illuminate\Http\Request;

class PayModeController extends Controller
{
    /**
     * Muestra la lista de modos de pago.
     */
    public function index()
    {
        $pay_modes = PayMode::all();
        return view('PayModel.index', compact('pay_modes'));
    }

    /**
     * Muestra el formulario para crear uno nuevo.
     */
    public function create()
    {
        return view('PayModel.new'); 
    }
    /**
     * Guarda el nuevo modo de pago en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'observation' => 'nullable|max:200',
        ]);

        PayMode::create($request->all());

        return redirect()->route('pay_mode.index')
                         ->with('success', 'Modo de pago creado correctamente.');
    }

    /**
     * Muestra un modo de pago específico (opcional).
     */
    public function show(PayMode $payMode)
    {
        return view('PayModel.show', compact('payMode'));
    }

    /**
     * Muestra el formulario para editar.
     */
    public function edit($id)
    {
        $payMode = PayMode::findOrFail($id);
        return view('PayModel.edit', compact('payMode'));
    }

    /**
     * Actualiza el registro en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'observation' => 'nullable|max:200',
        ]);

        $payMode = PayMode::findOrFail($id);
        $payMode->update($request->all());

        return redirect()->route('PayModel.index')
                         ->with('success', 'Modo de pago actualizado.');
    }

    /**
     * Elimina el registro.
     */
    public function destroy($id)
    {
        $payMode = PayMode::findOrFail($id);
        $payMode->delete();

        return redirect()->route('pay_mode.index')
                         ->with('success', 'Modo de pago eliminado.');
    }
}