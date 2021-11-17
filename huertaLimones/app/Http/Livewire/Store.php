<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Controllers\Stores;
use App\Models\Producto;

class store extends Component
{
    use WithPagination;
    public $products;
    public function render()
    {
        $productos = Stores::getProduct();
        $types = Stores::getTypes();
        $row_count = 0;
        return view('livewire.store')
            ->with('productos', $productos)
            ->with('types' , $types)
            ->with('row_count', $row_count);
    }
}
