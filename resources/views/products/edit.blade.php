<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Product') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block font-bold">Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-bold">Price</label>
                            <input type="number" name="price" value="{{ $product->price }}" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div>
                            <label class="block font-bold">Stock</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border-gray-300 rounded" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold">Category</label>
                        <select name="category_id" class="w-full border-gray-300 rounded" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-bold">Update Product</button>
                    <a href="{{ route('products.index') }}" class="ml-2 text-gray-600">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>