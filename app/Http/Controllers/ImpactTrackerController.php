<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\ProjectType;
use App\Models\PriceType;
use App\Models\Officer;

class ImpactTrackerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $yearList           = Project::distinct()->orderBy('year', 'desc')->get(['year']);
        $projectTypeList    = ProjectType::select('name')->orderBy('name', 'asc')->get();
        $countryList        = Project::distinct()->orderBy('country', 'asc')->get(['country']);
        $officerList        = Officer::distinct()->orderBy('name', 'asc')->get(['name']);
        $priceTypeList      = PriceType::select('name')->orderBy('name', 'asc')->get();
        $technologyList     = Technology::select('name')->orderBy('name', 'asc')->get();
        $technologyType     = Technology::select('type')->orderBy('type', 'asc')->distinct()->get();


        $getYear         = $request->get('year');
        $getProjectType  = $request->get('project_type');
        $getCountry      = $request->get('country');
        $getOfficer      = $request->get('officer');
        $getPriceType    = $request->get('price_type');
        $getTechnology   = $request->get('technology');
        $getTypeTech     = $request->get('typetech');
        $search          = $request->get('search');


        $projects = Project::where('project_name', 'like', '%'.$search.'%')->orderBy('year','desc');

        if ($request->has('year')) {
            $projects->whereIn('year', $getYear);
        }

        if ($request->has('project_type')) {
            $getProjectType = array_map(function($pt, $index){
              $pt = title_case(str_replace('-', ' ', $pt));
              return $pt;
            }, $getProjectType, array_keys($getProjectType));

            $projects->whereIn('project_type', $getProjectType);
        }

        // dd($getProjectType);

        if ($request->has('country')) {
            $projects = $projects->whereIn('country', $getCountry);
        }

        if ($request->has('officer')) {
            $getOfficer = str_replace('-', ' ', $getOfficer);
            $projects->where('officer', title_case($getOfficer));
        }

        if ($request->has('price_type')) {
            $getPriceType = str_replace('-', ' ', $getPriceType);
            $getPriceType = array_map(function($pt, $index){
              $pt = title_case($pt);
              return $pt;
            }, $getPriceType, array_keys($getPriceType));

            $projects->whereIn('price_type', $getPriceType);
        }

        if ($request->has('technology') or $request->has('typetech')) {

            $getTechnology = str_replace('-', ' ', $getTechnology) ?? null;
            $getTypeTech   = str_replace('-', ' ', $getTypeTech) ?? null;

            // dd($getTechnology);

            if ($getTechnology != null) {
              $getTechnology = array_map(function($gt, $index){
                $gt = title_case($gt);
                return $gt;
              }, $getTechnology, array_keys($getTechnology));
            }

            if ($getTypeTech != null) {
              $getTypeTech = array_map(function($tt, $index){
                $tt = title_case($tt);
                return $tt;
              }, $getTypeTech, array_keys($getTypeTech));
            }

            if ($getTechnology != "" && $getTypeTech == "") {
              $projects->whereHas('technologies', function ($query) use ($getTechnology) {
                  $query->whereIn('name', $getTechnology);
              });
            }


            if ($getTypeTech != "" && $getTechnology == "") {
              $projects->whereHas('technologies', function ($query) use ($getTypeTech) {
                  $query->whereIn('type', $getTypeTech);
              });
            }

            if ($getTypeTech != "" && $getTechnology != "") {
              $projects->whereHas('technologies', function ($query) use ($getTypeTech, $getTechnology) {
                  $query->whereIn('type', $getTypeTech)->whereIn('name', $getTechnology);
              });
            }
        }




         $filteredID = $projects->pluck('id');
         $type       = Technology::whereIn('type', [$getTypeTech])->pluck('id');

         if ($filteredID != null) {
              $country      = DB::table('projects')->whereIn('id',$filteredID)->distinct()->count('country');
              $total_reach  = DB::table('project_technology')
                              ->whereIn('project_id',$filteredID)
                              ->when($getTypeTech,  function ($query) use ($type){
                                $query->whereIn('technology_id', $type);
                              },function ($query) {
                                    return $query;
                                })->sum('total_reach');

              $distributed  = DB::table('project_technology')
                              ->whereIn('project_id',$filteredID)
                              ->when($getTypeTech,  function ($query) use ($type){
                                  $query->whereIn('technology_id', $type);
                                },function ($query) {
                                      return $query;
                                  })->sum('distribution_unit');
         } else {
               $country      = DB::table('projects')->distinct()->count('country');
               $total_reach  = DB::table('project_technology')->sum('total_reach');
               $distributed  = DB::table('project_technology')->sum('distribution_unit');
         }

        $projects = $projects->paginate(15);

        return view('impact-tracker.index')->with(compact('country', 'total_reach', 'distributed', 'projects', 'yearList', 'projectTypeList', 'countryList', 'officerList', 'priceTypeList', 'technologyList','technologyType','getYear', 'getProjectType', 'getCountry', 'getOfficer', 'getPriceType', 'getTechnology','search','getTypeTech'));
    }
}
