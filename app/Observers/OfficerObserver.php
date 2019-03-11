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
    public function created(Officer $model)
    {
        $logs = $this->createLog('Officer', ['name' => $model->name], auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Officer $model)
    {
        $logs = $this->updateLog('Officer', ['name' => $model->getOriginal('name')] ,['name' => $model->name], auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Officer $model)
    {
        $logs = $this->deleteLog('Officer', ['name' => $model->name], auth()->user()->email);
        Log::create($logs);
    }
}
