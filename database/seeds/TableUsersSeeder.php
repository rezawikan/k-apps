<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class TableUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'Mochammad',
          'email' => 'reza.wikan.dito@gmail.com',
          'password' => bcrypt('12345'),
        ]);


        User::create([
          'name' => 'Customer',
          'email' => 'customer@gmail.com',
          'password' => bcrypt('12345'),
        ]);
    }
}
