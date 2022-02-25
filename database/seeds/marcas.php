<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class marcas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert(array(
            0 => array(
                'id_marca' => '1',
                'marca'    => 'Volkswagen'
            ),
            1 => array(
                'id_marca' => '2',
                'marca'    => 'renault'
            ),
            2 => array(
                'id_marca' => '3',
                'marca'    => 'ford'
            ),
        ));
    }
}
