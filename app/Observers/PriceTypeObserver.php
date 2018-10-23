<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\PriceType;
use App\Traits\Log\Logs;

class PriceTypeObserver
{
    use Logs;
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
        $data = [ 'name' => $model->name ];
        $logs = $this->createLog('Price Type', $data, auth()->user()->email);
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
        $old = ['name' => $model->getOriginal('name')];
        $new = ['name' => $model->name];
        $logs = $this->updateLog('Price Type', $old, $new, auth()->user()->email);
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
        $data = [ 'name' => $model->name ];
        $logs = $this->deleteLog('Price Type', $data, auth()->user()->email);
        Log::create($logs);
    }
}
