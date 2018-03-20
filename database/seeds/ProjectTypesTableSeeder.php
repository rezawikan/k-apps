<?php

use Illuminate\Database\Seeder;
use App\Models\ProjectType;

class ProjectTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $list = [
          'CSR',
          'Emergency Project',
          'Last Mile Consulting',
          'Sales (Wholesales)',
          'SolLab',
          'Special Project',
          'Standard Project',
          'Tech Kiosk',
          'TK Ubud',
          'Wonder Women'
              ];

        foreach ($list as $value) {
            ProjectType::create([
          'name' => $value
          ]);
        }
    }
}
