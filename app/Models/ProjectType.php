<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\ProjectTypeObserver;

class ProjectType extends Model
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
        self::observe(ProjectTypeObserver::class);
    }
}
