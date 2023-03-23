<?php

namespace App\Http\Livewire\Staff;

use App\Models\Customer;
use App\Models\PickUp;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Pickups extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  
  public $per_page = 10;
  public $user_id, $pickup_id, $pickup_date, $pickup_status,$pickup_note, $u_pickup_status;
  public $customer_firstname, $customer_lastname,$customer_phone,$customer_city,$customer_address;

  public function viewPickUpModal($id)
  {
    $order = PickUp::where('id', $id)->first();
    $this->user_id = $order->user_id;
    $this->pickup_id = $order->pickup_id;
    $this->pickup_date = $order->pickup_date;
    $this->pickup_status = $order->pickup_status;
    $this->pickup_note = $order->pickup_note;
    
    $customer = Customer::where('customer_id', $this->user_id)->first();
    
    $this->customer_firstname = $customer->firstname;
    $this->customer_lastname = $customer->lastname;
    $this->customer_phone = $customer->phone;
    $this->customer_city = $customer->city;
    $this->customer_address = $customer->address;


    $this->dispatchBrowserEvent('show-view-order-modal');

  }

  public function updatePickupStatus()
  {
    $order = PickUp::where('pickup_id', $this->pickup_id)->first();
    //run a validation on pickup status to check which integer is coming
   
    $order->pickup_status = $this->u_pickup_status;
    $order->save();

    session()->flash('message','Order Status has been Update Successfully');
    $this->dispatchBrowserEvent('close-modal');
  }


  public function render()
  { 
    
    $items = PickUp::latest()->get();
    $items = PickUp::paginate($this->per_page);

    return view('livewire.staff.pickups',[
      'items' => $items,
    ]);
  }
}
