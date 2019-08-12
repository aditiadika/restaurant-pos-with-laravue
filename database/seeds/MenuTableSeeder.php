<?php

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class, 5)->create();
        $categories->each(function ($category){
            factory(Menu::class, 3)->create([
                'category_id' => $category->id
            ]);
        });
    }
}
