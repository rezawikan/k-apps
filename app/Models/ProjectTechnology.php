<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\ProjectTechnologyObserver;

class ProjectTechnology extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id','technology_id','distribution_target','distribution_unit','per_unit','total_reach','year'];

    /**
       * The table associated with the model.
       *
       * @var string
       */
    protected $table = 'project_technology';

    /**
      * Bootstrap any application services.
      *
      * @return void
      */
    public static function boot()
    {
        parent::boot();
        self::observe(ProjectTechnologyObserver::class);
    }
}
