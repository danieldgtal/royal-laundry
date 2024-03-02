<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesData implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
      $data = session('invoicesData');
      return view('pdf.invoices-xl', [
          'data' => $data
      ]);
    }
}
