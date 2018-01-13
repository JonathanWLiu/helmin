<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'name' => 'Fox',
                'img' => 'img/types/img9.jpg'
            ],
            [
                'name' => 'Contin',
                'img' => 'img/types/img11.jpg'
            ],
            [
                'name' => 'Taichi',
                'img' => 'img/types/img21.jpg'
            ],
            [
                'name' => 'MDS',
                'img' => 'img/types/img22.jpg'
            ],
            [
                'name' => 'GIVI',
                'img' => 'img/types/img23.jpg'
            ],
            [
                'name' => 'Nolan',
                'img' => 'img/types/img24.jpg'
            ],
            [
                'name' => 'GM',
                'img' => 'img/types/img25.jpg'
            ],
            [
                'name' => 'NHK',
                'img' => 'img/types/img27.jpeg'
            ],
            [
                'name' => 'AGV',
                'img' => 'img/types/img28.jpg'
            ],




        ]);
    }
}
