<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class DashboardHeader extends Component
{
   
    public $url;
    public function __construct($url)
    {
      $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    { // $this->url = url()->current();
        return view('components.dashboard.dashboard-header');
    }
}
