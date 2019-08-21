<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function store(Request $request)
    {
        $postData = $this->validate($request, [
           'restoId' => 'required',
            'price' => 'required',
            'item' => 'required',
            'category' => 'required',
        ]);

        $category = Category::whereRestoId($postData['restoId'])->where('name', $postData['category'])->first();

        $menu = Menu::create([
            'name' => $postData['item'],
            'price' => $postData['price'],
            'resto_id' => $postData['resto_id'],
            'category_id' => $category->id,
            'description' => 'abc'
        ]);

        return response()->json($menu, 201);
    }
}
