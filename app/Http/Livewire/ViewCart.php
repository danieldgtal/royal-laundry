<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as Session;
use Illuminate\Validation\ValidationException;

class ViewCart extends Component
{

  public $cartItems;
  public $branch;
  public $order_note;
  public $orderId;


  public function mount()
  { 
    $this->cartItems = Cart::where('user_id', Auth::id())->get();
  }

  private function computeTotalPrice()
  {
    $total = 0;
    $items = [];

    foreach($this->cartItems as $cartItem){
      $product = Item::findorFail($cartItem->item_id);
      $quantity = $cartItem->quantity;
      $packageUnit = $cartItem->package_unit;
      $itemId = $cartItem->id;
      $category = Category::find( $product->category_id);
    
      $items[]= [
        'product' => $product,
        'item_id'=> $itemId,
        'quantity' =>$cartItem->quantity,
        'package_unit' => $cartItem->package_unit,
        'category' =>$product->category_id,
        'category_name' => $category->name,
        'price' => $product->price,
        'subtotal' =>$product->price * $cartItem->quantity,
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

    $orderID = $suffix; // Combine the prefix and suffix to create the order ID

    // Check if the order ID already exists in the database
    if (DB::table('orders')->where('order_id', $orderID)->exists()) {
        // If the order ID already exists, generate a new one recursively
        return $this->generateOrderID();
    }

    return $orderID;
  }


  public function submitOrder()
  {
    //get user id and carts with userid
    $userId = Auth::user()->id;
   
    if($this->cartItems->count() === 0){
      return $this->addError('message', 'Your Cart is Empty');
    }

    $validatedData = $this->validate([
      'branch' => 'required|numeric|exists:branches,id',
    ]);

    $userBranch = Branch::find($validatedData['branch']);
      
    $order = new Order;
    $order->order_id = $this->orderId = $userBranch->id. $this->generateOrderID();
    $order->user_id = $userId;
    $order->branch_id = $validatedData['branch'];
    $order->order_note = $this->order_note;

    $user = User::find($userId);
    $order->customer_name = $user->name;

    $order->order_date = now();
    $order->pickup_date = null;
    $order->delivery_date = null;
    $order->payment_status = 'unpaid';
    $order->order_status = 'pending';
    $order->created_at = now();
    $order->updated_at = now();

    // get total price
    $computeCart = $this->computeTotalPrice();
    $order->total_cost = $computeCart['total'];

  
    
    $order->items = json_encode($computeCart['items']);
    
    $order->payment_proof = null;

    Session::put('orderId', $order->order_id);

    $order->save();
  
    $this->dispatchBrowserEvent('submit-order-success');
    
    Cart::where('user_id', auth()->user()->id)->delete();

  }


  public function render()
  { 
  
    $cartItems = $this->cartItems;
    $data = $this->computeTotalPrice();
    $branches = Branch::all();

    return view('livewire.view-cart', [
      'data' => $data,
      'cartItems' => $cartItems,
      'branches' => $branches,
    ]);
  }
}
