<?php

use Illuminate\Database\Seeder;

class modelos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modelos')->insert(array(
            0 => array(
                'id_modelo'   => '1',
                'id_fk_marca' => '1',
                'modelo'      => 'gol',
                'tipo'        => 'carro'
            ),
            1 => array(
                'id_modelo'   => '2',
                'id_fk_marca' => '1',
                'modelo'      => 'fox',
                'tipo'        => 'carro'
            ),
            2 => array(
                'id_modelo'   => '3',
                'id_fk_marca' => '2',
                'modelo'      => 'Duster',
                'tipo'        => 'carro'
            ),
            3 => array(
                'id_modelo'   => '4',
                'id_fk_marca' => '2',
                'modelo'      => 'captur',
                'tipo'        => 'carro'
            ),
            4 => array(
                'id_modelo'   => '5',
                'id_fk_marca' => '3',
                'modelo'      => 'ranger',
                'tipo'        => 'carro'
            ),
            5 => array(
                'id_modelo'   => '7',
                'id_fk_marca' => '3',
                'modelo'      => 'f-350',
                'tipo'        => 'caminhão'
            ),
        ));
    }
}
