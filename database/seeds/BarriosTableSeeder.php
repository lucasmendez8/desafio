<?php

use Illuminate\Database\Seeder;

class BarriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barrios')->insert([
            'ciudad_id' => 1,
            'nombre' => 'Centro',
            'created_at' => new DateTime("now"),
            'updated_at' => new DateTime("now")
        ]);
    }
}
