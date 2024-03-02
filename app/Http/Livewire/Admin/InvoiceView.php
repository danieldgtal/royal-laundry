<?php

namespace App\Http\Livewire\Admin;

use App\Models\Branch;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class InvoiceView extends Component
{

  public $invoice;
  
  public function invoiceView()
  {
    
    $invoice_info = Session::get('invoice_id');
    $this->invoice = $invoice_info;
    $branch = Branch::where('id', $invoice_info->branch_id)->first();
    
    return view('livewire.staff.invoice-view', [
      'invoice' => $this->invoice,
      'branch' => $branch,
    ]);
  }
  public function render()
  {
      return view('livewire.admin.invoice-view');
  }
}
