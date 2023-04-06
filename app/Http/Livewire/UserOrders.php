<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserOrders extends Component
{ 
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';

  public $per_page = 10;
  public $orderId, $order_note;
  

  public function orderInfo($id)
  {
   
    $order = Order::where('order_id', $id)->first();
    
    $this->orderId = $order->id;
    $this->order_note = $order->order_note;
 

    $this->dispatchBrowserEvent('show-order-info');

  }

  public function render()
  {
    $user_id = Auth::user()->id;

    $orders = Order::where('user_id', $user_id)->paginate($this->per_page);    

    return view('livewire.user-orders', [
      'orders' => $orders
    ]);
   
  }
}
