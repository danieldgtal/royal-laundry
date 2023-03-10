<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{   
     
    public function __construct()
    {
      $this->middleware('user')->only(['create','edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       
        return view('user.dashboard');
    }

    public function notification()
    {
      return view ('user.notification');
    }

    public function schedule()
    {
      return view('user.schedule');
    }

    public function orders()
    {
      return view('user.orders');
    }

    public function invoice()
    {
      return view('user.invoice');
    }
    
    public function transactions()
    {
      return view('user.transactions');
    }
    public function checkout()
    {
      return view('user.checkout');
    }
    public function feedback()
    {
      return view('user.feedback');
    }

    public function profile()
    {   
      $userObject = Customer::find(auth()->user()->id);

      return view('user.profile', [
        'user' => $userObject,
      ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
