<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class TechnologyExport implements FromView
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $project_type = $this->request->project_type;
        $start_date = $this->request->start_date;
        $country = $this->request->country;
        $officer = $this->request->officer;
        $price_type  = $this->request->price_type;
        $technology = $this->request->technology;
        $technology_type = $this->request->techtype;
        $year = $this->request->years;
        $search = $this->request->search;


        $compile = DB::table('project_technology')
        ->select('projects.project_name', 'project_types.name AS ptn','technologies.name AS tn', 'distribution_targets.name AS dt', 'project_technology.per_unit', 'project_technology.distribution_unit', 'project_technology.total_reach', 'project_technology.year','countries.name AS cn','technology_types.name AS tyn','projects.officer AS po','price_types.name AS pricetype')
        ->join('projects', 'projects.id', '=', 'project_technology.project_id')
        ->join('technologies', 'technologies.id', '=', 'project_technology.technology_id')
        ->join('distribution_targets', 'distribution_targets.id', '=', 'project_technology.distribution_target_id')
        ->join('project_types', 'projects.project_type_id', '=', 'project_types.id')
        ->join('technology_types', 'technologies.technology_type_id', '=', 'technology_types.id')
        ->join('price_types', 'projects.price_type_id', '=', 'price_types.id')
        ->join('countries', 'country_id', '=', 'countries.id')
        ->when($start_date, function ($query, $start_date) {
            return $query->whereIn('projects.start_date', $start_date);
        })
        ->when($project_type, function ($query, $project_type) {
            return $query->whereIn('project_types.slug', $project_type);
        })
        ->when($country, function ($query, $country) {
            return $query->whereIn('countries.code', $country);
        })
        ->when($officer, function ($query, $officer) {
            $officer = title_case(str_replace('-', ' ', $officer));
            return $query->where('projects.officer', $officer);
        })
        ->when($price_type, function ($query, $price_type) {
            return $query->whereIn('price_types.slug', $price_type);
        })
        ->when($technology, function ($query, $technology) {
            return $query->whereIn('technologies.slug', $technology);
        })
        ->when($technology_type, function ($query, $technology_type) {
            return $query->whereIn('technology_types.slug', $technology_type);
        })
        ->when($year, function ($query, $year) {
            return $query->whereIn('project_technology.year', $year);
        })
        ->when($search, function ($query, $search) {
            return $query->where('projects.project_name', 'like', '%'.$search.'%');
        })
        ->orderBy('projects.start_date', 'desc')
        ->get();

        return view('exports.technology', [
          'technologies' => $compile
      ]);
    }
}
