<?php

namespace App\Http\Livewire\Staff;

use App\Models\LaundryItem;
use Livewire\Component;
use Livewire\WithPagination;

class Items extends Component
{
  use WithPagination;
    public function render()
    {   
        $items = LaundryItem::paginate(25);
        return view('livewire.staff.all-items',[
          'items' => $items
        ]);
    }
}
