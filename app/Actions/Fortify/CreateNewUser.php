<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Customer;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{   
    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */

    public function create(array $input)// :User
    { 
        
       Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required','string','max:10'],
            'phone' => 'nullable|regex:/^[0-9\-]{10,20}$/',
            'address' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['firstname']. " " .$input['lastname'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
             
        // Create new customer instance
        $date = DateTime::createFromFormat('d/m/Y',$input['dob']);
        if($date){
          $formattedDate = $date->format('Y-m-d');
        }else{
          $formattedDate = null;
        }
       
        $customer = Customer::create([
          'customer_id' => $user->id,
          'firstname' => $input['firstname'],
          'lastname' => $input['lastname'],
          'email' => $user->email,
          'phone' =>$user->phone,
          'dob' => $formattedDate ?? null,
          'address' => $input['address'] ?? null,
          'city' => $input['city'] ?? null,
          'state' => $input['state'] ?? null,
          'gender' => $input['gender'],

        ]);
           
        return $user;
    }
}
