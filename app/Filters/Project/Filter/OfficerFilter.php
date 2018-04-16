<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\Officer;

class OfficerFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('OfficerFilter', 20, function () {
            return Officer::select('name')->orderBy('name', 'asc')->get()->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveSingleSlug($value);

        // dd($value);

        if ($value == null) {
            return $builder;
        }

        $builder->where('officer', $value);
    }
}
