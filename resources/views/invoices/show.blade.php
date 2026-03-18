<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de Factura #{{ $invoice->number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <div class="mb-4">
                    <p><strong>Cliente:</strong> {{ $invoice->customer->first_name }} {{ $invoice->customer->last_name }}</p>
                    <p><strong>Fecha:</strong> {{ $invoice->date }}</p>
                    <p><strong>Método de Pago:</strong> {{ $invoice->payMode->name }}</p>
                </div>

                <table class="w-full mt-4 border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Producto</th>
                            <th class="border px-4 py-2">Cantidad</th>
                            <th class="border px-4 py-2">Precio Unitario</th>
                            <th class="border px-4 py-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice->details as $detail)
                        <tr>
                            <td class="border px-4 py-2">{{ $detail->product->name }}</td>
                            <td class="border px-4 py-2 text-center">{{ $detail->quantity }}</td>
                            <td class="border px-4 py-2 text-right">${{ number_format($detail->price, 2) }}</td>
                            <td class="border px-4 py-2 text-right">${{ number_format($detail->quantity * $detail->price, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="mt-4">
                    <a href="{{ route('invoices.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>