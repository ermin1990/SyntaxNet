<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    protected $table = 'pages';
    protected $fillable = ['title', 'textcontent', 'slug', 'status', 'user_id'];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

