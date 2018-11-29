<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use App\Models\TechnologyType;
use App\Models\DistributionTarget;

class RolesTechnology extends Model
{
    protected $fillable = ['technology_type_id','distribution_target_id','multiplier'];

    protected $table = 'technology_rules';

    public function technology_type()
    {
      return $this->belongsTo(TechnologyType::class);
    }

    public function distribution_target()
    {
      return $this->belongsTo(DistributionTarget::class);
    }
}
