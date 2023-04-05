<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;



class Transactions extends Component
{ 
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';

  public $per_page = 10;
  public $invoiceId;
 

  public function invoicePreview($invoiceId)
  {
    
    $invoice = Invoice::where('invoice_id', $invoiceId)->first();
    $this->invoiceId = $invoice;

    if(!$this->invoiceId){
      abort(404);
    }

    session(['invoice_id' => $invoiceId]);
    redirect()->route('user.order-invoice', );
    

  }


  
  public function render()
  {
    
    $user_id = Auth::user()->id;

    $invoices = Invoice::where('user_id', $user_id)->paginate($this->per_page);    

    return view('livewire.transactions', [
      'invoices' => $invoices,
     
    ]);
  }
}
