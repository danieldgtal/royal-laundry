<?php

namespace App\Exports;

use App\Models\PickUp;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PickupExport implements Fromview
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //   return Pickup::all();
    // }
    public function view(): View
    {
      $data = session('pickupData');

      return view('pdf.pickups-xl', [
          'data' => $data
      ]);
    }
}
