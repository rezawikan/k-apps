<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'project_name',
    'start_date',
    'year',
    'price_type_id',
    'distribution_target_id',
    'officer_id'
  ];

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
        return $this->belongsToMany('App\Models\Technology')->withPivot('distribution_target', 'per_unit', 'distribution_unit', 'total_reach')->withTimestamps();
    }

    /**
       * Get the Officer record associated with the project.
       */
    public function officer()
    {
        return $this->belongsTo('App\Models\Officer');
    }
}
