<?php

namespace App\Observers;

use App\Models\Logging;
use App\Traits\Logging\Logs;
use App\Models\DistributionTarget;

class DistributionTargetObserver
{
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
        $logs = Logs::createLog('Distribution Target', $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(DistributionTarget $model)
    {
        $logs = Logs::updateLog('Distribution Target', $model->getOriginal('name'), $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(DistributionTarget $model)
    {
        $logs = Logs::deleteLog('Distribution Target', $model->name, auth()->user()->email);
        Logging::create($logs);
    }
}
