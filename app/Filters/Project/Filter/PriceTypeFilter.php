<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\PriceType;

class PriceTypeFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('PriceTypeFilter', 20, function () {
            return PriceType::select('id', 'name', 'slug')->orderBy('name', 'asc')->get()->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        if ($value == null) {
            return $builder;
        }

        $values = $this->resolveFilterValue($value);

        $builder->whereHas('price_type', function (Builder $builder) use ($value) {
            $builder->whereIn('slug', $value);
        });
    }
}
