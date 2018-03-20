<?php

use Illuminate\Database\Seeder;
use App\Models\PriceType;

class PriceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = ['Free', 'Market-based','Subsidized'];
        foreach ($list as $value) {
            PriceType::create([
            'name' => $value
          ]);
        }
    }
}
