<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class OrderView extends Component
{
  public $invoiceId;
  public $order;
  public $customer;
  public $branch;
  public $order_details;


  public function orderView()
  {
    
    $order_info = Session::get('order_id');
    $order = Order::where('order_id', $order_info)->first();
    $this->order_details = $order;
    
    $branch = Branch::where('id', $order->branch_id)->first();
    $customer = Customer::where('customer_id', $order->user_id)->first();
    
    return view('livewire.staff.order-view', [
      'order' => $this->order_details,
      'branch' => $branch,
      'customer' => $customer,
    ]);
  }

}
