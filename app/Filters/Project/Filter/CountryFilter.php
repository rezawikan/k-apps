<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\Project;

class CountryFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('CountryFilter', 20, function () {
            return Project::distinct()->orderBy('country', 'asc')->get(['country'])->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveSlug($value);

        if ($value == null) {
            return $builder;
        }

        $builder->whereIn('country', $value);
    }
}
