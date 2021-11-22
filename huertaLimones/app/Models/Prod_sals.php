<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prod_sals extends Model
{
    use HasFactory;

    protected $fillable=[
        'PROD_ID', 'SAL_ID'
    ];
}
