<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('customers') }}
        </h2>
    </x-slot>

     <h1 class="text-xl">Edit Customer</h1>
    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
    
    
     <div class="flex items-center justify-center">


    <form method="POST" action="{{ route('customers.update', ['customer' => $customer->id]) }}">
        @method('put')
        @csrf
        <div class="py-3">
            <label for="id" class="block text-sm/6 font-medium text-gray-900">ID</label>
            <input type="text" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="id" aria-describedby="idHelp" name="code" placeholder="ID Customer" disabled="disabled" value="{{ $customer->id }}">
            
        </div>

        <div class="mb-3">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Document_number</label>
            <input type="text"required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="name" name="document" aria-describedby="nameHelp">
        </div>

        <div class="mb-3">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name:</label>
            <input type="text"required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="name" name="name" aria-describedby="nameHelp">
        </div>

        <div class="mb-3">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Last Name:</label>
            <input type="text"required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="name" name="last_name" aria-describedby="nameHelp">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label"class="block text-sm/6 font-medium text-gray-900">Address:</label>
            <input type="text"required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="name" name="address" aria-describedby="nameHelp">
        </div>

        <div class="mb-3">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Birthday:</label>
            <input type="date"required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="name" name="birthday" aria-describedby="nameHelp">
        </div>

        <div class="mb-3">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Phone number:</label>
            <input type="tel"required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="name" name="phone" aria-describedby="nameHelp">
        </div>

        <div class="mb-3">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Email</label>
            <input type="email"required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="name" name="email" aria-describedby="nameHelp">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('customers.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
    </div>

</x-app-layout>