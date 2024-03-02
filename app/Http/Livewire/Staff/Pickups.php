<?php

namespace App\Http\Livewire\Staff;

use App\Models\Customer;
use App\Models\PickUp;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class Pickups extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  
  public $per_page = 10;
  public $user_id, $pickup_id, $pickup_date, $pickup_status,$pickup_note, $u_pickup_status;
  public $customer_firstname, $customer_lastname,$customer_phone,$customer_city,$customer_address;
  public $search ='';

  public function exportPickUpPdf()
  {
    
    $data = session('pickupData');
    // pass the data to the PDF view
    $view =  view('pdf.pickups', [
      'data' => $data,
    ])->render();

    $pdf = PDF::loadHTML($view)->output();
    return response($pdf,200)->header('Content-Type','application/pdf');
  }

 
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
    $pickup = PickUp::where('pickup_id', $this->pickup_id)->first();
    //run a validation on pickup status to check which integer is coming
    
    $pickup->pickup_status = $this->u_pickup_status;
 
    $pickup->save();

    session()->flash('message','Pickup Status has been Update Successfully');
    $this->dispatchBrowserEvent('close-modal');
  }

 
  
  public function render()
  {  
    $user = Auth::id();
    $staff = Staff::where('staff_id', $user)->first();

    $items = $this->search 
    ? PickUp::where(function($query) use ($staff) {
        $query->where('pickup_id', 'like', '%'.$this->search.'%')
              ->orWhere('pickup_status', 'like', '%'.$this->search.'%')
              ->where('branch_id', $staff->branch_id);
      })
      ->paginate($this->per_page)
    : PickUp::where('branch_id', $staff->branch_id)
      ->orderBy('created_at', 'desc')
      ->paginate($this->per_page);
      

    $pickupData = [];
    foreach($items as $item){
      $pickupData[] = [
        'pickup_id' => $item->pickup_id,
        'user_id' => $item->user_id,
        'pickup_date' => $item->pickup_date,
        'pickup_status' => $item->pickup_status,
      ];
    }

    return view('livewire.staff.pickups',[
      'items' => $items,
      'pickupData' => $pickupData,
    ]);
  }
}
