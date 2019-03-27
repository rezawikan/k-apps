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

    /**
    * Get the user's full name.
    *
    * @return string
    */
    public function getAdditionalTotalReachedAttribute()
    {
        $values = $this->technologies;

        $string = 'total_reach';
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];
        $year       = request('years') ?? [];

        $values = $values->map(function ($value) use ($string, $technology, $techtype, $year) {
            $value[$string] = 0;
            if (!empty($technology) and !empty($techtype) and !empty($year)) { // T TT Y

                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value->technology_type->name, $this->convertToTitleCase($techtype)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and empty($techtype) and empty($year)) { // !T !TT !Y
                $value[$string] += $value['pivot'][$string];
            } elseif (empty($technology) and !empty($techtype) and !empty($year)) { // !T TT Y
                if (in_array($value->technology_type->name, $this->convertToTitleCase($techtype)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and empty($techtype) and empty($year)) { // T !TT !Y
                if (in_array($value['name'], $this->convertToTitleCase($technology))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and empty($techtype) and !empty($year)) { // !T !TT Y
                // dd($year);
                if (in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and !empty($techtype) and empty($year)) { // T TT !Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value->technology_type->name, $this->convertToTitleCase($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and empty($techtype) and !empty($year)) { // T !TT Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and !empty($techtype) and empty($year)) { // !T TT !Y
                if (in_array($value->technology_type->name, $this->convertToTitleCase($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            }
            return $value[$string];
        }, $values);

        return array_sum($values->toArray());
    }

    /**
    * Get the user's full name.
    *
    * @return string
    */
    public function getAdditionalTotalDistributedAttribute()
    {
        $values = $this->technologies;
        $string = 'distribution_unit';
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];
        $year       = request('years') ?? [];

        $values = $values->map(function ($value) use ($string, $technology, $techtype, $year) {
            $value[$string] = 0;
            if (!empty($technology) and !empty($techtype) and !empty($year)) { // T TT Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value->technology_type->name, $this->convertToTitleCase($techtype)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and empty($techtype) and empty($year)) { // !T !TT !Y
                $value[$string] += $value['pivot'][$string];
            } elseif (empty($technology) and !empty($techtype) and !empty($year)) { // !T TT Y
                if (in_array($value->technology_type->name, $this->convertToTitleCase($techtype)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and empty($techtype) and empty($year)) { // T !TT !Y
                if (in_array($value['name'], $this->convertToTitleCase($technology))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and empty($techtype) and !empty($year)) { // !T !TT Y

                if (in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and !empty($techtype) and empty($year)) { // T TT !Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value->technology_type->name, $this->convertToTitleCase($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and empty($techtype) and !empty($year)) { // T !TT Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and !empty($techtype) and empty($year)) { // !T TT !Y
                if (in_array($value->technology_type->name, $this->convertToTitleCase($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            }
            return $value[$string];
        }, $values);

        return array_sum($values->toArray());
    }
}
