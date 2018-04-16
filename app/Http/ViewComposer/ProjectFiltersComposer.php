<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Filters\Project\ProjectFilters;

class ProjectFiltersComposer
{
    public function compose(View $view)
    {
        $view->with([
            'mappings' => ProjectFilters::mappings()
        ]);
    }
}
