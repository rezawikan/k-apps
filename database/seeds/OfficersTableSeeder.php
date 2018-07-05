<?php

use Illuminate\Database\Seeder;
use App\Models\Officer;

class OfficersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $list = ['Ewa Wojkowska', 'Toshihiro Nakamura'];
      foreach ($list as $value) {
          Officer::create([
          'name' => $value,
          'slug' => str_slug($value)
        ]);
      }
    }
}
