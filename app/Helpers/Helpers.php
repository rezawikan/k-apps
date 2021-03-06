<?php
/**
     * Set any link as active by adding active class
     *
     * @param [uri] Current URI
     * @param [output] Active
     * @return Active class
     */

function isActiveRoute($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $value) {
            if (Route::current()->uri == $value) {
                return $output;
            }
        }
    } else {
        if (Route::current()->uri == $uri) {
            return $output;
        }
    }
}


function sidebar($uri = 'dashboard')
{
    return Route::current()->uri == $uri ? 'sidebar-content'  : '';
}


/*
* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
* SYSTEM
* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 */

function appendQueryString($params)
{
    $query = Request::all();
    foreach ($params as $key => $value) {
        $query[$key] = $value;
    }
    return Request::url() . '?' . http_build_query($query);
}


function convertSlugPlus($value, $array)
{
    if (is_array($array)) {
        $value = title_case(str_replace('-', ' ', $value));
        $array = array_map(function ($val) {
            $val =  title_case(str_replace('-', ' ', $val));
            return $val;
        }, $array);

        return in_array($value, $array) ? 'selected' : false;
    }

    return false;
}

function convertSlug($value, $array)
{
    if (is_array($array)) {
        return in_array($value, $array) ? 'selected' : false;
    }

    return false;
}

function convertSlugSingle($value, $request)
{
    $value = str_slug($value);

    return $value == $request ? 'selected' : false;
}


function funding_types_list($value)
{
    if ($value === null) {
        return null;
    }
     return $value->map(function ($value) {
        return $value->id;
    })->toArray();
}

function checkMatch($val1, $val2)
{
    if ($val1 == $val2) {
        return 'selected';
    }

    return false;
}

function checkOldValue($source = null, $value, $param)
{
    if ($source != null) {
        // dd($source == $value);
        return $source == $value ? 'selected' : '';
    } else {
        return old($param) == $value ? 'selected' : '';
    }
}

// function is not used move to get attribute
function sumProjects($values, $string)
{
    $values = $values->toArray();

    $values = array_map(function ($value) use ($string) {
        $value[$string] = 0;
        $value[$string] += $value['pivot'][$string];
        return $value[$string];
    }, $values);

    return array_sum($values);
}

function isQueryString($params)
{
    return !array_diff($params, Request::all());
}

function convertModelToArray($values)
{
  return $values->get()->toArray();
}

function funding_types_helper($values)
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
