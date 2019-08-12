<?php

namespace App\Services;

use App\Models\Menu;

class MenuServices
{
    public function getMenuWithCategory(array $restoId)
    {
        $categories = Menu::whereIn('resto_id', $restoId)->get()->groupBy('category.name');

        return $categories;
    }
}