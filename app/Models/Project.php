<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Project\ProjectFilters;
use Illuminate\Database\Eloquent\Builder;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['project_name','start_date','year','country','price_type','project_type','officer'];

  /**
     * filter models
     */
    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new ProjectFilters($request))->add($filters)->filter($builder);
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
        return $this->belongsToMany('App\Models\Technology')->withPivot('id','distribution_target', 'per_unit', 'distribution_unit', 'total_reach');
    }

    /**
       * Get the Officer record associated with the project.
       */
    public function officer()
    {
        return $this->belongsTo('App\Models\Officer');
    }
}
