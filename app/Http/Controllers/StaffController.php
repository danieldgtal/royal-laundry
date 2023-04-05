<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{ 
    public function __construct()
    {
      $this->middleware(['staff']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      return view('staff.home');
    }
    public function customers()
    {
      return view('staff.customers');
    }
    
    public function cart()
    {
      return view('staff.view-cart');
    }
    
    public function itemsList()
    {
      return view('staff.items');
    }
    public function profile()
    {
      return view('staff.profile');
    }
    public function pickups()
    { 
      return view('staff.pickups');
    }

    public function previewInvoice()
    {
      return view('livewire.staff.preview-invoice');
    }

    public function orders()
    {
      return view('staff.orders');
    }

    public function categoriesList(){

      return view('staff.categories');
  
    }

    public function itemsView()
    {
      return view('staff.items');
    }
    
    public function invoices()
    {
      return view('staff.invoices');
    }
    
    public function searchInvoice()
    {
      return view('staff.invoice-search');
    }

    public function generateInvoice()
    {
      return view('staff.invoice-gen');
    }

    public function inventories()
    {
      return view('staff.inventories');
    }

    public function reports()
    {
      return view('staff.reports');
    }

    public function weighbill()
    {
      return view('staff.weighbill');
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
