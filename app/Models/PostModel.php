<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'slug',
        'user_id',
        'category_id',
        'meta_description',
        'meta_keywords',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }


    public function tags()
    {
        return $this->belongsToMany(TagModel::class, 'post_tags', 'post_id', 'tag_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }
}
