<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prod_tipos extends Model
{
    use HasFactory;

    public function producto(){
        return $this->hasMany(Producto::class);
    }
}
