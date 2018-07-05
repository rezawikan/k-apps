<?php

namespace App\Observers;

use App\Models\DistributionTarget;
use Illuminate\Support\Facades\Log;

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
        Log::info('Distribution Target ' . $model->name .' created by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(DistributionTarget $model)
    {
        Log::info('Distribution Target ' . $model->name .' updated by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(DistributionTarget $model)
    {
        Log::info('Distribution Target ' . $model->name .' deleted by: '.auth()->user()->email);
    }
}
