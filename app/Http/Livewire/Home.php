<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
  public $orders;
  public $totalOrders,$pendingOrders,$processingOrders,$cancelledOrders;

 
  public function mount()
  {
    $userId = Auth::id();
    $this->orders = Order::where('user_id', $userId)
      ->orderByDesc('created_at')
      ->limit(5)
      ->get();

      
    $this->totalOrders = Order::where('user_id', $userId)->count();
    $this->pendingOrders = Order::where('user_id', $userId, 'pending')->count();
    $this->processingOrders = Order::where('order_status', $userId, 'processing')->count();
    $this->cancelledOrders = Order::where('order_status', $userId, 'cancelled')->count();
  
  }




  
  public function render()
  {
    return view('livewire.home');
  }
}
