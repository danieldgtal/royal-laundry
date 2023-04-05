<?php

namespace App\Http\Livewire\Staff;

use App\Models\Staff;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{ 
  public function render()
  {
    $staff_id = Auth::id();
    $staff = Staff::where('staff_id', $staff_id)->first();

    return view('livewire.staff.profile',[
      'staff' => $staff
    ]);
  }
}
