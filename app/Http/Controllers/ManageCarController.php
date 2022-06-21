<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Vehicle;
use App\Models\Owner;
use Illuminate\Http\Request;

class ManageCarController extends Controller
{
    public function managecar()
    {
        $vehicles = Vehicle::with('rental')->get();

        // return $vehicles;
        $owners = Owner::all(); 
        return view('admin.managecar', compact('vehicles', 'owners'));
    }

    public function store(Request $request)
    {
       $formFields = $request->validate([
        'vin' => 'required',
        'owner_id' => 'required',
        'odometer' => 'required',
        'make' => 'required',
        'model' => 'required',
        'year' => 'required',
        'available_indicator' => 'required',
        'condition_desc' => 'required'
       ]);

    // return $formFields;

    //    $user_id = auth()->id();
    //    $formFields['user_id'] = $user_id;

       Vehicle::create($formFields);

       return back()->with('message', 'Car info added successfully!');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'vin' => 'required',
            'owner_id' => 'required',
            'odometer' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'available_indicator' => 'required',
            'condition_desc' => 'required'
            
        ]);

        // $user_id = auth()->id();

        $updatecar = Vehicle::find($id);

        $updatecar->vin = $request->vin;
        $updatecar->owner_id = $request->owner_id;
        $updatecar->odometer = $request->odometer;
        $updatecar->make = $request->make;
        $updatecar->model = $request->model;
        $updatecar->year = $request->year;
        $updatecar->available_indicator = $request->available_indicator;
        $updatecar->condition_desc = $request->condition_desc;

        // return $updatecar;

        $updatecar->update();

        return back()->with('message', 'Car Record updated successfully!');

    }

    public function single_vehicle($id)
    {
        $vehicleinfo = Vehicle::find($id);
        return view('admin.single-car', compact('vehicleinfo'));
    }
}
