<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class PreviewOrder extends Component
{ 
  public $invoiceId;
  public $customer;
  public $order;
  public $branch;

  public function mount()
  {
    $invoice_id = Session::get('invoice_id');
    $this->invoiceId = $invoice_id;

    $this->order = Order::where('order_id',$invoice_id)->first();
    
    $this->customer = Customer::where('customer_id', $this->order->user_id)->first();

    $this->branch = Branch::where('id', $this->order->branch_id)->first();


  }


  public function render()
  {


    return view('livewire.preview-invoice', [
      'order' => $this->order,
      'customer' => $this->customer,
      'branch' =>$this->branch,
    ]);
  }
}
