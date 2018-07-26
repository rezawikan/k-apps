<?php

namespace App\Observers;

use App\Models\TechnologyType;
use App\Models\Log;
use App\Traits\Log\Logs;

class TechnologyTypeObserver
{

  /**
   * Listen to the Technology Type creating event.
   *
   * @param  TechnologyType  $categories
   * @return void
   */
    public function saving(TechnologyType $model)
    {
        $model->slug = str_slug($model->name);
    }

    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(TechnologyType $model)
    {
        $logs = Logs::createLog('Technology Type', $model->name, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(TechnologyType $model)
    {
        $logs = Logs::updateLog('Technology Type', $model->getOriginal('name'), $model->name, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(TechnologyType $model)
    {
        $logs = Logs::deleteLog('Technology Type', $model->name, auth()->user()->email);
        Log::create($logs);
    }
}
