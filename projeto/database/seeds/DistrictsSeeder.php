<?php

use Illuminate\Database\Seeder;
use App\District;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $district = new District;
        $district->name = "Aveiro";
        $district->save();

        $district = new District;
        $district->name = "Beja";
        $district->save();

        $district = new District;
        $district->name = "Braga";
        $district->save();

        $district = new District;
        $district->name = "Bragança";
        $district->save();

        $district = new District;
        $district->name = "Castelo Branco";
        $district->save();

        $district = new District;
        $district->name = "Coimbra";
        $district->save();

        $district = new District;
        $district->name = "Évora";
        $district->save();

        $district = new District;
        $district->name = "Faro";
        $district->save();

        $district = new District;
        $district->name = "Guarda";
        $district->save();

        $district = new District;
        $district->name = "Leiria";
        $district->save();

        $district = new District;
        $district->name = "Lisboa";
        $district->save();

        $district = new District;
        $district->name = "Portalegre";
        $district->save();

        $district = new District;
        $district->name = "Porto";
        $district->save();

        $district = new District;
        $district->name = "Santarém";
        $district->save();

        $district = new District;
        $district->name = "Setúbal";
        $district->save();

        $district = new District;
        $district->name = "Viana do Castelo";
        $district->save();

        $district = new District;
        $district->name = "Vila Real";
        $district->save();

        $district = new District;
        $district->name = "Viseu";
        $district->save();

        $district = new District;
        $district->name = "Ilha da Madeira";
        $district->save();

        $district = new District;
        $district->name = "Ilha de Porto Santo";
        $district->save();

        $district = new District;
        $district->name = "Ilha de Santa Maria";
        $district->save();

        $district = new District;
        $district->name = "Ilha de São Miguel";
        $district->save();

        $district = new District;
        $district->name = "Ilha Terceira";
        $district->save();

        $district = new District;
        $district->name = "Ilha da Graciosa";
        $district->save();

        $district = new District;
        $district->name = "Ilha de São Jorge";
        $district->save();

        $district = new District;
        $district->name = "Ilha do Pico";
        $district->save();

        $district = new District;
        $district->name = "Ilha do Faial";
        $district->save();

        $district = new District;
        $district->name = "Ilha das Flores";
        $district->save();

        $district = new District;
        $district->name = "Ilha do Corvo";
        $district->save();

    }
}
