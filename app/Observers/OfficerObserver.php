<?php

namespace App\Observers;

use App\Models\Officer;
use Illuminate\Support\Facades\Log;

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
        Log::info('Officer ' . $model->name .' created by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Officer $mode)
    {
        Log::info('Officer ' . $model->name .' updated by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Officer $mode)
    {
        Log::info('Officer ' . $model->name .' deleted by: '.auth()->user()->email);
    }
}
