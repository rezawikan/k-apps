<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use App\Observers\PriceTypeObserver;

class PriceType extends Model
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
        self::observe(PriceTypeObserver::class);
    }

    public function projects()
    {
      return $this->hasMany(Project::class);
    }
}
