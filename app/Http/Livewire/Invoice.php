<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\Branch;
use App\Models\Customer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Invoice extends Component
{

  public function forgetSession($orderId)
  {
    Session::forget($orderId);

    return redirect()->route('user.orders');
  }

  public function previewInvoice()
  {
    return view('livewire.staff.preview-invoice');
  }


  public function render()
  {
    
    $orderId = Session::get('orderId');   
    if(!empty($orderId)){
      
      $order = Order::where('order_id', $orderId)->first();
      $customer = Customer::where('customer_id', $order->user_id)->first();
      $branch = Branch::where('id', $order->branch_id)->first();
      return view('livewire.invoice',[
        'order' => $order,
        'customer' =>$customer,
        'branch' => $branch,
      ]);
    }else{
      return abort(404);
    }
  }
   
}
