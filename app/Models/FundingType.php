<?php

namespace App\Models;
use App\Observers\FundingTypeObserver;

use Illuminate\Database\Eloquent\Model;

class FundingType extends Model
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
        self::observe(FundingTypeObserver::class);
    }

    /**
       * Get the projects record associated with the funding type.
       */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
}
