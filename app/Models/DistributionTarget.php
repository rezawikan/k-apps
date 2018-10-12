<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\DistributionTargetObserver;
use App\Models\Project;

class DistributionTarget extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    /**
      * Bootstrap any application services.
      *
      * @return void
      */
    public static function boot()
    {
        parent::boot();
        self::observe(DistributionTargetObserver::class);
    }
}
