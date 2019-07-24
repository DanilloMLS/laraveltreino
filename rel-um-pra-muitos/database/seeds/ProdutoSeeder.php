<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome'=>'Camiseta Polo',
            'preco'=>100,
            'estoque'=>4,
            'categoria_id'=>1
            ]);
        DB::table('produtos')->insert([
            'nome'=>'Calça Jeans',
            'preco'=>50,
            'estoque'=>6,
            'categoria_id'=>1
            ]);
        DB::table('produtos')->insert([
            'nome'=>'Computador',
            'preco'=>1500,
            'estoque'=>7,
            'categoria_id'=>3
            ]);
        DB::table('produtos')->insert([
            'nome'=>'Teclado',
            'preco'=>25,
            'estoque'=>8,
            'categoria_id'=>4
            ]);
        DB::table('produtos')->insert([
            'nome'=>'Calça Moleton',
            'preco'=>60.50,
            'estoque'=>4,
            'categoria_id'=>1
            ]);
    }
}
