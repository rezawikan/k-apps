<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\OfficerObserver;

class Officer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
      * Bootstrap any application services.
      *
      * @return void
      */
    public static function boot()
    {
        parent::boot();
        self::observe(OfficerObserver::class);
    }
}
