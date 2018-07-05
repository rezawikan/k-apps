<?php

namespace App\Observers;

use App\Models\PriceType;
use Illuminate\Support\Facades\Log;

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
        Log::info('Price Type ' . $model->name .' created by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(PriceType $model)
    {
        Log::info('Price Type ' . $model->name .' created by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(PriceType $model)
    {
        Log::info('Price Type ' . $model->name .' created by: '.auth()->user()->email);
    }
}
