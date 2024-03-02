<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\PickUp;
use App\Models\Invoice;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Home extends Component
{
  public $orders, $pickups;
  public $totalOrders,$pendingOrders,$processingOrders,$cancelledOrders,$completedOrders;
  public $totalPickups,$pendingPickups,$completedPickups,$cancelledPickups;

  public function mount()
  {
    
    $this->totalOrders = Order::all()->count();
    $this->pendingOrders = Order::where('order_status', 'pending')->count();
    $this->processingOrders = Order::where('order_status', 'processing')->count();
    $this->cancelledOrders = Order::where('order_status', 'cancelled')->count();
    $this->completedOrders = Order::where('order_status', 'completed')->count();

    $this->pendingPickups = PickUp::where('pickup_status', 'pending')->count();
    $this->cancelledPickups = PickUp::where('pickup_status','cancelled')->count();
    $this->completedPickups = PickUp::where('pickup_status', 'completed')->count();
    
    $this->totalPickups = PickUp::all()->count();
    
    // $this->totalPickups = PickUp::count();
    // $this->pendingPickups = PickUp::where('pickup_status','pending')->count();


  }

  public function render()
  {
    $total_cost = Invoice::sum('total_cost');
    $totalStandardCost = Invoice::whereIn('invoice_type', ['standard', 'debit'])
    ->sum('paid_amount');
    $debitTotalCost = Invoice::whereIn('invoice_type', ['debit'])
    ->where('total_cost', '>', DB::raw('paid_amount'))
    ->sum(DB::raw('total_cost - paid_amount'));
    $creditTotalCost = Invoice::whereIn('invoice_type', ['credit'])->sum('total_cost');

    return view('livewire.admin.home', [
      'total_cost' => $total_cost,
      'totalStandardCost' => $totalStandardCost,
      'debitTotalCost' => $debitTotalCost,
      'creditTotalCost' => $creditTotalCost,
    ]);
  }
}
