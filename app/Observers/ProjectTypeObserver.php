<?php

namespace App\Observers;

use App\Models\ProjectType;
use App\Models\Log;
use App\Traits\Log\Logs;

class ProjectTypeObserver
{
    use Logs;

    /**
     * Listen to the Project Type creating event.
     *
     * @param  ProjectType  $categories
     * @return void
     */
    public function saving(ProjectType $model)
    {
        $model->slug = str_slug($model->name);
    }
    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(ProjectType $model)
    {
        $data = [ 'name' => $model->name ];
        $logs = $this->createLog('Project Type', $data, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(ProjectType $model)
    {
        $old = ['name' => $model->getOriginal('name')];
        $new = ['name' => $model->name];
        $logs = $this->updateLog('Project Type', $old, $new, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(ProjectType $model)
    {
        $data = ['name' => $model->name];
        $logs = $this->deleteLog('Project Type', $data, auth()->user()->email);
        Log::create($logs);
    }
}
