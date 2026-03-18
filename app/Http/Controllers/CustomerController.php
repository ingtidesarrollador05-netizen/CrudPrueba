<?php

namespace App\Http\Controllers; // SOLO UNA VEZ

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ahora Laravel ya sabe que "Customer" se refiere a "App\Models\Customer"
        $customers = Customer::paginate(15);
        return view('customers.index', ['customers' => $customers]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer ();

        $customer->document_number = $request->document;
        $customer->first_name = $request->name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->birthday = $request->birthday;
        $customer->phone_number = $request->phone;
        $customer->email = $request->email;
        $customer->save();


         $customers = DB::table('customers')
            ->select('customers.*')
            ->get();
        //return view('customers.index', ['customers' => $customers]);
        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $customer = Customer::findOrFail($id); // Uso de findOrFail

    $customer->document_number = $request->document;
    $customer->first_name = $request->name;
    $customer->last_name = $request->last_name;
    $customer->address = $request->address;
    $customer->birthday = $request->birthday;
    $customer->phone_number = $request->phone;
    $customer->email = $request->email;
    $customer->save();

    // El bloque de DB::table no es necesario aquí porque vas a redireccionar
    return redirect()->route('customers.index')->with('success', 'Customer edited successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        $customers = DB::table('customers')
            ->select('customers.*')
            ->get();
        //return view('customers.index', ['customers' => $customers]);
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');

    }
}