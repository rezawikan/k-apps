<?php

namespace App\Filters\Project;

use App\Models\User;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Country;
use App\Models\ProjectType;
use App\Models\PriceType;
use App\Models\FundingType;
use App\Models\DistributionTarget;
use App\Models\TechnologyType;
use Illuminate\Support\Facades\Cache;
use App\Filters\FiltersAbstract;
use App\Filters\Project\Filter\YearFilter;
use App\Filters\Project\Filter\StartDateFilter;
use App\Filters\Project\Filter\ProjectTypeFilter;
use App\Filters\Project\Filter\CountryFilter;
use App\Filters\Project\Filter\OfficerFilter;
use App\Filters\Project\Filter\PriceTypeFilter;
use App\Filters\Project\Filter\TechnologyFilter;
use App\Filters\Project\Filter\TechnologyTypeFilter;
use App\Filters\Project\Filter\SearchFilter;
use Illuminate\Support\Facades\DB;

class ProjectFilters extends FiltersAbstract
{
    // use TextCase;

    protected $filters = [
      'years'        => YearFilter::class,
      'start_date'   => StartDateFilter::class,
      'project_type' => ProjectTypeFilter::class,
      'country'      => CountryFilter::class,
      'officer'      => OfficerFilter::class,
      'price_type'   => PriceTypeFilter::class,
      'technology'   => TechnologyFilter::class,
      'techtype'     => TechnologyTypeFilter::class,
      'search'       => SearchFilter::class
    ];

    public static function mappings()
    {
        return Cache::remember('mappingsFilters', 100, function () {
            return $map = [
              'filters'     => [
                    'years'         => DB::table('project_technology')->select('year')->distinct()->orderBy('year', 'desc')->get()->toArray(),
                    'start_date'    => Project::distinct()->orderBy('start_date', 'desc')->get(['start_date']),
                    'project_type'  => ProjectType::select('name', 'id')->orderBy('name', 'asc')->get(),
                    'countries'     => Country::select('id', 'code', 'name')->orderBy('name', 'asc')->get(),
                    'officer'       => Project::select('officer')->orderBy('officer', 'asc')->distinct()->get()->toArray(),
                    'users'         => User::select()->orderBy('first_name', 'asc')->get()->toArray(),
                    'technologies'  => Technology::select('name', 'id', 'slug')->orderBy('name', 'asc')->get(),
                    'techtype'      => TechnologyType::select('id','name')->orderBy('name', 'asc')->get(),
                    'pricetype'     => PriceType::select('id', 'name', 'slug')->orderBy('name', 'asc')->get(),
                    'distributions' => DistributionTarget::select('id', 'name')->orderBy('name', 'asc')->get(),
                    'funding_type'  => FundingType::select('id', 'name')->orderBy('name', 'asc')->get(),
              ]
            ];
        });
    }

    public static function calculations()
    {
        $officer      = request('officer') ?? 'empty';
        $search       = request('search') ?? 'empty';
        $start_date   = implode(request('start_date') ?? ['empty']);
        $price_type   = implode(request('price_type') ?? ['empty']);
        $project_type = implode(request('project_type') ?? ['empty']);
        $country      = implode(request('country') ?? ['empty']);
        $technology   = implode(request('technology') ?? ['empty']);
        $techtype     = implode(request('techtype') ?? ['empty']);
        $year         = implode(request('years') ?? ['empty']);
        $page         = request('page') ?? 'empty';

        $values = md5(vsprintf('%s.%s.%s.%s.%s.%s.%s.%s.%s.%s', [
            $officer,
            $search,
            $start_date,
            $price_type,
            $project_type,
            $country,
            $technology,
            $techtype,
            $year,
            $page
          ]));

        return Cache::remember($values, 100, function () {
            return [
              'country'     => Project::with(['technologies'])->filter(request())->distinct()->count('country_id'),
              'reached'     => self::reached(),
              'distributed' => self::distributed(),
            ];
        });
    }

    protected static function reached()
    {
        $projects   = Project::with(['technologies'])->filter(request())->get();
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];
        $year       = request('years') ?? [];

        $projects = $projects->map(function ($project) use ($technology, $techtype, $year) {
            $project['total_reach'] = 0;
            foreach ($project['technologies'] as $value) {
                if (!empty($technology) and !empty($techtype) and !empty($year)) { // T TT Y
                    if (in_array($value['name'], self::convertToTitleCase($technology)) and in_array($value->technology_type->name, self::convertToTitleCase($techtype)) and in_array($value['pivot']['year'], self::convertToTitleCase($year))) {
                        $project['total_reach'] += $value['pivot']['total_reach'];
                    }
                } elseif (empty($technology) and empty($techtype) and empty($year)) { // !T !TT !Y
                    $project['total_reach'] += $value['pivot']['total_reach'];
                } elseif (empty($technology) and !empty($techtype) and !empty($year)) { // !T TT Y
                    if (in_array($value->technology_type->name, self::convertToTitleCase($techtype)) and in_array($value['pivot']['year'], self::convertToTitleCase($year))) {
                        $project['total_reach'] += $value['pivot']['total_reach'];
                    }
                } elseif (!empty($technology) and empty($techtype) and empty($year)) { // T !TT !Y
                    if (in_array($value['name'], self::convertToTitleCase($technology))) {
                        $project['total_reach'] += $value['pivot']['total_reach'];
                    }
                } elseif (empty($technology) and empty($techtype) and !empty($year)) { // !T !TT Y

                    if (in_array($value['pivot']['year'], self::convertToTitleCase($year))) {
                        $project['total_reach'] += $value['pivot']['total_reach'];
                    }
                } elseif (!empty($technology) and !empty($techtype) and empty($year)) { // T TT !Y
                    if (in_array($value['name'], self::convertToTitleCase($technology)) and in_array($value->technology_type->name, self::convertToTitleCase($techtype))) {
                        $project['total_reach'] += $value['pivot']['total_reach'];
                    }
                } elseif (!empty($technology) and empty($techtype) and !empty($year)) { // T !TT Y
                    if (in_array($value['name'], self::convertToTitleCase($technology)) and in_array($value['pivot']['year'], self::convertToTitleCase($year))) {
                        $project['total_reach'] += $value['pivot']['total_reach'];
                    }
                } elseif (empty($technology) and !empty($techtype) and empty($year)) { // !T TT !Y
                    if (in_array($value->technology_type->name, self::convertToTitleCase($techtype))) {
                        $project['total_reach'] += $value['pivot']['total_reach'];
                    }
                }
            }
            return $project['total_reach'];
        }, $projects);

        return array_sum($projects->toArray());
    }

    protected static function distributed()
    {
        $projects   = Project::with(['technologies'])->filter(request())->get();
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];
        $year       = request('years') ?? [];

        $projects = $projects->map(function ($project) use ($technology, $techtype, $year) {
            $project['distribution_unit'] = 0;
            foreach ($project['technologies'] as $value) {
                if (!empty($technology) and !empty($techtype) and !empty($year)) { // T TT Y
                    if (in_array($value['name'], self::convertToTitleCase($technology)) and in_array($value->technology_type->name, self::convertToTitleCase($techtype)) and in_array($value['pivot']['year'], self::convertToTitleCase($year))) {
                        $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                    }
                } elseif (empty($technology) and empty($techtype) and empty($year)) { // !T !TT !Y
                    $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                } elseif (empty($technology) and !empty($techtype) and !empty($year)) { // !T TT Y
                    if (in_array($value->technology_type->name, self::convertToTitleCase($techtype)) and in_array($value['pivot']['year'], self::convertToTitleCase($year))) {
                        $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                    }
                } elseif (!empty($technology) and empty($techtype) and empty($year)) { // T !TT !Y
                    if (in_array($value['name'], self::convertToTitleCase($technology))) {
                        $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                    }
                } elseif (empty($technology) and empty($techtype) and !empty($year)) { // !T !TT Y

                    if (in_array($value['pivot']['year'], self::convertToTitleCase($year))) {
                        $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                    }
                } elseif (!empty($technology) and !empty($techtype) and empty($year)) { // T TT !Y
                    if (in_array($value['name'], self::convertToTitleCase($technology)) and in_array($value->technology_type->name, self::convertToTitleCase($techtype))) {
                        $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                    }
                } elseif (!empty($technology) and empty($techtype) and !empty($year)) { // T !TT Y
                    if (in_array($value['name'], self::convertToTitleCase($technology)) and in_array($value['pivot']['year'], self::convertToTitleCase($year))) {
                        $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                    }
                } elseif (empty($technology) and !empty($techtype) and empty($year)) { // !T TT !Y
                    if (in_array($value->technology_type->name, self::convertToTitleCase($techtype))) {
                        $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                    }
                }
            }
            return $project['distribution_unit'];
        }, $projects);

        return array_sum($projects->toArray());
    }

    protected static function convertToTitleCase($array, $request = null)
    {
        if (is_array($array)) {
            $array = array_map(function ($val) {
                $val =  title_case(str_replace('-', ' ', $val));
                return $val;
            }, $array);

            return $array;
        }

        return false;
    }
}
