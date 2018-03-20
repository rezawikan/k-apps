<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TableUsersSeeder::class);
        $this->call(PriceTypesTableSeeder::class);
        $this->call(FundingTypesTableSeeder::class);
        $this->call(DistributionTargetsTableSeeder::class);
        $this->call(ProjectTypesTableSeeder::class);
        // $this->call(TechnologiesTableSeeder::class);
        // $this->call(OfficersTableSeeder::class);s
        // $this->call(project_data::class);
        // $this->call(ProjectTableSeeder::class);

    }
}
