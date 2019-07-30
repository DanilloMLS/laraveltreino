<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedors')->insert(['nome'=>'Bernardo Silva', 'cargo'=>'Analista Pleno']);
        DB::table('desenvolvedors')->insert(['nome'=>'Carlos Arnaldo', 'cargo'=>'Analista Senhor']);
        DB::table('desenvolvedors')->insert(['nome'=>'Paulo Simas', 'cargo'=>'Programador Jr']);
    }
}
