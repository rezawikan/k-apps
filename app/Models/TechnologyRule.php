<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TechnologyType;
use App\Models\DistributionTarget;

class TechnologyRule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['technology_type_id','distribution_target_id','multiplier'];
    
    public function technology_type()
    {
        return $this->belongsTo(TechnologyType::class);
    }

    public function distribution_target()
    {
        return $this->belongsTo(DistributionTarget::class);
    }
}
