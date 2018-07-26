<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\Project;

class OfficerFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('OfficerFilter', 20, function () {
            return Project::select('officer')->orderBy('officer', 'asc')->distinct()->get()->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveSingleSlug($value);

        if ($value == null) {
            return $builder;
        }

        $builder->where('officer', $value);
    }
}
