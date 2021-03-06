<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\Technology;

class TechnologyFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('TechnologyFilter', 20, function () {
            return Technology::select('name','slug')->orderBy('name', 'asc')->get()->toArray();
        });
    }
    public function filter(Builder $builder, $value)
    {

        if ($value == null) {
            return $builder;
        }

        $builder->whereHas('technologies', function (Builder $builder) use ($value) {
            $builder->whereIn('slug', $value);
        });
    }
}
