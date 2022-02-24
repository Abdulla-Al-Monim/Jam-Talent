<?php

namespace App\Http\Livewire\Dashbor;

use Livewire\Component;

class DashbordComponent extends Component
{
    public function render()
    {
        return view('livewire.dashbor.dashbord-component')->('layouts.base');
    }
}
