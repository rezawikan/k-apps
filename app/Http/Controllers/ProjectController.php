<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\TechnologyType;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Events\Log\Project\CreatedProject;
use App\Events\Log\Project\UpdatedProject;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Carbon;
use App\Exports\ProjectExport;
use App\Exports\TechnologyExport;

class ProjectController extends Controller
{

    private $excel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Excel $excel)
    {
        $this->middleware('auth');
        $this->excel = $excel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::with(['technologies'])->filter($request)->orderBy('start_date', 'desc')->paginate(15);

        return view('impact-tracker.index')->with(compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('impact-tracker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $date    = new Carbon($request->start_date);
        $project = Project::create(array_merge($request->except('funding_type_id'), ['year' => $date->format("Y")]));

        $project->funding_types()->sync($request->funding_type_id);

        return redirect()->route('impact-tracker.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project    = Project::find($id);
        $technology = $project->technologies()->orderByRaw('created_at DESC')->get();

        return view('impact-tracker.show')->with(compact('project', 'technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('impact-tracker.edit')->with(compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project    = Project::findOrFail($id);
        $date       = new Carbon($request->start_date);
        $project->update(array_merge($request->all(), ['year' => $date->format("Y")]));

        $project->funding_types()->sync($request->funding_type_id);

        return redirect()->route('impact-tracker.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if ($project->trashed()) {
            $project->forceDelete();
            return redirect()->route('impact-tracker.index');
        }

        $project->delete();

        return redirect()->route('impact-tracker.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export_project(Request $request)
    {
        return $this->excel->download(new ProjectExport($request), 'projects.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export_technology(Request $request)
    {
        return $this->excel->download(new TechnologyExport($request), 'technology.xlsx');
    }
}
