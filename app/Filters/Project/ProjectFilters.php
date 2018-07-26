<?php

namespace App\Filters\Project;

use App\Models\Project;
use App\Models\Technology;
use App\Models\ProjectType;
use App\Models\PriceType;
use App\Models\User;
use App\Models\DistributionTarget;
use App\Models\TechnologyType;
use Illuminate\Support\Facades\Cache;
use App\Filters\FiltersAbstract;
use App\Filters\Project\Filter\YearFilter;
use App\Filters\Project\Filter\ProjectTypeFilter;
use App\Filters\Project\Filter\CountryFilter;
use App\Filters\Project\Filter\OfficerFilter;
use App\Filters\Project\Filter\PriceTypeFilter;
use App\Filters\Project\Filter\TechnologyFilter;
use App\Filters\Project\Filter\TechnologyTypeFilter;
use App\Filters\Project\Filter\SearchFilter;

class ProjectFilters extends FiltersAbstract
{
    protected $filters = [
      'year'         => YearFilter::class,
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
        // return Cache::remember('mappingsFilters', 100, function () {
            return $map = [
              'filters'     => [
                    'years'         => Project::distinct()->orderBy('year', 'desc')->get(['year']),
                    'project_type'  => ProjectType::select('name')->orderBy('name', 'asc')->get(),
                    'countries'     => Project::distinct()->orderBy('country', 'asc')->get(['country']),
                    'officer'       => Project::select('officer')->orderBy('officer', 'asc')->distinct()->get()->toArray(),
                    'users'         => User::select()->orderBy('first_name', 'asc')->get()->toArray(),
                    'technologies'  => Technology::select('name', 'id','slug')->orderBy('name', 'asc')->get(),
                    'techtype'      => TechnologyType::select('name')->orderBy('name', 'asc')->get(),
                    'pricetype'     => PriceType::select('name')->orderBy('name', 'asc')->get(),
                    'distributions' => DistributionTarget::select('name')->orderBy('name', 'asc')->get(),
              ]
            ];
        // });
    }

    public static function calculations()
    {
        $officer      = request('officer') ?? 'empty';
        $search       = request('search') ?? 'empty';
        $year         = implode(request('year') ?? ['empty']);
        $price_type   = implode(request('price_type') ?? ['empty']);
        $project_type = implode(request('project_type') ?? ['empty']);
        $country      = implode(request('country') ?? ['empty']);
        $technology   = implode(request('technology') ?? ['empty']);
        $techtype     = implode(request('techtype') ?? ['empty']);
        $page         = request('page') ?? 'empty';

        $values = md5(vsprintf('%s.%s.%s.%s.%s.%s.%s.%s.%s', [
            $officer,
            $search,
            $year,
            $price_type,
            $project_type,
            $country,
            $technology,
            $techtype,
            $page
          ]));

        return Cache::remember($values, 100, function () {
            return $calculations = [
              'country'     => Project::with(['technologies'])->filter(request())->distinct()->count('country'),
              'reached'     => self::reached(),
              'distributed' => self::distributed(),
            ];
        });
    }

    protected static function reached()
    {
        $projects   = Project::with(['technologies'])->filter(request())->get()->toArray();
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];

        $projects = array_map(function ($project) use ($technology, $techtype) {
            $project['total_reach'] = 0;
            foreach ($project['technologies'] as $value) {
                if (!empty($technology) or !empty($techtype)) {
                    if (in_array($value['name'], con($technology)) or in_array($value['type'], con($techtype))) {
                        $project['total_reach'] += $value['pivot']['total_reach'];
                    }
                } else {
                    $project['total_reach'] += $value['pivot']['total_reach'];
                }
            }
            return $project['total_reach'];
        }, $projects);

        return array_sum($projects);
    }

    protected static function distributed()
    {
        $projects   = Project::with(['technologies'])->filter(request())->get()->toArray();
        $technology = request('technology') ?? [];
        $techtype   = request('techtype') ?? [];

        $projects = array_map(function ($project) use ($technology, $techtype) {
            $project['distribution_unit'] = 0;
            foreach ($project['technologies'] as $value) {
                if (!empty($technology) or !empty($techtype)) {
                    if (in_array($value['name'], con($technology)) or in_array($value['type'], con($techtype))) {
                        $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                    }
                } else {
                    $project['distribution_unit'] += $value['pivot']['distribution_unit'];
                }
            }
            return $project['distribution_unit'];
        }, $projects);

        return array_sum($projects);
    }
}
