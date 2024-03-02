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

    if($invoice_info){
      $this->invoice = $invoice_info;
      $branch = Branch::where('id', $invoice_info->branch_id)->first();

      return view('livewire.staff.invoice-view', [
        'invoice' => $this->invoice,
        'branch' => $branch,
      ]);
    }else{
      $user = auth()->user();
      if($user->user_type == '1'){
        return redirect('/staff');
      }if($user->user_type == '2'){
        return redirect('/admin');
      }
    } 
  }

  public function render()
  {
      return view('livewire.admin.invoice-view');
  }
}
