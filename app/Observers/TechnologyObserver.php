<?php

namespace App\Observers;

use App\Models\Technology;
use App\Models\Log;
use App\Traits\Log\Logs;

class TechnologyObserver
{
    use Logs;
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
    // /**
    //  * Listen to the Category creating event.
    //  *
    //  * @param  Category  $categories
    //  * @return void
    //  */
    // public function created(Technology $model)
    // {
    //     $data = [
    //       'name' => $model->name,
    //       'type' => $model->type
    //     ];
    //     $logs = $this->createLog('Technology', $data, auth()->user()->email);
    //     Log::create($logs);
    // }
    //
    // /**
    //  * Listen to the Category deleting event.
    //  *
    //  * @param  Category  $categories
    //  * @return void
    //  */
    // public function updated(Technology $model)
    // {
    //     $old = [
    //     'name' => $model->getOriginal('name'),
    //     'type' => $model->getOriginal('type')
    //   ];
    //
    //     $new = [
    //     'name' => $model->name,
    //     'type' => $model->type
    //   ];
    //
    //     $logs = $this->updateLog('Technology', $old, $new, auth()->user()->email);
    //     Log::create($logs);
    // }
    //
    // /**
    //  * Listen to the Category deleting event.
    //  *
    //  * @param  Category  $categories
    //  * @return void
    //  */
    // public function deleted(Technology $model)
    // {
    //     $data = [
    //     'name' => $model->name,
    //     'type' => $model->type
    //     ];
    //
    //     $logs = $this->deleteLog('Technology', $data, auth()->user()->email);
    //     Log::create($logs);
    // }
}
