<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Owner;
use App\Models\Branch;
use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\BranchAddress;
use App\Models\CustomerAddress;

class AdminController extends Controller
{ 
    public function index()
    {
        return view('welcome');
    }
    
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function addvehicle()
    {
        $owners = Owner::all();

        // return $owner->name;

        return view('admin.addcar', compact('owners'));
    }

    public function show()
    {
        
        return view('admin.addowner');
    }
    public function create(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required',
        ]);

        //  return $formFields;

        $user_id = auth()->id();
        $formFields['user_id'] = $user_id;

        Owner::create($formFields);

        return back()->with('message', 'Owner Details added successfully!');
    }

    public function managecustomer()
    {
        $customers = Customer::with('rentals', 'branch', 'address')->get();
        // return $customers;
        // $branch_items = [];
        // foreach($customers as $item){
        //     foreach($item->branch as $branch_item){
        //         $branch = Branch::find($branch_item->customer_id);
        //         array_push($branch_item, $branch);
        //     }
        // }

        // return $branch_items;

        // dd($branches);
        // $customeraddress = Customer::with('customeraddresses')->get();
        // return $customeraddress;
          
        return view('admin.managecustomer', compact('customers'));
    }

    public function addcustomer(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required',
            'str_1' => 'required',
            'str_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'branch' => 'required'
        ]);


        // return $request;
        
        // Insert Customer record into customer table
        $addcustomer = new Customer;
        $addcustomer->fname = $request->firstname;
        $addcustomer->lname = $request->lastname;
        $addcustomer->email = $request->email;
        $addcustomer->phone = $request->phone;
        $addcustomer->gender = $request->gender;

        $addcustomer->save();

        $customer_id = $addcustomer->id;

        // Insert Customer record into Address table
        $address = new Address;
        $address->str_1 = $request->str_1;
        $address->customer_id = $customer_id;
        $address->str_2 = $request->str_2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip = $request->zip;

        $address->save();
        $address_id = $address->id;

        // Insert Record into Customer Address Table
        $customeraddress = new CustomerAddress;
        $customeraddress->customer_id = $customer_id;
        $customeraddress->address_id = $address_id;
        $customeraddress->save();

        // Insert Record into Branch Table
        $branch = new Branch;
        $branch->name = $request->branch;
        $branch->customer_id = $customer_id;
        $branch->save();
        $branch_id = $branch->id;
       

        // Insert Record into Branch Address Table
        $branchaddress = new BranchAddress;
        $branchaddress->address_id = $address_id;
        $branchaddress->branch_id = $branch_id;

        $branchaddress->save();

        return back()->with('message', 'Customer Info added successfully!');
    }

    public function update_customer(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'branch' => 'required',
            'str_1' => 'required',
            'str_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        // return $request;

        $updateCustomer = Customer::find($id);
        // return $updateCustomer;
        $updateCustomer->fname = $request->firstname;
        $updateCustomer->lname = $request->lastname;
        $updateCustomer->email = $request->email;
        $updateCustomer->phone = $request->phone;
        $updateCustomer->gender = $request->gender;

        $updateCustomer->save();

        $branchId = $updateCustomer->id;

        // return $branchId;

        $updateBranch = Branch::find($updateCustomer->id);
        // return $updateBranch;
        // if(empty($request->branch)){
        //     $updateBranch->name = $request->branch;
        // }else{
        //     $updateBranch->name = $updateBranch->name;
        // }
        $updateBranch->name = $request->branch;
        
        // return $updateBranch;
        $updateBranch->save();

        $addId = $updateCustomer->id;
        // return $addId;
        $updateaddress = Address::find($addId);
        // return $updateaddress;
        $updateaddress->str_1 = $request->str_1;
        $updateaddress->str_2 = $request->str_2;
        $updateaddress->city = $request->city;
        $updateaddress->state = $request->state;
        $updateaddress->zip = $request->zip;

        $updateaddress->update();

        return back()->with('message', 'Customer Record Update Successfully!');
    }

}
