<?php

namespace App\Observers;

use App\Models\TechnologyType;
use App\Models\Log;
use App\Traits\Log\Logs;

class TechnologyTypeObserver
{
    use Logs;
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

    // /**
    //  * Listen to the Category creating event.
    //  *
    //  * @param  Category  $categories
    //  * @return void
    //  */
    // public function created(TechnologyType $model)
    // {
    //     $data = [ 'name' => $model->name ];
    //     $logs = $this->createLog('Technology Type', $data, auth()->user()->email);
    //     Log::create($logs);
    // }
    //
    // /**
    //  * Listen to the Category deleting event.
    //  *
    //  * @param  Category  $categories
    //  * @return void
    //  */
    // public function updated(TechnologyType $model)
    // {
    //     $old = ['name' => $model->getOriginal('name')];
    //     $new = ['name' => $model->name];
    //     $logs = $this->updateLog('Technology Type', $old, $new, auth()->user()->email);
    //     Log::create($logs);
    // }
    //
    // /**
    //  * Listen to the Category deleting event.
    //  *
    //  * @param  Category  $categories
    //  * @return void
    //  */
    // public function deleted(TechnologyType $model)
    // {
    //     $data = [ 'name' => $model->name ];
    //     $logs = $this->deleteLog('Technology Type', $data, auth()->user()->email);
    //     Log::create($logs);
    // }
}
