<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class Orders extends Component
{
  use WithPagination;
  public $search ='';
  public $selectedBranch = 'all';
  protected $queryString = ['search','selectedBranch'];
  public $per_page = 25;
  public $orderId;
  protected $listeners = ['deleteItemData' => 'deleteOrderData'];

  public function orderView($orderId)
  {

    $order = Order::where('order_id', $orderId)->first();
    $this->orderId = $order;
    
    if(!$this->orderId){
      abort(404);
    }

    session(['order_id' => $orderId]);
    redirect()->route('admin.view-order');
    
  }

  public function orderDelete($orderId)
  {
    $this->orderId = $orderId;
    $this->dispatchBrowserEvent('show-delete-alert');
  }

  public function deleteOrderData()
  {
    $order = Order::where('order_id', $this->orderId)->first();
    $order->delete();

    $this->dispatchBrowserEvent('itemDeleted');
  }

  public function exportOrderPDF()
  {
    $data = session('ordersData');
    //pass the data to the pdf view
    $view = view('pdf.orders', [
      'data' => $data,
    ])->render();

    $pdf = PDF::loadHTML($view)->output();
    return response($pdf,200)->header('Content-Type','application/pdf');
    
  }

  public function render()
  {
    $orders = Order::query()
    ->when($this->selectedBranch != 'all', function ($query) {
        $query->where('branch_id', $this->selectedBranch);
    })
    ->when($this->search, function ($query) {
        $query->where(function ($query) {
            $query->where('order_id', 'LIKE', '%' . $this->search . '%')
                ->orWhere('customer_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('payment_status', 'LIKE', '%' . $this->search . '%')
                ->orWhere('order_status', 'LIKE', '%' . $this->search . '%');
        });
    })
    ->paginate($this->per_page);

    $ordersData = [];
    foreach($orders as $order){
      $ordersData[] = [
        'order_id' => $order->order_id,
        'user_id' => $order->user_id,
        'branch_id' => $order->branch_id,
        'customer_name' => $order->customer_name,
        'order_date' => $order->order_date,
        'pickup_date' => $order->pickup_date,
        'delivery_date' => $order->delivery_date,
        'payment_status' => $order->payment_status,
        'order_status' => $order->order_status,
        'total_cost' => $order->total_cost,
        'order_note' => $order->order_note,
        'items' => $order->items,
      ];
    }

    $branches = Branch::all();
    return view('livewire.admin.orders', [
      'branches' => $branches,
      'orders' => $orders,
      'ordersData' => $ordersData,
    ]);
  }
}
