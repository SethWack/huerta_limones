<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Controllers\stores;

class store extends Component
{
    use WithPagination;
    public $product;

    public function render()
    {
        $this->product = stores::getProduct();
        return view('livewire.store');
    }
}
