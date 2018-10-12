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

    /**
       * Get the Project Type record associated with the projects.
       */
    public function project_type()
    {
        return $this->hasOne('App\Models\Project');
    }
}
