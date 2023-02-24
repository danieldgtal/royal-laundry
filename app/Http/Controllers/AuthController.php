<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
        if($userType === '3'){
          return redirect()->intended('/owner/dashboard');
        }elseif($userType === '2'){
          return redirect()->intended('/staff/dashboard');
        }else {
          return redirect()->intended('/user/dashboard');
        }
      }
      return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function logout(Request $request)
  {
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/login');
  }
}
