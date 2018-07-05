<?php

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
      'Solar Ear',
      'Firefly Mobile Lamp',
      'Maternova',
      'Solvatten',
      'Biomass Charcoal Briquettes',
      'K-Light',
      'Q Drum',
      'Driptech',
      'Replacement Batteries'
      ];

        foreach ($list as $value) {
            Technology::create([
              'name' => $value,
              'slug' => str_slug($value)
            ]);
        }
    }
}
