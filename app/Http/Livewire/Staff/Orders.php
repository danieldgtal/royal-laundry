<?php

namespace App\Http\Livewire\Staff;

use App\Models\Order;
use App\Models\Staff;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Invoice;


class Orders extends Component
{ 

  public $per_page = 25;
  public $order_id, $customer_name, $order_date, $pickup_date, $delivery_date, $payment_status, $order_status, $total_cost, $order_note;
  public $invoice_id, $payment_method;

  public function editOrder($id)
  {
    $order = Order::where('order_id', $id)->first();
    $this->order_id = $order->order_id;
    $this->customer_name = $order->customer_name;
    $this->order_date = $order->order_date;
    $this->pickup_date = $order->pickup_date;
    $this->delivery_date = $order->delivery_date;
    $this->payment_status = $order->payment_status;
    $this->order_status = $order->order_status;
    $this->total_cost = $order->total_cost;
    $this->order_note = $order->order_note;

  }

  public function updateOrder(){
    
    $this->validate([
      'payment_status' => 'required|in:paid,unpaid',
      'order_status' => 'required|string|in:processing,pending,completed,cancelled',
      'delivery_date' => 'date|after_or_equal:pickup_date',
      'pickup_date' => 'date|after_or_equal:pickup_date',
      'order_note' => 'string'
    ]);

    
    $order = Order::where('order_id',$this->order_id)->first();

    // Convert the validated date to MySQL date format
    $date_pickup = $this->pickup_date;
    $date_delivery = $this->delivery_date;


    $order->order_id = $this->order_id;
    $order->order_status = $this->order_status;
    $order->payment_status = $this->payment_status;
    $order->order_note = $this->order_note;
    $order->delivery_date = date('Y-m-d',strtotime($date_delivery));
    $order->pickup_date = date('Y-m-d', strtotime($date_pickup));

    
    $order->save();

    $this->reset();

    session()->flash('message', 'Order has been updated successfully');

    $this->dispatchBrowserEvent('close-modal');

    
  }

  public function editInvoice($id)
  {
    $order = Order::where('order_id', $id)->first();
    $this->invoice_id = $id;
    $this->order_id = $order->order_id;

    $this->dispatchBrowserEvent('show-edit-invoice-modal');
  }

  public function addToInvoice(){
    
    //form validation rule
    $this->validate([
      'payment_method' => 'required|string|in:cash,transfer,card',
      
    ]);

    //check if invoice already added to database
    $invoice_check = Invoice::where('invoice_id', $this->order_id)->first();

    if($invoice_check){

      $this->addError('invoice_id','invoice already exists');

    }else{
      $order = Order::where('order_id', $this->order_id)->first();

      $invoice = new Invoice();

      $invoice->invoice_id = $this->invoice_id;
      $invoice->user_id = $order->user_id;
      $invoice->branch_id = $order->branch_id;
      $invoice->customer_name = $order->customer_name;
      $invoice->order_date = $order->order_date;
      $invoice->total_cost = $order->total_cost;
      $invoice->invoice_type = 'standard';
      $invoice->payment_method = $this->payment_method;
      $invoice->date_issued = now();
      $invoice->invoice_date = now();
      $invoice->items = $order->items;

      $invoice->save();

      session()->flash('message','New Invoice Created');

      $this->reset();

      $this->dispatchBrowserEvent('close-modal');

    }   

  }
  public $orderId;

  public function orderView($orderId)
  {

    $order = Order::where('order_id', $orderId)->first();
    $this->orderId = $order;
    
    if(!$this->orderId){
      abort(404);
    }

    session(['order_id' => $orderId]);
    redirect()->route('staff.view-order');
    

  }



  public function render()
  { 

    $user_id = auth()->user()->id; // get auth user

    $staff = Staff::where('staff_id', $user_id)->first(); // get staff
    
    $branch_id = $staff->branch_id; //get branch

    $orders = Order::where('branch_id', $branch_id)->paginate($this->per_page); 

    $customers = Customer::all();
    return view('livewire.staff.orders',[
      'orders'=> $orders,
    ]);
  }
}
