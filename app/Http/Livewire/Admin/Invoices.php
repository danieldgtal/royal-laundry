<?php

namespace App\Http\Livewire\Admin;

use App\Exports\InvoicesData;
use App\Models\Branch;
use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class Invoices extends Component
{ 
  use WithPagination;
  public $search ='';
  public $selectedBranch = 'all';
  protected $queryString = ['search','selectedBranch'];
  public $per_page = 25;
  public $invoiceId;
  protected $listeners = ['deleteItemData' => 'deleteInvoiceData'];
  public $fromDate, $toDate;

  public function invoiceView($invoiceId)
  {
    
    $invoice = Invoice::where('invoice_id', $invoiceId)->first();
    $this->invoiceId = $invoice;

    if(!$this->invoiceId){
      abort(404);
    }

    session(['invoice_id' => $invoice]);

    redirect()->route('admin.view-invoice');
    
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

  public function exportInvoiceEXCEL()
  {
    return Excel::download(new InvoicesData, 'invoices.xlsx'); 
  }

  public function invoiceDelete($invoiceId)
  {
    $this->invoiceId = $invoiceId;
    $this->dispatchBrowserEvent('show-delete-alert');
  }

  public function deleteInvoiceData()
  {
    $invoice = Invoice::where('invoice_id', $this->invoiceId)->first();
    $invoice->delete();

    $this->dispatchBrowserEvent('itemDeleted');
  }


  public function render()
  {
    $invoiceQuery = Invoice::query();
    $invoiceQuery->when($this->selectedBranch != 'all', function ($query) {
        $query->where('branch_id', $this->selectedBranch);
    })
    ->when($this->search, function ($query) {
        $query->where(function ($query) {
            $query->where('invoice_id', 'LIKE', '%' . $this->search . '%')
                ->orWhere('customer_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('invoice_type', 'LIKE', '%' . $this->search . '%')
                ->orWhere('payment_method', 'LIKE', '%' . $this->search . '%');
        });
    });
    
    if ($this->fromDate && $this->toDate) {
        $invoices = $invoiceQuery->whereBetween('created_at', [$this->fromDate, $this->toDate])->paginate($this->per_page);
    } else {
        $invoices = $invoiceQuery->orderBy('created_at', 'desc')->paginate($this->per_page);
    }
    

    $invoicesData = [];
    foreach($invoices as $invoice){
      $invoicesData[] = [
        'invoice_id' => $invoice->invoice_id,
        'user_id' => $invoice->user_id,
        'branch_id' => $invoice->branch_id,
        'invoice_type' => $invoice->invoice_type,
        'customer_name' => $invoice->customer_name,
        'invoice_date' => $invoice->invoice_date,
        'total_cost' => $invoice->total_cost,
        'payment_method' => $invoice->payment_method,
        'date_issued' => $invoice->date_issued,
      ];
    }
    
    $branches = Branch::all();
   
    return view('livewire.admin.invoices',[
      'branches' => $branches,
      'invoices' => $invoices,
      'invoicesData' =>$invoicesData,

    ]);
  }
}
