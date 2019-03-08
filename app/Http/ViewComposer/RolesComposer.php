<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Role;

class RolesComposer
{
    public function compose(View $view)
    {
        $view->with([
            'roles' => Role::all()
        ]);
    }
}
