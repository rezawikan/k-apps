<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\ProjectType;

class PriceTypeFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('PriceTypeFilter', 20, function () {
            return ProjectType::select('name')->orderBy('name', 'asc')->get()->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveSlug($value);

        if ($value == null) {
            return $builder;
        }

        return $builder->whereIn('price_type', $value);
    }
}
