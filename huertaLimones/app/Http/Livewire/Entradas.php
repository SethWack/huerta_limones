<?php

namespace App\Http\Livewire;

use App\Models\Prod_ents;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class Entradas extends Component
{
    use WithPagination;

    public $entList;
    public $editList;
    public $ids;
    protected $rules = [
        'entList.ENT_DATE' => 'required'
    ];
    public function render()
    {
        $products = DB::table('productos')->get();
        $prod_ents = DB::table('prod_ents')->get();
        $entradas = DB::table('entradas')->get();
        return view('livewire.entradas')
            ->with('entradas', $entradas)
            ->with('productos', $products)
            ->with('prod_ents', $prod_ents);
    }
    public function entEdit($id){
        $this->entList = [];
        $this->entList = $this->editList;
        $this->validate();
        Prod_ents::where('id',$id)->update($this->entList);
    }
    public function entDelete($id){
        $ent = Entradas::where('id', $id);
        $prod = Prod_ents::where('ENT_ID', $id)->first();
        $ent->delete();
        $prod->delete();
    }
    public function entAdd(){
        $this->validate();
        Entradas::create($this->entList);
        session()->flash('message', 'Entrada Creado exitosamente!');
    }

}
