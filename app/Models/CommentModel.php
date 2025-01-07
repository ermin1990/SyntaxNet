<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'post_id',
        'textcomment'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
