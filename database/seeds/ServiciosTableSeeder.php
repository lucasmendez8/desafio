<?php

use Illuminate\Database\Seeder;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $servicios = [
            [
                'nombre' => 'Internet 10M',
                'created_at' => new DateTime("now"),
                'updated_at' => new DateTime("now")
            ],
            [
                'nombre' => 'Internet 20M',
                'created_at' => new DateTime("now"),
                'updated_at' => new DateTime("now")
            ]
        ];
        DB::table('servicios')->insert($servicios);
    }
}
