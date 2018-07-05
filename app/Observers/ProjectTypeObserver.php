<?php

namespace App\Observers;

use App\Models\ProjectType;
use Illuminate\Support\Facades\Log;

class ProjectTypeObserver
{

  /**
   * Listen to the Project Type creating event.
   *
   * @param  ProjectType  $categories
   * @return void
   */
    public function saving(ProjectType $model)
    {
        $model->slug = str_slug($model->name);
    }
    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(ProjectType $model)
    {
        Log::info('Project Type ' . $model->name .' created by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(ProjectType $model)
    {
        Log::info('Project Type ' . $model->name .' updated by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(ProjectType $model)
    {
        Log::info('Project Type ' . $model->name .' deleted by: '.auth()->user()->email);
    }
}
