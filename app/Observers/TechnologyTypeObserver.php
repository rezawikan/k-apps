<?php

namespace App\Observers;

use App\Models\TechnologyType;
use Illuminate\Support\Facades\Log;

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
        Log::info('Technology Type ' . $model->name .' created by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(TechnologyType $model)
    {
        Log::info('Technology Type ' . $model->name .' updated by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(TechnologyType $model)
    {
        Log::info('Technology Type ' . $model->name .' deleted by: '.auth()->user()->email);
    }
}
