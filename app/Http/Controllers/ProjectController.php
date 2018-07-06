<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\ProjectTechnology;
use App\Models\TechnologyType;
use App\Models\Project;
use App\Rules\Titlecase;

class ProjectController extends Controller
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
        $projects = Project::with(['technologies'])->filter($request)->orderBy('year', 'desc')->paginate(15);
        // return TechnologyType::select('name')->orderBy('name', 'asc')->distinct()->get();
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
    public function store(Request $request)
    {
        $this->validate($request, [
          'project_name' => ['required','unique:projects,project_name', new Titlecase],
          'start_date'   => 'required|date_format:Y-m-d',
          'year'         => 'required|integer',
          'country'      => ['required','string', new Titlecase],
          'price_type'   => 'required|exists:price_types,name',
          'project_type' => 'required|exists:project_types,name',
          'officer'      => 'required|exists:officers,name',
        ]);

        $project = Project::create($request->all());

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
        $technology = $project->technologies()->get();

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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'project_name' => ['required', Rule::unique('projects')->ignore($request->project_name, 'project_name'), new Titlecase],
          'start_date'   => 'required|date_format:Y-m-d',
          'year'         => 'required|integer',
          'country'      => ['required','string', new Titlecase],
          'price_type'   => 'required|exists:price_types,name',
          'project_type' => 'required|exists:project_types,name',
          'officer'      => 'required|exists:officers,name',
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

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
        ProjectTechnology::where('project_id', $id)->delete();
        Project::find($id)->delete();

        return redirect()->route('impact-tracker.index');
    }
}
