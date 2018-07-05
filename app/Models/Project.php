<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Project\ProjectFilters;
use Illuminate\Database\Eloquent\Builder;
use App\Observers\ProjectObserver;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['project_name','start_date','year','country','price_type','project_type','officer'];

    protected $appends  = ['additional_total_reached','additional_total_distributed'];

    /**
      * Bootstrap any application services.
      *
      * @return void
      */
    public static function boot()
    {
        parent::boot();
        self::observe(ProjectObserver::class);
    }

    /**
       * filter models
       */
    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new ProjectFilters($request))->add($filters)->filter($builder);
    }

    /**
 * Get the user's full name.
 *
 * @return string
 */
    public function getAdditionalTotalReachedAttribute()
    {
        $values = $this->technologies->toArray();
        $string = 'total_reach';
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];

        $values = array_map(function ($value) use ($string, $technology, $techtype) {
            $value[$string] = 0;
            if (!empty($technology) or !empty($techtype)) {
                if (in_array($value['name'], con($technology)) or in_array($value['type'], con($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } else {
                $value[$string] += $value['pivot'][$string];
            }
            return $value[$string];
        }, $values);

        return array_sum($values);
    }

    /**
 * Get the user's full name.
 *
 * @return string
 */
    public function getAdditionalTotalDistributedAttribute()
    {
        $values = $this->technologies->toArray();
        $string = 'distribution_unit';
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];

        $values = array_map(function ($value) use ($string, $technology, $techtype) {
            $value[$string] = 0;
            if (!empty($technology) or !empty($techtype)) {
                if (in_array($value['name'], con($technology)) or in_array($value['type'], con($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } else {
                $value[$string] += $value['pivot'][$string];
            }
            return $value[$string];
        }, $values);

        return array_sum($values);
    }

    /**
       * Get the Price Type record associated with the project.
       */
    public function price_type()
    {
        return $this->belongsTo('App\Models\PriceType');
    }

    /**
       * Get the Funding Type record associated with the projects.
       */
    public function funding_types()
    {
        return $this->belongsToMany('App\Models\FundingType')->withTimestamps();
    }

    /**
       * Get the Project Type record associated with the projects.
       */
    public function project_type()
    {
        return $this->belongsTo('App\Models\ProjectType');
    }

    /**
       * Get the Technologies record associated with the projects.
       */
    public function technologies()
    {
        return $this->belongsToMany('App\Models\Technology')->withPivot('id', 'distribution_target', 'per_unit', 'distribution_unit', 'total_reach');
    }

    /**
       * Get the Officer record associated with the project.
       */
    public function officer()
    {
        return $this->belongsTo('App\Models\Officer');
    }
}
