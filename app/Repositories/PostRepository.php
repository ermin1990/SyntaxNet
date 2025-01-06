<?php

namespace App\Repositories;

use App\Models\PostModel;
use Illuminate\Support\Str;

class PostRepository
{


    public static function generateUniqueSlug($title)
    {

        $slug = Str::slug($title);
        $count = PostModel::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }



}
