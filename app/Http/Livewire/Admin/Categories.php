<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class Categories extends Component
{

  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  public $per_page = 50;
  
  public $showModal = false;
  public $category_name; //category name;
  public $category_id;
  protected $listeners = ['deleteItemData' => 'deleteItemDataFile'];


  public function addNewCategory()
  {

    // Add new category validation
    $this->validate([
      'category_name'=>'required|regex:/^[a-zA-Z0-9_]+$/',
    ]);

    
    $categoryExists = DB::table('categories')
    ->whereRaw('LOWER(name) = ?', [strtolower($this->category_name)])
    ->exists();

    if ($categoryExists) {
      // dd('reach');
      $this->addError('category_name', 'This category name is already taken.');
    }else{
      // dd('add database');
      $category = new Category();
      $category->name = $this->category_name;
      $category->created_at = now();
      $category->updated_at = now();
  
      $category->save();
  
      session()->flash('message','New Category added successfully');
  
      $this->category_name = '';
  
      //For hide modal after add student success
      $this->dispatchBrowserEvent('close-modal');
    
    }

  }

  public function editCategory($id)
  {
    $category = Category::where('id', $id)->first();
    $this->category_id = $category->id;
    $this->category_name = $category->name;

    $this->dispatchBrowserEvent('show-edit-category-modal');
  }

  public function editCategoryData()
  {
    // Add new category validation
    $this->validate([
      'category_name'=>'required|regex:/^[a-zA-Z0-9_]+$/',
    ]);

    $categoryExists = DB::table('categories')
    ->whereRaw('LOWER(name) = ?', [strtolower($this->category_name)])
    ->exists();
    
    if ($categoryExists) {
      // dd('reach');
      $this->addError('category_name', 'This category name is already exists.');
    }else{

      $category = Category::where('id', $this->category_id)->first();

      $category->id = $this->category_id;
      $category->name = $this->category_name;
      $category->updated_at = now();
  
      $category->save();

      $this->resetInputs();

      session()->flash('message','Laundry Category has been updated successfully!');

      //hide modal
      $this->dispatchBrowserEvent('close-modal');
    
    }

  }

  
  public function resetInputs()
  {
    $this->category_name = '';
    $this->category_id = '';
  }


  public function deleteConfirm($id)
  {
    $this->category_id = $id;
    $this->dispatchBrowserEvent('show-delete-alert');
  }

  public function deleteItemDataFile()
  {
    $category = Category::where('id', $this->category_id)->first();
    $category->delete();

    $this->dispatchBrowserEvent('itemDeleted');
  }

  public function render()
  {
    $categories = Category::orderBy('name','asc')->paginate($this->per_page);
    return view('livewire.admin.categories',[
      'categories' => $categories,
    ]);
  }
 
}
