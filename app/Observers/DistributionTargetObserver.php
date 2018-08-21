<?php

namespace App\Observers;

use App\Models\Log;
use App\Traits\Log\Logs;
use App\Models\DistributionTarget;

class DistributionTargetObserver
{
    use Logs;
    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function saving(DistributionTarget $model)
    {
        $model->slug = str_slug($model->name);
    }

    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(DistributionTarget $model)
    {
        $data = [ 'name' => $model->name ];
        $logs = $this->createLog('Distribution Target', $data, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(DistributionTarget $model)
    {
        $old = ['name' => $model->getOriginal('name')];
        $new = ['name' => $model->name];

        $logs = $this->updateLog('Distribution Target', $old, $new, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(DistributionTarget $model)
    {
        $data = [ 'name' => $model->name ];

        $logs = $this->deleteLog('Distribution Target', $data, auth()->user()->email);
        Log::create($logs);
    }
}
