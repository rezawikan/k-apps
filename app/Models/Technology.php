<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CreateSlugTrait;

class Technology extends Model
{
    use CreateSlugTrait; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','type'];

    /**
       * Get the projects record associated with the technology.
       */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
}
