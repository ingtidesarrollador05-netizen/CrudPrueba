<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create Product') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-bold">Name</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-bold">Precio</label>
                            <input type="number" name="price" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div>
                            <label class="block font-bold">Almacenasda</label>
                            <input type="number" name="stock" class="w-full border-gray-300 rounded" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold">Categoria</label>
                        <select name="category_id" class="w-full border-gray-300 rounded" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" 
                                    class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Save Product
                            </button>
                            <a href="{{ route('products.index') }}" class="text-blue-500 hover:text-blue-800">
                                Cancel
                </form>
            </div>
        </div>
    </div>
</x-app-layout>