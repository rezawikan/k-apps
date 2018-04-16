<?php

namespace App\Filters\Product\Sorting;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class Price extends FilterAbstract
{

    /**
     * Order by views in descending
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $direction)
    {
      // dd($direction);
      $value = explode('and',$direction);
      $a = implode(array_values($value));
      is_numeric($a);

      $this->validateValue($value);
        if ($direction == null) {
            return $builder;
        }

        // $builder->whereBetween('price',[10000,20000]);
        $builder->where('price','=>',1000)->where('price','=<',5000);
        dd($builder);
    }
}
