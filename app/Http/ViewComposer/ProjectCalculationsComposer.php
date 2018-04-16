<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Filters\Project\ProjectFilters;

class ProjectCalculationsComposer
{
    public function compose(View $view)
    {
        $view->with([
            'calculations' => ProjectFilters::calculations()
        ]);
    }
}
