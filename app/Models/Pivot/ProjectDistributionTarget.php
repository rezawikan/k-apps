<?php

namespace App\Models\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\DistributionTarget;
use App\Models\Project;
use App\Models\Technology;

class ProjectDistributionTarget extends Pivot
{
    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function distribution_target()
    {
        return $this->belongsTo(DistributionTarget::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }
}
