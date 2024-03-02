<?php

namespace App\Http\Controllers;

use App\Models\Report;
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

    public function report(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'comment' => 'required|string|max:1000',
        'phone' => 'required|string',
        'subject' => 'nullable|string',
      ]);

      $report = new Report();
      $report->name = $request->name;
      $report->email = $request->email;
      $report->phone = $request->phone;
      $report->subject = $request->subject;
      $report->comment = $request->comment;
      $report->created_at = now();
      $report->updated_at = now();

      $report->save();

      return redirect()->back()->with('success', 'Your comment has been submitted successfully! Your feedback help us serve you better.');

    }

}
