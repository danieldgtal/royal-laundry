<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;



class CustomAuthenticatedSessionController extends AuthenticatedSessionController
{
    public function login(Request $request)
    {
      

      $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
      ]);

      if(Auth::attempt($credentials)){
        $request->session()->regenerate();

        // Get the authenticated user 
        $user = Auth::user();

        // Fetch the userType from the database
        $userType = $user->user_type;

        // Redirect user to a particular route based on their type
        if($userType === '2'){
          return redirect()->intended('/admin/dashboard');
        }elseif($userType === '1'){
          return redirect()->intended('/staff/dashboard');
        }else {
          return redirect()->intended('/user/dashboard');
        }
      }
      return back()->withErrors([
        'email' => 'Provided credentials do not match our records!.',
    ]);
  }

  public function logout(Request $request)
  {
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      session()->flash('success', 'You have been logged out successfully.');

      return redirect('/login');
  }

  public function redirectTo()
  { 
      // Get the authenticated user 
      $user = Auth::user();

      // Fetch the userType from the database
      $userType = $user->user_type;

      // Redirect user to a particular route based on their type
      if($userType === '2'){
        return redirect()->intended('/owner/dashboard');
      }elseif($userType === '1'){
        return redirect()->intended('/staff/dashboard');
      }else {
        return redirect()->intended('/user/dashboard');
      }
  }
}
