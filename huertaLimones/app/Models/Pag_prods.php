<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pag_prods extends Model
{
    use HasFactory;

    protected $fillable = ['PAG_ID', 'PROD_ID'];
}
