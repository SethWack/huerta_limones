<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'PROD_PRICE',
        'TIPO_ID'
    ];

    public function prod_tipo(){
        return $this->belongsTo(Prod_tipos::class);
    }
}
