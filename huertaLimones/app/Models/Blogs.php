<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable=[
        'BLOG_SLUG', 'BLOG_TITLE', 'BLOG_DESC', 'BLOG_TEXT', 'BLOG_IMG', 'USER_ID'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
