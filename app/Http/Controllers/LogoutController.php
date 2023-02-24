<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke()
    {
      auth()->logout();

      // $request->session()->invalidate();

      // $request->session()->regenerateToken();

      session()->flash('logout-success', 'You have been logged out successfully.');

      return redirect()->route('login');
    }
}
