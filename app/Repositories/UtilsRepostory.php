<?php

namespace App\Repositories;

use App\Models\CategoryModel;
use App\Models\PageModel;
use App\Models\PostModel;
use App\Models\TagModel;
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

    public function generateTagUniqueSlug(mixed $name)
    {

        $slug = Str::slug($name);
        $count = TagModel::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function generateCategoryUniqueSlug(mixed $name)
    {

        $slug = Str::slug($name);
        $count = CategoryModel::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }


}
