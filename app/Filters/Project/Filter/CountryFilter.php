<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\Country;

class CountryFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('CountryFilter', 20, function () {
            return Country::select('code','name')->orderBy('name', 'asc')->get()->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        if ($value == null) {
            return $builder;
        }

        $values = array_map(function($data){
          return strtoupper($data);
        }, $value);

        $builder->whereHas('country', function (Builder $builder) use ($values) {
            $builder->whereIn('code', $values);
        });
    }
}
