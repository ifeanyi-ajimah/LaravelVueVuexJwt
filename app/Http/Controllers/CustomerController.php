<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return response()->json([
            "customers" => $customers
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create($request->only(["name", "email", "phone", "website"]));
        return response()->json([
            "customer" => $customer
        ],200);
    }

    public function search()
    {
        if($search = \Request::get('q')){
            $customers = Customer::where(function($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%" )
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%")
                ->orWhere('website', 'LIKE', "%$search%");
            })->get();
        }else{
            $customers = Customer::paginate(10);
        }
        // return $customers;
        return response()->json(["customers" => $customers], 200);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show( $customer)
    {
        $customer = Customer::find($customer);
        return response()->json([
            "customer" => $customer
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
