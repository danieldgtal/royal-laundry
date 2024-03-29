<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
  {    
    public function __construct()
    {
      $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.home');
    }

    public function categoriesList()
    {
      return view('admin.categories');
    }

    public function itemsList()
    {
      return view('admin.items');
    }

    public function staffs()
    {
      return view('admin.staffs');
    }


    public function orders()
    {
      return view('admin.orders');
    }
     
    public function invoices()
    {
      return view('admin.invoices');
    }
    
    public function feedbacks()
    {
      return view('admin.feedbacks');
    }
    
    public function profile()
    {
      return view('admin.profile');
    }



   
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
