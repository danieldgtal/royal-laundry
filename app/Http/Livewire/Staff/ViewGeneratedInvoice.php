<?php

namespace App\Http\Livewire\Staff;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use App\Models\Staff;
use App\Models\Branch;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ViewGeneratedInvoice extends Component
{

  public $cartItems;
  public $invoiceId;
  public $invoice_type;
  public $customer_name;
  public $payment_method;
  public $customer_email;
  public $invoice;
  public $paid_amount;
  public $side_note;

  protected $listeners = ['submitOrder' => 'submitInvoiceOrder' ];

  
  public function mount()
  { 
    $this->cartItems = Cart::where('user_id', Auth::id())->get();
  }

  public function invoiceView()
  {
    
    $invoice_info = Session::get('invoice_id');

    if($invoice_info){
      $this->invoice = $invoice_info;
      $branch = Branch::where('id', $invoice_info->branch_id)->first();

      return view('livewire.staff.invoice-view', [
        'invoice' => $this->invoice,
        'branch' => $branch,
      ]);
    }else{
      $user = auth()->user();
      if($user->user_type == '1'){
        return redirect('/staff');
      }if($user->user_type == '2'){
        return redirect('/admin');
      }
    }    
  }

  private function computeTotalPrice()
  {
    $total = 0;
    $items = [];

    foreach($this->cartItems as $cartItem){
      $product = Item::findorFail($cartItem->item_id);
      $quantity = $cartItem->quantity;
      $packageUnit = $cartItem->package_unit;
      $price = $product->discounted_price !=0.00 ? $product->discounted_price : $product->price;
      $itemId = $cartItem->id;
      $category = Category::find( $product->category_id);
    
      $items[]= [
        'product' => $product,
        'item_id'=> $itemId,
        'quantity' =>$cartItem->quantity,
        'package_unit' => $cartItem->package_unit,
        'category' =>$product->category_id,
        'category_name' => $category->name,
        'price' => $price,
        'subtotal' =>$price * $cartItem->quantity,
      ];
      
    }

    foreach ($items as $item) {
      $total += $item['subtotal'];
    }

    return ['items'=> $items, 'total'=> $total];
  
  }

  public function removeFromCart($itemId)
  {
    Cart::find($itemId)->delete();
    $this->cartItems = Cart::where('user_id', Auth::id())->get();
    session()->flash('message', 'item has been removed from cart Successfully');
    
  }

  function generateOrderID() {

    $suffix = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT); // Generate a random 6-digit number and pad it with zeroes

    $invoice_id = $suffix; // Combine the prefix and suffix to create the order ID

    // Check if the order ID already exists in the database
    if (DB::table('invoices')->where('invoice_id', $invoice_id)->exists()) {
        // If the order ID already exists, generate a new one recursively
        return $this->generateOrderID();
    }

    return $invoice_id;
  }

  public function submitInvoiceOrder()
  {
    //get user id and carts with userid
    $userId = Auth::user()->id;

    $staff = Staff::where('staff_id', $userId)->first();

    $userBranch = Branch::where('id', $staff->branch_id)->first();
    
    $invoice = new Invoice();
    $invoice->invoice_id = $this->invoiceId = $userBranch->id. $this->generateOrderID();
    $invoice->user_id = $userId;
    $invoice->branch_id = $staff->branch_id;
    $invoice->invoice_type = $this->invoice_type;
    $invoice->customer_name = $this->customer_name;
    $invoice->paid_amount = $this->paid_amount;
    $invoice->order_date = now();
    $invoice->invoice_date = now();
    $invoice->payment_method = $this->payment_method;
    $invoice->date_issued = now();
    $invoice->created_at = now();
    $invoice->updated_at = now();
    $invoice->side_note = $this->side_note;

    // get total price
    $computeCart = $this->computeTotalPrice();

    $invoice->total_cost = $computeCart['total'];
    $invoice->balance_amount = $invoice->total_cost - $invoice->paid_amount;
    $invoice->items = json_encode($computeCart['items']);

    $invoice->save();

    Cart::where('user_id', auth()->user()->id)->delete();

    $this->dispatchBrowserEvent('invoiceSaved');

  }

  public function invoiceRequest()
  {
    // dd('reach here');
    $this->validate([
      'payment_method' => 'required|string',
      'invoice_type' =>'required|string',
      'customer_name' => 'required|string',
      'side_note' => 'nullable|string|max:255',
    ]);

   
    if($this->cartItems->count() === 0){
      return $this->addError('message', 'Your Invoice List is Empty');
    }

    $this->dispatchBrowserEvent('submit-invoice-request');    
 
  }


  public function render()
  { 
    $this->cartItems = Cart::where('user_id', Auth::id())->get();
    $cartItems = $this->cartItems;
    $data = $this->computeTotalPrice();

    

    return view('livewire.staff.view-generated-invoice', [
      'data' => $data,
      'cartItems' => $cartItems,
    ]);
  }
}