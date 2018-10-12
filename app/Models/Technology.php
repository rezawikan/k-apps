<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\TechnologyObserver;
use App\Models\DistributionTarget;
use App\Models\TechnologyType;

class Technology extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','technology_types_id'];


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

    public function distribution_target()
    {
        return DistributionTarget::findOrFail($this->pivot->distribution_target_id);
    }

    public function technology_types()
    {
        return $this->belongsTo('App\Models\TechnologyType');
    }


}
