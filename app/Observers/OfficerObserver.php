<?php

namespace App\Observers;

use App\Models\Officer;
use App\Models\Log;
use App\Traits\Log\Logs;

class OfficerObserver
{
  use Logs;

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
        $logs = $this->createLog('Officer', $model->name, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Officer $mode)
    {
        $logs = $this->updateLog('Officer', $model->getOriginal('name'), $model->name, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Officer $mode)
    {
        $logs = $this->deleteLog('Officer', $model->name, auth()->user()->email);
        Log::create($logs);
    }
}
