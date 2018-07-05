<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\Technology;

class TechnologyTypeFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('TechnologyTypeFilter', 20, function () {
            return  TechnologyType::select('name')->orderBy('name', 'asc')->get()->toArray();
        });
    }
    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveSlug($value);

        if ($value == null) {
            return $builder;
        }

        $builder->whereHas('technologies', function (Builder $builder) use ($value) {
            $builder->whereIn('type', $value);
        });
    }
}
