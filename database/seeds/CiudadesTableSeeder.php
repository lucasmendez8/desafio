<?php

use Illuminate\Database\Seeder;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('ciudades')->insert([
            'nombre' => 'Posadas',
            'created_at' => new DateTime("now"),
            'updated_at' => new DateTime("now")
        ]);
    }
}
