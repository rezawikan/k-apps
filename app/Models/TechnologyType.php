<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\TechnologyTypeObserver;
use App\Models\DistributionTarget;
use App\Models\Technology;

class TechnologyType extends Model
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
        self::observe(TechnologyTypeObserver::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function distribution_targets()
    {
        return $this->belongsToMany(DistributionTarget::class,'technology_rules','technology_type_id','distribution_target_id')->withPivot([
          'multiplier','id'
        ]);
    }

    /**
     * The roles that belong to the user.
     */
    public function technologies()
    {
        return $this->hasMany(Technology::class);
    }
}
