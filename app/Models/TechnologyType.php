<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CreateSlugTrait;

class TechnologyType extends Model
{
    use CreateSlugTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
