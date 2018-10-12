<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class YearFilter extends FilterAbstract
{
    public function mappings()
    {
        return Cache::remember('YearFilter', 20, function () {
            return DB::table('project_technology')->select('year')->distinct()->get()->toArray();
        });
    }

    public function filter(Builder $builder, $value)
    {
        if ($value == null) {
            return $builder;
        }

        $builder->whereHas('technologies', function (Builder $builder) use ($value) {
          $builder->whereIn('year',$value);
        });
    }
}
