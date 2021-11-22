<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable=[
        'BLOG_SLUG', 'BLOG_TITLE', 'BLOG_DESC', 'BLOG_TEXT', 'BLOG_IMG', 'USER_ID'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array{
        return [
            'BLOG_SLUG' =>[
                'source' => 'title'
            ]
        ];
    }
}
