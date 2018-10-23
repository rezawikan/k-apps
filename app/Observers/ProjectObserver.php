<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\PriceType;
use App\Models\FundingType;
use App\Models\Country;
use App\Models\Log;
use App\Traits\Log\Logs;

class ProjectObserver
{
    use Logs;
    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(Project $model)
    {
        $data = [
          'project name'  => $model->project_name,
          'start date'    => $model->start_date,
          'country'       => $model->country->name,
          'price type'    => $model->price_type->name,
          'project type'  => $model->project_type->name,
          'officer'       => $model->officer
        ];

        $logs = $this->createLog('Project', $data, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Project $model)
    {
        $old = [
          'project name' => $model->getOriginal('project_name'),
          'start date'   => $model->getOriginal('start_date'),
          'country'      => Country::find($model->getOriginal('country_id'))->name,
          'price type'   => ProjectType::find($model->getOriginal('price_type_id'))->name,
          'project type' => ProjectType::find($model->getOriginal('project_type_id'))->name,
          'officer'      => $model->getOriginal('officer'),
        ];

        $new = [
          'project name' => $model->project_name,
          'start date'   => $model->start_date,
          'country'      => Country::find($model->country_id)->name,
          'price type'   => PriceType::find($model->price_type_id)->name,
          'project type' => ProjectType::find($model->project_type_id)->name,
          'officer'      => $model->officer,
        ];
        $diff_old = array_diff($old, $new); //before
        $diff_new = array_diff($new, $old); // new
        $logs = $this->updateLog('Project', $diff_old, $diff_new, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Project $model)
    {
        $data = [
          'project name' => $model->project_name,
          'start date'   => $model->start_date,
          'country'      => Country::find($model->country_id)->name,
          'price type'   => PriceType::find($model->price_type_id)->name,
          'project type' => ProjectType::find($model->project_type_id)->name,
          'officer'      => $model->officer
        ];

        $logs = $this->deleteLog('Project', $data, auth()->user()->email);
        Log::create($logs);
    }
}
