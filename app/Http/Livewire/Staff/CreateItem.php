<?php

namespace App\Http\Livewire\Staff;

use App\Models\Item;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class CreateItem extends Component
{

  use WithPagination;
  
  public $per_page = 10;
  
  public $showModal = false;
  
  protected $paginationTheme = 'bootstrap';
  protected $listeners = ['deleteItemData' => 'deleteItemDataFile'];
  public $item_name,$category_id, $item_price,$item_discounted_price, $package_unit;//items
  public $item_id;

  public function updated($fields)
  {
    // Add Items validation
    $this->validateOnly($fields,[
      'item_name' => 'required|regex:/^[a-zA-Z0-9_-]+$/',      'category_id' => 'required|exists:categories,id',
      'item_price' => 'required|numeric|min:0',
      'item_discounted_price' => 'required|numeric|min:0',
      'package_unit' => 'required|numeric|min:1',
    ]);
  
  }

  public function addNewItem()
  {
    //form validatio rule
    $this->validate([
      'item_name'=>'required|regex:/^[a-zA-Z0-9_-]+$/',
      'item_price' => 'required|numeric|min:0',
      'item_discounted_price' => 'numeric|min:0',
      'package_unit' => 'required|numeric|min:1',
      'category_id' =>'required|numeric'
    ]);
    
    $itemExists = DB::table('items')
    ->whereRaw('LOWER(name) = ?', [strtolower($this->item_name)])
    ->exists();

    if ($itemExists) {
      $this->addError('item_name', 'This Item name is already taken.');
    }else{
      
      $item = new Item();
      $item->category_id = $this->category_id;
      $item->name = $this->item_name;
      $item->package_unit = $this->package_unit;
      $item->price = $this->item_price;
      $item->discounted_price = $this->item_discounted_price;
      $item->created_at = now();
      $item->updated_at = now();      
      
      $item->save();
  
      session()->flash('message','New item added successfully');
  
      $this->item_name = '';
      $this->category_id = '';
      $this->package_unit = '';
      $this->item_price = '';
      $this->item_discounted_price = '';
  
       //For hide modal after add student success
      $this->dispatchBrowserEvent('close-modal');
    }

  }
  

  public function resetInputs()
  {
    $this->item_name = '';
    $this->category_id = '';
    $this->item_price = '';
    $this->item_discounted_price = '';
    $this->package_unit = '';
    $this->item_id ='';
    
  }

  public function editItem($id)
  {
    $item = Item::where('id',$id)->first();
    
    $this->item_id = $item->id;
    $this->item_name = $item->name;
    $this->item_discounted_price = $item->discounted_price;
    $this->item_price = $item->price;
    $this->item_discounted_price = $item->discounted_price;
    $this->package_unit = $item->package_unit;
    $this->category_id = $item->category_id;

    $this->dispatchBrowserEvent('show-edit-item-modal');

  }

  public function editItemData()
  {
    //form validatio rule
    $this->validate([
      'item_name' => 'required|regex:/^[a-zA-Z0-9_-]+$/',
      'category_id' => 'required|exists:categories,id',
      'item_price' => 'required|numeric|min:0',
      'item_discounted_price' => 'numeric|min:0',
      'package_unit' => 'required|numeric|min:1',
      
    ]);

    $item = Item::where('id',$this->item_id)->first();

    $item->id = $this->item_id;
    $item->name = $this->item_name;
    $item->category_id = $this->category_id;
    $item->price = $this->item_price;
    $item->discounted_price = $this->item_discounted_price;
    $item->package_unit = $this->package_unit;
    $item->updated_at = now();

    $item->save();

    $this->resetInputs();

    session()->flash('message','Item has been updated successfully!');

    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');

  }

  public function deleteConfirm($id)
  {
    $this->item_id = $id;
    $this->dispatchBrowserEvent('show-delete-alert');
  }

  public function deleteItemDataFile()
  {
    $item = Item::where('id', $this->item_id)->first();
    $item->delete();

    $this->dispatchBrowserEvent('itemDeleted');
  }


    public function render()
    { 
      $items = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->select('items.*', 'categories.name as category_name')
            ->orderBy('created_at','asc')
            ->paginate($this->per_page);

      return view('livewire.staff.create-item', [
        'items' => $items,
        'categories' => Category::all(),
      ]);
    }
}
