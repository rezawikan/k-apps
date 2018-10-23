<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ProjectTrait;
use App\Observers\ProjectObserver;
use App\Models\DistributionTarget;
use App\Models\PriceType;
use App\Models\FundingType;
use App\Models\ProjectType;
use App\Models\Technology;
use App\Models\Officer;
use App\Models\Country;
use App\Traits\TextCase;

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
                    ->withPivot('id', 'technology_id', 'per_unit', 'distribution_unit', 'total_reach', 'year', 'distribution_target_id');
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }

    /**
    * Get the user's full name.
    *
    * @return string
    */
    public function getAdditionalTotalReachedAttribute()
    {
        $values = $this->technologies;

        $string = 'total_reach';
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];
        $year       = request('years') ?? [];

        $values = $values->map(function ($value) use ($string, $technology, $techtype, $year) {
            $value[$string] = 0;
            if (!empty($technology) and !empty($techtype) and !empty($year)) { // T TT Y

                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value->technology_types->name, $this->convertToTitleCase($techtype)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and empty($techtype) and empty($year)) { // !T !TT !Y
                $value[$string] += $value['pivot'][$string];
            } elseif (empty($technology) and !empty($techtype) and !empty($year)) { // !T TT Y
                if (in_array($value->technology_types->name, $this->convertToTitleCase($techtype)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and empty($techtype) and empty($year)) { // T !TT !Y
                if (in_array($value['name'], $this->convertToTitleCase($technology))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and empty($techtype) and !empty($year)) { // !T !TT Y
                // dd($year);
                if (in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and !empty($techtype) and empty($year)) { // T TT !Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value->technology_types->name, $this->convertToTitleCase($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and empty($techtype) and !empty($year)) { // T !TT Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and !empty($techtype) and empty($year)) { // !T TT !Y
                if (in_array($value->technology_types->name, $this->convertToTitleCase($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            }
            return $value[$string];
        }, $values);

        return array_sum($values->toArray());
    }

    /**
    * Get the user's full name.
    *
    * @return string
    */
    public function getAdditionalTotalDistributedAttribute()
    {
        $values = $this->technologies;
        $string = 'distribution_unit';
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];
        $year       = request('years') ?? [];

        $values = $values->map(function ($value) use ($string, $technology, $techtype, $year) {
            $value[$string] = 0;
            if (!empty($technology) and !empty($techtype) and !empty($year)) { // T TT Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value->technology_types->name, $this->convertToTitleCase($techtype)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and empty($techtype) and empty($year)) { // !T !TT !Y
                $value[$string] += $value['pivot'][$string];
            } elseif (empty($technology) and !empty($techtype) and !empty($year)) { // !T TT Y
                if (in_array($value->technology_types->name, $this->convertToTitleCase($techtype)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and empty($techtype) and empty($year)) { // T !TT !Y
                if (in_array($value['name'], $this->convertToTitleCase($technology))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and empty($techtype) and !empty($year)) { // !T !TT Y

                if (in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and !empty($techtype) and empty($year)) { // T TT !Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value->technology_types->name, $this->convertToTitleCase($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (!empty($technology) and empty($techtype) and !empty($year)) { // T !TT Y
                if (in_array($value['name'], $this->convertToTitleCase($technology)) and in_array($value['pivot']['year'], $this->convertToTitleCase($year))) {
                    $value[$string] += $value['pivot'][$string];
                }
            } elseif (empty($technology) and !empty($techtype) and empty($year)) { // !T TT !Y
                if (in_array($value->technology_types->name, $this->convertToTitleCase($techtype))) {
                    $value[$string] += $value['pivot'][$string];
                }
            }
            return $value[$string];
        }, $values);

        return array_sum($values->toArray());
    }
}
