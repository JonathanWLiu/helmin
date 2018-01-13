<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Helm Fox B123',
                'typeId' => '1',
                'price' => '150000',
                'img' => 'img/products/1.jpg'
            ],
            [
                'name' => 'Helm Contin B234',
                'typeId' => '2',
                'price' => '120000',
                'img' => 'img/products/2.jpg'
            ],
            [
                'name' => 'Helm Taichi B223',
                'typeId' => '3',
                'price' => '130000',
                'img' => 'img/products/3.jpg'
            ],
            [
                'name' => 'Helm MDS C123',
                'typeId' => '4',
                'price' => '155000',
                'img' => 'img/products/1.jpg'
            ],
            [
                'name' => 'Helm GIVI C234',
                'typeId' => '5',
                'price' => '123000',
                'img' => 'img/products/2.jpg'
            ],
            [
                'name' => 'Helm Nolan N44',
                'typeId' => '6',
                'price' => '135000',
                'img' => 'img/products/3.jpg'
            ],
        ]);
    }
}
