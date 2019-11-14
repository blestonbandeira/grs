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
        $category->name = "Candidatura Anulada";
        $category->save();

        $category = new Category;
        $category->name = "Candidatura Para R&S";
        $category->save();

        $category = new Category;
        $category->name = "Candidatura Em Processo R&S";
        $category->save();

        $category = new Category;
        $category->name = "R&S Completo";
        $category->save();

        $category = new Category;
        $category->name = "Candidato Integrou Turma";
        $category->save();

        $category = new Category;
        $category->name = "Candidato Suplente";
        $category->save();

        $category = new Category;
        $category->name = "Candidato Faltou R&S";
        $category->save();
        
    }
}
