<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Log;

class ProjectObserver
{

    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(Project $model)
    {
        Log::info('Project ' . $model->name .' created by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Project $model)
    {
        Log::info('Project ' . $model->name .' updated by: '.auth()->user()->email);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Project $model)
    {
        Log::info('Project ' . $model->name .' deleted by: '.auth()->user()->email);
    }
}
