<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\Project;

class YearFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('YearFilter', 20, function () {
            return Project::distinct()->orderBy('year', 'desc')->get(['year'])->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        if ($value == null) {
            return $builder;
        }

        $builder->whereIn('year', $value);
    }
}
