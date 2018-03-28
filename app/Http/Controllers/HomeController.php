<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\ProjectType;
use App\Models\PriceType;
use App\Models\Officer;

class HomeController extends Controller
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

        $getYear         = $request->get('year');
        $getProjectType  = $request->get('project_type');
        $getCountry      = $request->get('country');
        $getOfficer      = $request->get('officer');
        $getPriceType    = $request->get('price_type');
        $getTechnology   = $request->get('technology');
        $search = '';

        $projects = Project::where('project_name', 'like', '%'.$search.'%');

        if ($request->has('year')) {
            $projects->where('year', $getYear);
        }

        if ($request->has('project_type')) {
            $getProjectType = str_replace('-', ' ', $getProjectType);
            $projects->where('project_type', title_case($getProjectType));
        }

        if ($request->has('country')) {
            $projects = $projects->where('country', $getCountry);
        }

        if ($request->has('officer')) {
            $getOfficer = str_replace('-', ' ', $getOfficer);
            $projects->where('officer', title_case($getOfficer));
        }

        if ($request->has('price_type')) {
            $projects->where('price_type', $getPriceType);
        }

        if ($request->has('technology')) {
            $getTechnology = str_replace('-', ' ', $getTechnology);
            // return title_case($getTechnology);
            $projects->whereHas('technologies', function ($query) use ($getTechnology) {
                $query->where('name', title_case($getTechnology));
            });
        }

         $filteredID = $projects->pluck('id');

         if ($filteredID != null) {
              $country      = DB::table('projects')->whereIn('id',$filteredID)->distinct()->count('country');
              $total_reach  = DB::table('project_technology')->whereIn('project_id',$filteredID)->sum('total_reach');
              $distributed  = DB::table('project_technology')->whereIn('project_id',$filteredID)->sum('distribution_unit');
         } else {
               $country      = DB::table('projects')->distinct()->count('country');
               $total_reach  = DB::table('project_technology')->sum('total_reach');
               $distributed  = DB::table('project_technology')->sum('distribution_unit');
         }

        $projects = $projects->paginate(15);

        return view('home')->with(compact('country', 'total_reach', 'distributed', 'projects', 'yearList', 'projectTypeList', 'countryList', 'officerList', 'priceTypeList', 'technologyList', 'getYear', 'getProjectType', 'getCountry', 'getOfficer', 'getPriceType', 'getTechnology'));
    }
}
