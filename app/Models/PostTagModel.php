<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTagModel extends Model
{
    protected $table = 'post_tags';

    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public $timestamps = false;


    public function tag()
    {
        return $this->belongsTo(TagModel::class, 'tag_id');
    }

    public function post()
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }
}
