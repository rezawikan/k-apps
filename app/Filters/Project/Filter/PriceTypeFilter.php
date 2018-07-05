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
            return PriceType::select('name','slug')->orderBy('name', 'asc')->get()->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        $values = $this->resolveFilterValue($value);

        $values = array_map(function ($value) use ($values) {
            if (in_array($value['slug'], $values)) {
                $vals = $value['name'];
                return $vals;
            }
        }, $this->mappings());


        if ($value == null) {
            return $builder;
        }

        return $builder->whereIn('price_type', array_filter($values));
    }
}
