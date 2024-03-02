<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Item;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserCart extends Component
{ 
  use WithPagination;
  public $selected_category = null;
  public $list_items = null;
  public $selected_item = null;
  public $selected_item_price = null;
  public $selected_item_package_unit = null;
  
  public $quantity;

  public $cart;

  protected $listeners = ['cartUpdated' => 'cartUpdated'];

  public function cartUpdated(){
    
    $this->cart = Cart::where('user_id', auth()->id())->get()->count();

  }

  public function getItemPrice()
  {
    if (!is_null($this->selected_item)) {
        $item = DB::table('items')->where('id', $this->selected_item)->first();
        if (!is_null($item)) {
            $this->selected_item_price = $item->discounted_price != 0.00 ? $item->discounted_price: $item->price;
            $this->selected_item_package_unit = $item->package_unit;
        } else {
            $this->selected_item_price = null;
            $this->selected_item_package_unit = null;
        }
    } else {
        $this->selected_item_price = null;
        $this->selected_item_package_unit = null;
    }
  }


  public function updatedSelectedCategory()
  {
    $this->selected_item = null;
    $this->selected_item_price = null;
    $this->selected_item_package_unit = null;
  }

  public function update($fields)
  { 
    $this->validateOnly($fields,[
      'selected_item' => 'required|exists:items,id',
      'quantity' => 'required|numeric|min:1',
    ]);
  }

  public function addToCart(){

    
    // Perform validation on the quantity
    $validatedData = $this->validate([
      'selected_item' => 'required|exists:items,id',    
      'quantity' => 'required|integer|min:1',
      'selected_category'=>'required',
    ]);

    $product = Item::findOrFail($this->selected_item);
    $quantity = $this->quantity;

    //genereate session Id
    $session_id = Session::get('session_id');
    if(empty($session_id)){
      $session_id = Session::getId();
      Session::put('session_id',$session_id);
    }
    
    //save into cart table
    $cart = new Cart;
    $cart->user_id = Auth::id();
    $cart->session_id = $session_id;
    $cart->item_id = $validatedData['selected_item'];
    $cart->package_unit = $this->selected_item_package_unit;
    $cart->quantity = $validatedData['quantity'];
    $cart->created_at = now();
    $cart->updated_at = now();
    $cart->save();

    $this->cart = Cart::where('user_id', auth()->id())->get();

    session()->flash('message', 'item has been added to cart Successfully');

    $this->reset();

    // Emit an event to trigger a re-render of the cart component
    $this->emit(event: 'cartUpdated');

  }


  public function render()
  { 
    $cartNumber = $this->cart;
     
    $items = DB::table('items')
                ->select('items.*', 'categories.name as category_name')
                ->leftJoin('categories', 'categories.id', '=', 'items.category_id')
                ->orderBy('items.name')
                ->get();

    $categories = Category::all();

     // Filter the items to include only the selected category or all items
    if ($this->selected_category) {
        $items = $items->where('category_id', $this->selected_category);
    }
    
    return view('livewire.user-cart',[
      'categories' => $categories,
      'items' => $items,
      'cartNumber' => $cartNumber,
    ]);
   
  }
}
