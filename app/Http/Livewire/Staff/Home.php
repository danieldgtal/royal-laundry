<?php

namespace App\Http\Livewire\Staff;

use App\Models\Order;
use App\Models\Staff;
use App\Models\PickUp;
use Livewire\Component;

class Home extends Component
{

  public $orders, $pickups;
  public $totalOrders,$pendingOrders,$processingOrders,$cancelledOrders,$completedOrders;
  public $totalPickups,$pendingPickups,$completedPickups,$cancelledPickups;

  public function mount()
  {
    $user_id = auth()->user()->id; // get auth user
    $staff = Staff::where('staff_id', $user_id)->first(); // get staff
    $branch_id = $staff->branch_id; //get branch
    

    $this->totalOrders = Order::where('branch_id', $branch_id)->count();
    $this->pendingOrders = Order::where('branch_id', $branch_id)->where('order_status', 'pending')->count();
    $this->processingOrders = Order::where('branch_id', $branch_id)->where('order_status', 'processing')->count();
    $this->cancelledOrders = Order::where('branch_id', $branch_id)->where('order_status', 'cancelled')->count();
    $this->completedOrders = Order::where('branch_id', $branch_id)->where('order_status', 'completed')->count();

    $this->pendingPickups = Pickup::where('branch_id', $staff->branch_id)->where('pickup_status', 'pending')->count();
    $this->cancelledPickups = Pickup::where('branch_id', $staff->branch_id)->where('pickup_status','cancelled')->count();
    $this->completedPickups = Pickup::where('branch_id', $staff->branch_id)->where('pickup_status', 'completed')->count();
    
    $this->totalPickups = PickUp::where('branch_id', $staff->branch_id)->count();
    
    // $this->totalPickups = PickUp::count();
    // $this->pendingPickups = PickUp::where('pickup_status','pending')->count();


  }


  public function render()
  {
    return view('livewire.staff.home');
  }
}
