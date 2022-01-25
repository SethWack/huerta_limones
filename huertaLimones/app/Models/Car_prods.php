<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_prods extends Model
{
    use HasFactory;

    protected $fillable = [
        'CAR_ID', 'PROD_ID', 'PROD_AMMOUNT'
    ];
}
