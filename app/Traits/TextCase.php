<?php


namespace App\Traits;

/**
 *
 */
trait TextCase
{
    public function convertToTitleCase($array, $request = null)
    {
        if (is_array($array)) {
            $array = array_map(function ($val) {
                $val =  title_case(str_replace('-', ' ', $val));
                return $val;
            }, $array);

            return $array;
        }

        return false;
    }
}
