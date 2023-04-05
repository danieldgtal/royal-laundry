<?php

namespace App\Http\Livewire\Staff;

use App\Models\Staff;
use App\Models\Invoice;
use Livewire\Component;

class Invoices extends Component
{
  public $per_page;
  public $invoiceId;

  public function invoiceView($invoiceId)
  {

    $invoice = Invoice::where('invoice_id', $invoiceId)->first();
    $this->invoiceId = $invoice;

    if(!$this->invoiceId){
      abort(404);
    }

    session(['invoice_id' => $invoice]);

    redirect()->route('staff.view-invoice');
    
  }


  public function render()
  {
    
    $user_id = auth()->user()->id; // get auth user

    $staff = Staff::where('staff_id', $user_id)->first(); // get staff
    
    $branch_id = $staff->branch_id; //get branch

    $invoices = Invoice::where('branch_id', $branch_id)->paginate($this->per_page);
    
    return view('livewire.staff.invoices', [
      'invoices' => $invoices,
    ]);
  }
}
