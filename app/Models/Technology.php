<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
       * Get the projects record associated with the technology.
       */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
}
