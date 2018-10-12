<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\ProjectType;

class ProjectTypeFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('ProjectTypeFilter', 20, function () {
            return ProjectType::select('id','slug', 'name')->orderBy('name', 'asc')->get()->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        if ($value == null) {
            return $builder;
        }

        $values = $this->resolveFilterValue($value);

        $builder->whereHas('project_type', function (Builder $builder) use ($value) {
            $builder->whereIn('slug', $value);
        });
    }
}
