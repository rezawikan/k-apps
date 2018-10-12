<?php

namespace App\Observers;

use App\Models\FundingType;
use App\Models\Log;
use App\Traits\Log\Logs;

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

    // /**
    //  * Listen to the Category creating event.
    //  *
    //  * @param  Category  $categories
    //  * @return void
    //  */
    // public function created(FundingType $model)
    // {
    //     $data = [ 'name' => $model->name ];
    //     $logs = $this->createLog('Funding Type', $data, auth()->user()->email);
    //     Log::create($logs);
    // }
    //
    // /**
    //  * Listen to the Category deleting event.
    //  *
    //  * @param  Category  $categories
    //  * @return void
    //  */
    // public function updated(FundingType $model)
    // {
    //     $old = ['name' => $model->getOriginal('name')];
    //     $new = ['name' => $model->name];
    //
    //     $logs = $this->updateLog('Funding Type', $old, $new, auth()->user()->email);
    //     Log::create($logs);
    // }
    //
    // /**
    //  * Listen to the Category deleting event.
    //  *
    //  * @param  Category  $categories
    //  * @return void
    //  */
    // public function deleted(FundingType $model)
    // {
    //     $data = [ 'name' => $model->name ];
    //     $logs = $this->deleteLog('Funding Type', $data, auth()->user()->email);
    //     Log::create($logs);
    // }
}
