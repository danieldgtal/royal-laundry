<?php

namespace App\Http\Livewire;

use App\Models\PickUp;
use DateTime;
use Livewire\Component;
use Livewire\WithPagination;

class UserPickup extends Component
{ 
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public $per_page = 10;
  public $pickup_date, $pickup_time,$pickup_items, $pickup_note;

  public function addUserPickUp()
  {
    $validatedData = $this->validate([
      'pickup_date' => 'required|date_format:m/d/Y',
      'pickup_time' => 'required|date_format:H:i',
      'pickup_items' => 'required|string|max:200',
      'pickup_note' => 'required|string|max:150',
    ]);
  
    // Convert the validated date to MySQL date format
    $date_str = $validatedData['pickup_date'];
    $time_str = $validatedData['pickup_time'];
    
    
    // create a DateTime object from the date and time string
    $date = DateTime::createFromFormat('m/d/Y', $date_str);
    
    $datetime_str = $date->format('Y-m-d') . ' ' . $time_str;
    
    $datetime = DateTime::createFromFormat('Y-m-d H:i', $datetime_str);
    
    $mysql_datetime = $datetime->format('Y-m-d H:i:s');

    // Add New Pickup
    $pickup = new PickUp();
    $pickup->user_id = auth()->user()->id;
    $pickup->pickup_id = $this->generatePickUpId($pickup->user_id);
    $pickup->pickup_date = $mysql_datetime;
    $pickup->pickup_status = 0;
    $pickup->pickup_note = $this->pickup_note;
    $pickup->pickup_items = $this->pickup_items;

    $pickup->save();

    session()->flash('message', 'Order submitted successfully');

    $this->pickup_date = '';
    $this->pickup_note = '';
    $this->pickup_items = '';
    $this->pickup_time = '';

    //Hide modal after pickup submission
    $this->dispatchBrowserEvent('close-modal');

  }

  public static function generatePickUpId($userId)
  {
    // Get the current date and time
    $dateTime = date('Ymd');

    $randomNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

    $pickupId = $dateTime. $randomNumber . $userId;

    return $pickupId;
  }


  public function render()
  { 
    $authUser = auth()->user();

    $items = PickUp::where('user_id', $authUser->id)
    ->latest()
    ->paginate($this->per_page);

    return view('livewire.user-pickup',[
      'items' => $items
    ]);
  }
}
