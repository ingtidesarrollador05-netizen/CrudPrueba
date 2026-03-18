<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    // Eliminar un producto de la factura
    public function destroy($id)
    {
        $detail = Detail::findOrFail($id);
        $detail->delete();

        return back()->with('success', 'Producto eliminado de la factura.');
    }

    // Actualizar cantidad de un producto en la factura
    public function update(Request $request, $id)
    {
        $detail = Detail::findOrFail($id);
        $detail->update($request->only('quantity'));

        return back()->with('success', 'Cantidad actualizada.');
    }
}