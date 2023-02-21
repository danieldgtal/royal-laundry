<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
      return view("home.index");
    }

    public function contact()
    {
      return view("home.contact");
    }

    public function about()
    {
      return view("home.about");
    }

    public function services()
    {
      return view('home.services');
    }
}
