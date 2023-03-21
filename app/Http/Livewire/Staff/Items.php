<?php

namespace App\Http\Livewire\Staff;

use App\Models\LaundryItem;
use Livewire\Component;
use Livewire\WithPagination;

class Items extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';

  public $per_page = 10;
  
  public $showModal = false;
  public $item_id;
  
  protected $listeners = ['deleteItemData' => 'deleteItemDataFile'];

  public $item_name, $item_category, $item_price, $package_unit;

  public function updated($fields)
  {
    $this->validateOnly($fields,[
      'item_name' => 'required|string|max:255',
      'item_category' => 'required|string|max:255',
      'item_price' => 'required|numeric',
      'package_unit' => 'required|numeric',
      
    ]);
  
  }
   

  function addNewItem()
  {
    $this->validate([
      'item_name' => 'required|string|max:255',
      'item_category' => 'required|string|max:255',
      'item_price' => 'required|numeric',
      'package_unit' => 'required|numeric',
      
    ]);

    // Add New Item
    $item = new LaundryItem ();
    $item->item_name = $this->item_name; 
    $item->item_category = $this->item_category; 
    $item->item_price = $this->item_price; 
    $item->package_unit = $this->package_unit; 
    $item->created_at = now();
    $item->updated_at = now();


    $item->save();

    session()->flash('message','New item added successfully');
    
    $this->item_name = '';
    $this->item_category = '';
    $this->package_unit = '';
    $this->item_price = '';

   //For hide modal after add student success
   $this->dispatchBrowserEvent('close-modal');

  }

  public function resetInputs()
  {
    $this->item_name = '';
    $this->item_category = '';
    $this->item_price = '';
    $this->package_unit = '';
    
  }

  public function editItem($id)
  {
    $item = LaundryItem::where('id', $id)->first();

    $this->item_id = $item->id;
    $this->item_name = $item->item_name;
    $this->item_category = $item->item_category;
    $this->item_price = $item->item_price;
    $this->package_unit = $item->package_unit;

    $this->dispatchBrowserEvent('show-edit-item-modal');
  }

  public function editItemData()
  {
    //on form submit validation
    $this->validate([
      'item_name' => 'required|string|max:255',
      'item_category' => 'required|string|max:255',
      'item_price' => 'required|numeric',
      'package_unit' => 'required|numeric',
    ]);

    $item = LaundryItem::where('id', $this->item_id)->first();

    $item->id = $this->item_id;
    $item->item_name = $this->item_name;
    $item->item_category = $this->item_category ;
    $item->item_price = $this->item_price;
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
    $item = LaundryItem::where('id',$this->item_id)->first();
    $item->delete();

    $this->dispatchBrowserEvent('itemDeleted');
  }


  
  public function render()
  {   
    return view('livewire.staff.items',[
      'items' => LaundryItem::paginate($this->per_page),
    ]);
  }

}
