<?php

namespace App\Http\Livewire\Staff;

use App\Models\Order;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class PreviewOrder extends Component
{
  public $invoiceId;
  public $order;
  public $customer;
  public $branch;
  public $order_details;


  public function mount()
  {
    
    $invoice_id = Session::get('invoice_id');
    $this->invoiceId = $invoice_id;

    $this->order = Order::where('order_id',$invoice_id)->first();
    
    $this->customer = Customer::where('customer_id', $this->order->user_id)->first();

    $this->branch = Branch::where('id', $this->order->branch_id)->first();

  }

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

  public function render()
  {
    return view('livewire.staff.preview-order');
  }
}
