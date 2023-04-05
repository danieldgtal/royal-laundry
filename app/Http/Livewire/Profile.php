<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
  public $customer;
  public function mount()
  {
    $user_id = Auth::id();
    $this->customer = Customer::where('customer_id',$user_id)->first();
   
  }

  public function render()
  {
    return view('livewire.profile');
  }
}
