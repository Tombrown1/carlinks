<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Rental;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function managerental()
    {
        $vehicles = Vehicle::all();
        $customers = Customer::all();
        $branches = Branch::all();
        $rentals = Rental::get();
        
        return view('admin.manage-rental', compact('vehicles', 'customers', 'branches', 'rentals'));
    }
    
    public function rent(Request $request)
    {
        $this->validate($request,[
            'vehicle_id' => 'required',
            'branch_id' => 'required',
            'customer_id' => 'required',
            'pickup_date' => 'required',
            'dropoff_date' => 'required',
        ]);

        $user_id = auth()->id();

        $rental = new Rental;
        $rental->user_id = $user_id;
        $rental->vehicle_id = $request->vehicle_id;
        $rental->customer_id = $request->customer_id;
        $rental->branch_id = $request->branch_id;
        $rental->pickup_date = $request->pickup_date;
        $rental->dropoff_date = $request->dropoff_date;

        $rental->save();

        return back()->with('message', 'Vehicle successfully Hired!');
    }

    public function vehicle_rented($id)
    {
        $rental = Rental::find($id);
        return view('admin.rented-vehicle', compact('rental'));
    }
}
