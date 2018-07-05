<?php

use Illuminate\Database\Seeder;
use App\Models\DistributionTarget;

class DistributionTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
          'Household',
          'Individual',
          'Institution',
          'Whole Village',
              ];

        foreach ($list as $value) {
            DistributionTarget::create([
          'name' => $value,
          'slug' => str_slug($value)
          ]);
        }
    }
}
