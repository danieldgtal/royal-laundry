<?php

namespace App\Http\Livewire\Staff;

use App\Models\Cart;
use App\Models\Item;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GenerateInvoice extends Component
{

  use WithPagination;
  
  public $selected_category = null;
  public $list_items = null;
  public $selected_item = null;
  public $selected_item_price = null;
  public $selected_item_package_unit = null;
  public $quantity, $cart;
  public $customer_name, $customer_email,$invoice_type;


  protected $listeners = ['cartUpdated'];

  public function cartUpdated(){
    
    $this->cart = Cart::where('user_id', auth()->id())->get()->count();

  }

  public function getItemPrice()
  {
    if (!is_null($this->selected_item)) {
        $item = DB::table('items')->where('id', $this->selected_item)->first();
        if (!is_null($item)) {
            $this->selected_item_price = $item->price;
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

    // Emit an event to trigger a re-render of the cart component

    $this->reset();
  }

  public function submitOrder()
  {
  
    $validatedData = $this->validate([
      'customer_name' => 'required|string',
      'invoice_type' => 'required|integer|max:1',
    ]);
        
    session()->put('invoice_data',[$this->all(), $validatedData]);
    return redirect()->route('staff.view_generated_invoice');
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
    

    return view('livewire.staff.generate-invoice',[
      'categories' => $categories,
      'items' => $items,
      'cartNumber' => $cartNumber,
    ]);
  }
}