<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category;
        $category->name = "Para R&S";
        $category->save();

        $category = new Category;
        $category->name = "Em R&S";
        $category->save();

        $category = new Category;
        $category->name = "Falta R&S";
        $category->save();
        
    }
}
