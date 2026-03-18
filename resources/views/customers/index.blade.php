<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('customers') }}
        </h2>
    </x-slot>

    @if (session('success'))
  <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
    {{ session('success') }}
  </div>    
  @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('customers.create') }}"
                       class="bg-green-700 hover:bg-green-900 text-black font-bold py-2 px-4 rounded ml-2">
                        Add
                    </a>

                    <table class="table w-full mt-4 border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th scope="col" class="border border-gray-300 px-4 py-2">Code</th>
                                <th scope="col" class="border border-gray-300 px-4 py-2">Document_number</th>
                                <th scope="col" class="border border-gray-300 px-4 py-2">First_name</th>
                                <th scope="col" class="border border-gray-300 px-4 py-2">Last_name</th>
                                <th scope="col" class="border border-gray-300 px-4 py-2">Address </th>
                                <th scope="col" class="border border-gray-300 px-4 py-2">Birthday</th>
                                <th scope="col" class="border border-gray-300 px-4 py-2">Phone_number</th>
                                <th scope="col" class="border border-gray-300 px-4 py-2">Email</th>
                                <th scope="col" class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $customer->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $customer->document_number }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $customer->first_name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $customer->last_name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $customer->address }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $customer->birthday }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $customer->phone_number }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $customer->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}"
                                           class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                            Edit
                                        </a>

                                        <form action="{{ route('customers.destroy', ['customer' => $customer->id]) }}"
                                              method="POST" class="inline-block">
                                            @csrf
                                            @method('delete')
                                            <input type="submit"
                                                   class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded ml-2"
                                                   value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $customers->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>