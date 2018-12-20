<?php

use Illuminate\Database\Seeder;
use App\Candidato;

class CandidatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidatos')->truncate();

        Candidato::create(
        [
            "nome"                  => "Bolsonaro",
            "numero"                => 17,
            "partido"               => "PSL",
            "categoria"             => "Presidente",
            "img"                   => "bolsonaro.png",
            "votos"                 => 0,
        ],
        [
            "nome"                  => "Ciro",
            "numero"                => 12,
            "partido"               => "DEM",
            "categoria"             => "Presidente",
            "img"                   => "ciro.png",
            "votos"                 => 0,
        ],
        [
            "nome"                  => "Marina",
            "numero"                => 25,
            "partido"               => "PSOL",
            "categoria"             => "Presidente",
            "img"                   => "marina.png",
            "votos"                 => 0,
        ]
        );
    }
}
