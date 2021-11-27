<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pag_ents extends Model
{
    use HasFactory;
    protected $fillable = ['PAG_ID', 'ENTG_ID'];
}
