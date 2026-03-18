<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pay Modes') }}
        </h2>
    </x-slot>

     <h1 class="text-xl font-semibold text-gray-900 flex justify-center ">Agregar nuevo modelo</h1>
    
    
     <div class="flex items-center justify-center">


    <form method="POST" action="{{ route('pay_mode.store') }}">
        @csrf
        <div class="py-3">
            <label for="id" class="block text-sm/6 font-medium text-gray-900">ID</label>
            <input type="text" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="id" aria-describedby="idHelp" name="code" placeholder="ID Customer" disabled="disabled">
            
        </div>

        <div class="mb-3">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name:</label>
            <input type="text"required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="name" name="name" aria-describedby="nameHelp">
        </div>

        <div class="mb-3">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Observation</label>
            <input type="text"required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
            id="name" name="observation" aria-describedby="nameHelp">
        </div>

        
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('pay_mode.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
    </div>

</x-app-layout>