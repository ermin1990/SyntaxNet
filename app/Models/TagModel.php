<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        return $this->belongsToMany(PostModel::class, 'post_tags', 'tag_id', 'post_id');
    }


}
