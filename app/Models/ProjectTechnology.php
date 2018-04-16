<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTechnology extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['project_id','technology_id','distribution_target','distribution_unit','per_unit','total_reach'];

  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_technology';
}
