<?php


namespace App\Traits;

use App\Models\User;
use Carbon\Carbon;

/**
 *
 */
trait BirthdayTraits
{
    public static function birthday()
    {
        $nowDay   = Carbon::now()->day;
        $nowMonth = Carbon::now()->month;
        $addDays  = Carbon::now()->addDays(20);

        $data     = User::all();

        $noFilter = $data->map(function ($data) use ($nowDay,$nowMonth,$addDays) {
            $userDay = Carbon::parse($data->dob)->day;
            $userMonth = Carbon::parse($data->dob)->month;
            $userYear = Carbon::parse($data->dob)->year;

            if ($userDay == $nowDay && $nowMonth == $userMonth) {
                if ($data->id != 39) {
                    return $data;
                }
            } elseif ($nowMonth == $userMonth && ($nowDay <= Carbon::parse($data->dob)->day)) {
                if ($data->id != 39) {
                    return $data;
                }
            } elseif (($nowMonth+1) == $userMonth) {
                if ($data->id != 39) {
                    return $data;
                }
            }
        });

        return array_values(array_filter($noFilter->toArray()));
    }
}
