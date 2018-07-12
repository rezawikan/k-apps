<?php

namespace App\Observers;

use App\Models\Technology;
use App\Models\Logging;
use App\Traits\Logging\Logs;

class TechnologyObserver
{

  /**
   * Listen to the Technology creating event.
   *
   * @param  Technology  $categories
   * @return void
   */
    public function saving(Technology $model)
    {
        $model->slug = str_slug($model->name);
    }
    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(Technology $model)
    {
        $logs = Logs::createLog('Technology', $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Technology $model)
    {
        $logs = Logs::updateLog('Technology', $model->getOriginal('name'), $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Technology $model)
    {
        $logs = Logs::deleteLog('Technology', $model->name, auth()->user()->email);
        Logging::create($logs);
    }
}
