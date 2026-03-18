<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Invoice') }} #{{ $invoice->number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Invoice Number:</label>
                            <input type="number" name="number" value="{{ old('number', $invoice->number) }}" 
                                   class="w-full border-gray-300 rounded shadow-sm focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Date:</label>
                            <input type="date" name="date" value="{{ old('date', $invoice->date) }}" 
                                   class="w-full border-gray-300 rounded shadow-sm focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Customer:</label>
                            <select name="customer_id" class="w-full border-gray-300 rounded shadow-sm" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" 
                                        {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Payment Mode:</label>
                            <select name="pay_mode_id" class="w-full border-gray-300 rounded shadow-sm" required>
                                @foreach($pay_modes as $mode)
                                    <option value="{{ $mode->id }}" 
                                        {{ $invoice->pay_mode_id == $mode->id ? 'selected' : '' }}>
                                        {{ $mode->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-between items-center border-t pt-6">
                        <p class="text-sm text-gray-500 italic">
                            * Note: To edit products, go to the invoice details view.
                        </p>
                        <div>
                            <a href="{{ route('invoices.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded shadow">
                                Update Invoice Header
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>