<?php

namespace App\Http\Livewire\Staff;

use PDF;
use App\Models\Staff;
use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\InvoicesData;
use Maatwebsite\Excel\Facades\Excel;

class Invoices extends Component
{
  use WithPagination;

  public $per_page = 25;
  public $invoiceId;
  public $search;
  public $paid_amount, $balance_amount, $total_cost, $updated_amount, $invoice_type, $side_note;
  public $fromDate, $toDate;

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

  public function exportInvoicePDF()
  {
    $data = session('invoicesData');

    //pass the data to the pdf view
    $view = view('pdf.invoices', [
      'data' => $data,
    ])->render();

    $pdf = PDF::loadHTML($view)->output();
    return response($pdf,200)->header('Content-Type','application/pdf');
    
  }

  public function customerReceipt()
  {
    $invoice = session('sessionData');
    
    //pass the data to the pdf view
    $view = view('pdf.customer.receipt', [
      'invoice' => $invoice,
    ])->render();

    return $view;
    
  }

 

  public function editInvoice($id)
  {
    $invoice = Invoice::where('invoice_id', $id)->first();

    $this->invoiceId = $invoice->invoice_id;
    $this->paid_amount = $invoice->paid_amount;
    $this->balance_amount = $invoice->balance_amount;
    $this->total_cost = $invoice->total_cost;
    $this->side_note = $invoice->side_note;

    $this->dispatchBrowserEvent('show-edit-invoice-modal');
  }

  public function submitEditedInvoice()
  {
    $this->validate([
      'invoice_type' => 'sometimes|string|required',
      'updated_amount' => 'required|numeric',
      
    ]);

    if($this->updated_amount > $this->total_cost){
      $this->addError('updated_amount', 'Inputed Amount cannot be more than total cost');
    } else {
    
      $invoice = Invoice::where('invoice_id', $this->invoiceId)->first();
      
      $invoice->invoice_type = $this->invoice_type;
      $invoice->paid_amount = $this->updated_amount;
      $invoice->side_note = $this->side_note;
      
      $invoice->balance_amount = $invoice->total_cost- $this->updated_amount;
      $invoice->updated_at = now();
      $invoice->save();
      $this->reset();

      session()->flash('message','Invoice Has Been Updated Successfully');
      //hide modal

      $this->dispatchBrowserEvent('close-modal');
    }  

  }

  
  public function exportInvoiceEXCEL()
  {
    return Excel::download(new InvoicesData, 'invoices.xlsx'); 
  }

  public function dateSearch()
  {
    dd('here');
  }

  public function render()
  {
    $user_id = auth()->user()->id; // get auth user
    $staff = Staff::where('staff_id', $user_id)->first(); // get staff
    $branch_id = $staff->branch_id; //get branch

    // $invoices = Invoice::where('branch_id', $branch_id)->paginate($this->per_page);
    
    $invoices = $this->search
    ? Invoice::where(function($query) use ($staff) {
      $query->where('invoice_id', 'like', '%'.$this->search.'%')
            ->orWhere('invoice_type','like', '%'.$this->search.'%')
            ->orWhere('payment_method','like', '%'.$this->search.'%')
            ->where('customer_name', $staff->branch_id);
      })
      ->paginate($this->per_page)
      :Invoice::where('branch_id', $staff->branch_id)
        ->orderBy('created_at', 'desc')
        ->paginate($this->per_page);

    if($this->fromDate && $this->toDate){
      $invoiceQuery = Invoice::where('branch_id', $branch_id);
      $invoices = $invoiceQuery->whereBetween('created_at',[$this->fromDate, $this->toDate])->paginate($this->per_page);
    }
      
    $invoicesData = [];
    foreach($invoices as $invoice){
      $invoicesData[] = [
        'invoice_id' => $invoice->invoice_id,
        'user_id' => $invoice->user_id,
        'branch_id' => $branch_id,
        'invoice_type' => $invoice->invoice_type,
        'customer_name' => $invoice->customer_name,
        'invoice_date' => $invoice->invoice_date,
        'total_cost' => $invoice->total_cost,
        'payment_method' => $invoice->payment_method,
        'date_issued' => $invoice->date_issued,
      ];
    }
    
    return view('livewire.staff.invoices', [
      'invoices' => $invoices,
      'invoicesData' => $invoicesData,
    ]);
  }
}
