<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CreateSlugTrait;

class FundingType extends Model
{
    use CreateSlugTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
       * Get the projects record associated with the funding type.
       */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
}
