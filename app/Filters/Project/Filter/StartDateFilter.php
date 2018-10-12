<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\Project;

class StartDateFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('StartDateFilter', 20, function () {
            return Project::distinct()->orderBy('start_date', 'desc')->get(['start_date'])->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        if ($value == null) {
            return $builder;
        }

        $builder->whereIn('start_date', $value);
    }
}
