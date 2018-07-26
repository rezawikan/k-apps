<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\PriceType;
use App\Traits\Log\Logs;

class PriceTypeObserver
{

  /**
   * Listen to the Category creating event.
   *
   * @param  Category  $categories
   * @return void
   */
    public function saving(PriceType $model)
    {
        $model->slug = str_slug($model->name);
    }
    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(PriceType $model)
    {
        $logs = Logs::createLog('Price Type', $model->name, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(PriceType $model)
    {
        $logs = Logs::updateLog('Price Type', $model->getOriginal('name'), $model->name, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(PriceType $model)
    {
        $logs = Logs::deleteLog('Price Type', $model->name, auth()->user()->email);
        Log::create($logs);
    }
}
