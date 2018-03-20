<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = Project::create([
          'project_name' => 'Light Up Nigeria',
          'start_date' => now(),
          'year' => 2010,
          // 'distribution' => 3,
          // 'per_unit' => 4,
          // 'total_reach' => 7,
          'price_type_id' => 1,
          // 'distribution_target_id' => 1,
          'project_type_id' => 1
        ]);

        $project->technologies()->sync([
          1 => [
            'distribution_target' => 'Household',
            'per_unit' => 5,
            'distribution_unit' => 10,
            'total_reach' => 5*10
            ] ,
          2,
          3
        ]);
    }
}
