<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];


    public function posts()
    {
        return $this->hasMany(PostModel::class, 'category_id');
    }


}
