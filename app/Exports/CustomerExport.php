<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //   return Customer::all();
    // }

    public function view(): View
    {
      $data = session('customersData');

      return view('pdf.customers-xl', [
          'data' => $data
      ]);
    }
}
