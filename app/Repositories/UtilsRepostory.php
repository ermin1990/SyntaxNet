<?php

namespace App\Repositories;

use App\Models\PageModel;
use App\Models\PostModel;
use Illuminate\Support\Str;

class UtilsRepostory
{



    public static function generatePostUniqueSlug($title)
    {

        $slug = Str::slug($title);
        $count = PostModel::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public static function generatePageUniqueSlug($title){

        $slug = Str::slug($title);
        $count = PageModel::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }





}
