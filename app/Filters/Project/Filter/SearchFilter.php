<?php

namespace App\Filters\Project\Filter;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class SearchFilter extends FilterAbstract
{
    public function filter(Builder $builder, $value)
    {
      if ($value == null) {
          return $builder;
      }
        $builder->where('project_name', 'like', '%'.$value.'%');
    }
}
