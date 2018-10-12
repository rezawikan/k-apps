<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Project\ProjectFilters;
use App\Models\FundingType;

// use Carbon\Carbon;

trait ProjectTrait
{
    /**
       * filter models
       */
    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new ProjectFilters($request))->add($filters)->filter($builder);
    }

    public function beforeSignFundingTypes(array $values)
    {
        return FundingType::find($values)->map(function ($value) {
            return [
          'name' => $value->name
        ];
        })->toArray();
    }

    public function afterSignFundingTypes()
    {
        return $this->funding_types->map(function ($value) {
            return [
            'name' => $value->name
          ];
        })->toArray();
    }

    public function hasFundingTypes()
    {
        return count($this->funding_types) > 0;
    }

    public function resolvedFundingTypes($values = null)
    {
        if (!$this->hasFundingTypes() && !empty($values)) {
            return $this->beforeSignFundingTypes($values);
        }

        return $this->afterSignFundingTypes();
    }

    public function convertFundingTypes($values)
    {
        if (empty($values)) {
            return 'Not Set';
        }

        $end    = end($values);

        $result = '';
        foreach ($values as $key => $value) {
            $result .= $value['name'];

            if (count($values) > 1 && $end['name'] != $value['name']) {
                $result .= ' / ';
            }
        }
        return $result;
    }
}
