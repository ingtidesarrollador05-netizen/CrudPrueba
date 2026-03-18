<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create New Invoice') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('invoices.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block font-bold">Numero de factura</label>
                            <input type="number" name="number" class="w-full border-gray-300 rounded shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-bold">Date</label>
                            <input type="date" name="date" value="{{ date('Y-m-d') }}" class="w-full border-gray-300 rounded shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-bold">Cliente</label>
                            <select name="customer_id" class="w-full border-gray-300 rounded shadow-sm" required>
                                <option value="">Seleccionar cliente</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block font-bold">Pay Mode</label>
                            <select name="pay_mode_id" class="w-full border-gray-300 rounded shadow-sm" required>
                                <option value="">Select Payment Method</option>
                                @foreach($pay_modes as $mode)
                                    <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr class="my-6">
                    <h3 class="text-lg font-semibold mb-4 text-blue-800">First Product Detail</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-gray-50 p-4 rounded border">
                        <div>
                            <label class="block text-sm font-bold">Product</label>
                            <select name="product_id" class="w-full border-gray-300 rounded" required>
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} (${{ $product->price }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold">Quantity</label>
                            <input type="number" name="quantity" min="1" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold">Price (Unit)</label>
                            <input type="number" name="price" class="w-full border-gray-300 rounded" placeholder="Price will be saved" required>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded">
                            Save Factura
                        </button>
                        <a href="{{ route('invoices.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>