<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Pay Mode') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pay_mode.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   required>
                        </div>

                        <div class="mb-4">
                            <label for="observation" class="block text-gray-700 text-sm font-bold mb-2">Observation:</label>
                            <textarea name="observation" id="observation" rows="3"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" 
                                    class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Save Pay Mode
                            </button>
                            <a href="{{ route('pay_mode.index') }}" class="text-blue-500 hover:text-blue-800">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>