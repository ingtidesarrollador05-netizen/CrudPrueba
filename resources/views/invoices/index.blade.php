<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Invoices') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('invoices.create') }}" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                    New Invoice
                </a>

                <table class="table w-full mt-4 border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Number</th>
                            <th class="border px-4 py-2">Customer</th>
                            <th class="border px-4 py-2">Date</th>
                            <th class="border px-4 py-2">Pay Mode</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $invoice->number }}</td>
                            <td class="border px-4 py-2">{{ $invoice->customer->name }}</td>
                            <td class="border px-4 py-2 text-center">{{ $invoice->date }}</td>
                            <td class="border px-4 py-2">{{ $invoice->payMode->name }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="text-blue-600 font-bold">View Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>