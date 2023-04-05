<?php

namespace App\Http\Livewire\Staff;

use App\Models\Order;
use App\Models\Branch;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Validation\Rule;

class InvoiceSearch extends Component
{
  public $invoice;
  public $invoiceAvailable = false;
  public $searchPerformed = false;
  public $invoiceNumber;
  public $customer;
  public $branch;
  public $order;

  public function searchInvoice()
  { 
    $validatedData = $this->validate([
      'invoiceNumber' => ['required', 'numeric', 'digits_between:5,8', Rule::in([$this->invoiceNumber])]
    ]);

    $invoice = Invoice::where('invoice_id', $validatedData['invoiceNumber'])->first();

    if($invoice){
      $this->invoice = $invoice;
      $this->invoiceAvailable = true;
      $this->searchPerformed= true;
      $this->customer = Customer::where('customer_id', $invoice->user_id)->first();
      $this->branch = Branch::where('id', $invoice->branch_id)->first();
      $this->order = Order::where('order_id', $invoice->invoice_id)->first();

    }else{
      $this->searchPerformed = true;
      $this->invoiceAvailable = false;
    }
  }

  public function render()
  {
    return view('livewire.staff.invoice-search');
  }
}
