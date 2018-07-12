<?php

namespace App\Observers;

use App\Models\Officer;
use App\Models\Logging;
use App\Traits\Logging\Logs;

class OfficerObserver
{

  /**
   * Listen to the Officer creating event.
   *
   * @param  Officer  $categories
   * @return void
   */
    public function saving(Officer $model)
    {
        $model->slug = str_slug($model->name);
    }

    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(Officer $mode)
    {
        $logs = Logs::createLog('Officer', $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Officer $mode)
    {
        $logs = Logs::updateLog('Officer', $model->getOriginal('name'), $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Officer $mode)
    {
        $logs = Logs::deleteLog('Officer', $model->name, auth()->user()->email);
        Logging::create($logs);
    }
}
