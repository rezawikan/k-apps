<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\TechnologyObserver;

class Technology extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','type'];


    /**
      * Bootstrap any application services.
      *
      * @return void
      */
    public static function boot()
    {
        parent::boot();
        self::observe(TechnologyObserver::class);
    }

    /**
       * Get the projects record associated with the technology.
       */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }


}
