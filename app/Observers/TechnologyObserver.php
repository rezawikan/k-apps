<?php

namespace App\Observers;

use App\Models\Technology;
use Illuminate\Support\Facades\Log;

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
        Log::info('Technology ' . $model->name .' created by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Technology $model)
    {
        Log::info('Technology ' . $model->name .' updated by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Technology $model)
    {
        Log::info('Technology ' . $model->name .' deleted by: '.auth()->user()->email);
    }
}
