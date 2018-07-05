<?php

use Illuminate\Database\Seeder;
use App\Models\FundingType;

class FundingTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
                'Corporate',
                'CSR',
                'Crowdfunded',
                'Individuals',
                'Gov',
                'AidAgency',
                'Foundation'
                ];

        foreach ($list as $value) {
            FundingType::create([
            'name' => $value,
            'slug' => str_slug($value)
            ]);
        }
    }
}
