<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use Livewire\WithFileUploads;


class Products extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $prodList;
    public $editList;
    public $IMG_PATH;
    protected $rules = [
        'prodList.PROD_AMMOUNT' => 'required',
        'prodList.PROD_PRICE' => 'required',
        'prodList.TIPO_ID' => 'required'
    ];
    public function render()
    {
        $products = DB::table('productos')->get();
        $types = DB::table('prod_tipos')->get();
        return view('livewire.products')
            ->with('productos', $products)
            ->with('tipos', $types);
    }
    public function getImage($img){
        $this->IMG_PATH = $img;
    }
    public function prodDelete($id){
        $prod = Producto::where('id', $id);
        $prod->delete();
    }
    public function prodAdd(){
        $this->validate();
        $this->prodList['IMG_PATH'] = $this->IMG_PATH->store('blogs');
        Producto::create($this->prodList);
        session()->flash('message', 'Producto Creado exitosamente!');
    }

}
