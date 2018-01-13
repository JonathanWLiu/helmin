<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name'=>'admin',
            'email'=>'admin@mail.com',
            'password'=>bcrypt('admin'),
            'role'=>'1',
            'phone'=>'08123456789',
            'gender'=>'Male',
            'address'=>'Jl. jalan 1',
            'profilePicture'=>null,
        ],
        [
            'name'=>'user',
            'email'=>'user@mail.com',
            'password'=>bcrypt('user'),
            'role'=>'0',
            'phone'=>'08123456789',
            'gender'=>'Male',
            'address'=>'Jl. jalan 1',
            'profilePicture'=>null,
        ],
        ]);
    }
}
