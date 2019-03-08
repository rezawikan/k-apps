<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ProjectTrait;
use App\Observers\ProjectObserver;
use App\Models\ProjectTechnology;
use App\Models\DistributionTarget;
use App\Models\PriceType;
use App\Models\FundingType;
use App\Models\ProjectType;
use App\Models\Technology;
use App\Models\Officer;
use App\Models\Country;
use App\Traits\TextCase;
use App\Models\Log;
use App\Traits\Log\Logs;

class Project extends Model
{
    use ProjectTrait, TextCase, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['project_name','start_date','country_id','price_type_id','project_type_id','officer'];

    protected $appends  = ['additional_total_reached','additional_total_distributed'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();

        self::observe(ProjectObserver::class);

    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function price_type()
    {
        return $this->belongsTo(PriceType::class);
    }

    public function funding_types()
    {
        return $this->belongsToMany(FundingType::class)->withTimestamps();
    }

    public function distribution_targets()
    {
        return $this->belongsToMany(DistributionTarget::class);
    }

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class)
                    ->withPivot([
                      'id',
                      'technology_id',
                      'per_unit',
                      'distribution_unit',
                      'total_reach', 'year',
                      'distribution_target_id'
                    ]);
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
}

 // {\"id\":2,\"name\":\"Ubs\",\"slug\":\"ubs\",\"technology_types_id\":7,\"created_at\":\"2018-04-04 08:00:00\",\"updated_at\":\"2018-07-04 14:04:01\",\"total_reach\":75816,\"distribution_unit\":324,\"pivot\":{\"project_id\":205,\"technology_id\":2,\"id\":713,\"per_unit\":234,\"distribution_unit\":324,\"total_reach\":75816,\"year\":234,\"distribution_target_id\":1}},
