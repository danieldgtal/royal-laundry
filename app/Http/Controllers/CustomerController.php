<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('staff.all-customers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.add-customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateNewUser $createNewUser)
    { 

      // Use validated data to create a new user
      $validatedData = $request->validate([
        'firstname' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'gender' => ['required','string','max:10'],
        'phone' => 'nullable|regex:/^[0-9\-]{10,20}$/',
        'address' => 'nullable|string|max:100',
        'city' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'password_confirmation' => ['required', 'string', 'min:8'],
        [
          'password.min' => 'The password must be at least 8 characters long.',
          'password.confirmed' => 'The password and confirm password do not match.',
        ]
      ]);

      $user = User::create([
        'name' => $validatedData['firstname'] . " ". $validatedData['lastname'],
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
      ]);

      // Create new customer instance
      $date = DateTime::createFromFormat('d/m/Y', $request->dob);

      if($date){
        $formattedDate = $date->format('Y-m-d');
      }else{
        $formattedDate = null;
      }
   
      
       $customer = Customer::create([
          'customer_id' => $user->id,
          'firstname' => $validatedData['firstname'],
          'lastname' => $validatedData['lastname'],
          'email' => $user->email,
          'phone' =>$user->phone,
          'dob' => $formattedDate ?? null,
          'address' => $validatedData['address'] ?? null,
          'city' => $validatedData['city'] ?? null,
          'state' => $validatedData['state'] ?? null,
          'gender' => $validatedData['gender'],

        ]);        
        // redirect to a route with a session message
        return redirect(route('staff.all-customers'))->with('success','Customer created Successfully, customer should verify email in their inbox');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
