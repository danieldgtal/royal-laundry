<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;
use PDF;
use Livewire\WithPagination;

class Customers extends Component
{
  
  use WithPagination;
  public $per_page = 5;
  public $customer_id, $firstname, $lastname, $phone, $dob, $address, $gender,$email;
  public $search = '';

  public function updatingSearch(){
    $this->resetPage();
  }

  public function exportPDF()
  {
    $data = session('customersData');

    // pass the data to the PDF view
    $view =  view('pdf.customers', [
      'data' => $data,
    ])->render();

    $pdf = PDF::loadHTML($view)->output();
    return response($pdf,200)->header('Content-Type','application/pdf');
  }



  public function exportXLSX()
  {
   
    return Excel::download(new CustomerExport, 'customers.xlsx');
  }
 

  public function editCustomer($id)
  {
    
    $customer = Customer::where('customer_id', $id)->first();
    
    $this->customer_id = $customer->customer_id;
    $this->firstname = $customer->firstname;
    $this->lastname = $customer->lastname;
    $this->phone = $customer->phone;
    $this->dob = $customer->dob;
    $this->address = $customer->address;
    $this->gender = $customer->gender;
    $this->email = $customer->email;

    $this->dispatchBrowserEvent('show-edit-customer-modal');
  }

  public function updateCustomerData()
  {
    
    $this->validate([
      'firstname' => 'required|string',
      'lastname' => 'required|string',
      'phone' => 'string',
      'address' => 'nullable|string|max:35',
      'gender' => 'nullable|string',
      'email'=> 'nullable|string',
      'dob' => 'nullable|string',
    ]);

    $customer = Customer::where('customer_id', $this->customer_id)->first();
    
    $customer->firstname = $this->firstname;
    $customer->lastname = $this->lastname;
    $customer->phone = $this->phone;
    $customer->dob = $this->dob;
    $customer->address = $this->address;
    $customer->gender = $this->gender;  
    $customer->email = $customer->email;

    $customer->save();
    $this->reset();

    session()->flash('message', 'Customer Record Updated Successfully');
    $this->dispatchBrowserEvent('close-modal');
  }
  
  public function render()
  {
    $customers = $this->search
            ? Customer::where('firstname', 'like', '%'.$this->search.'%')
                      ->orWhere('lastname', 'like', '%'.$this->search.'%')
                      ->orWhere('email', 'like', '%'.$this->search.'%')
                      ->orderBy('firstname')
                      ->paginate($this->per_page)
            : Customer::orderBy('firstname')
                      ->paginate($this->per_page);

    $customerData = [];
    foreach($customers as $customer){
      $customerData[] = [
        'id' => $customer->customer_id,
        'firstname' => $customer->firstname,
        'lastname' => $customer->lastname,
        'phone' => $customer->phone,
        'dob' => $customer->dob,
        'address' => $customer->address,
        'gender' => $customer->gender,
        'email' => $customer->email,
      ];
    }

    return view('livewire.staff.customers',[
      'customers' => $customers,
      'customerData' => $customerData,
    ]);
  }
}
