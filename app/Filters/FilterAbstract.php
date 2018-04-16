<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class FilterAbstract
{
    abstract public function filter(Builder $builder, $value);

    public function mappings()
    {
        return [];
    }

    protected function resolveFilterValue($values)
    {
        return $values = array_filter($values, function ($value) {
            return $this->arrayFlatten($value) != false;
        });
    }

    protected function arrayFlatten($item)
    {
        return in_array($item, array_flatten($this->mappings()));
    }

    /**
     * Resolve the order direction to be used.
     *
     * @param  string $direction
     * @return string
     */
    protected function resolveSlug($values)
    {
        $values = array_map(function ($value) {
            $value = title_case(str_replace('-', ' ', $value));
            return $value;
        }, $values);

        return $this->resolveFilterValue($values);
    }

    /**
     * Resolve the order direction to be used.
     *
     * @param  string $direction
     * @return string
     */
    protected function resolveSingleSlug($value)
    {
        $value = title_case(str_replace('-', ' ', $value));
        return $this->arrayFlatten($value) ? $value : 'null';
    }
}
