<?php

namespace App\Observers;

use App\Models\FundingType;
use App\Models\Logging;
use App\Traits\Logging\Logs;

class FundingTypeObserver
{
    use Logs;
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
        $logs = Logs::createLog('Funding Type', $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(FundingType $model)
    {
        $logs = Logs::updateLog('Funding Type', $model->getOriginal('name'), $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(FundingType $model)
    {
        $logs = Logs::deleteLog('Funding Type', $model->name, auth()->user()->email);
        Logging::create($logs);
    }
}
