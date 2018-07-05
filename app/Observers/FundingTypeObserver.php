<?php

namespace App\Observers;

use App\Models\FundingType;
use Illuminate\Support\Facades\Log;

class FundingTypeObserver
{

  /**
   * Listen to the Funding Type creating event.
   *
   * @param  FundingType  $categories
   * @return void
   */
    public function saving(FundingType $model)
    {
        $model->slug = str_slug($model->name);
    }

    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(FundingType $model)
    {
        Log::info('Funding Type ' . $model->name .' created by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(FundingType $model)
    {
        Log::info('Funding Type ' . $model->name .' updated by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(FundingType $model)
    {
        Log::info('Funding Type ' . $model->name .' deleted by: '.auth()->user()->email);
    }
}
