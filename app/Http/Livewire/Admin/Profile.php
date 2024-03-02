<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{

  public function render()
  {
    $admin_id = Auth::id();
    $user = User::where('id', $admin_id)->first();
    
    return view('livewire.admin.profile', [
      'user' => $user,
    ]);
  }
}
