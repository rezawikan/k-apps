<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectTechnologyRequest;

class ProjectTechnologyController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $project = Project::find($id);
        return view('impact-tracker.additionals.create')->with(compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectTechnologyRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->technologies()->attach([
          $request->technology_id => $request->only([
            'distribution_target_id',
            'per_unit',
            'distribution_unit',
            'total_reach',
            'year'
          ])
        ]);

        return redirect()->route('impact-tracker.show', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $pivotID)
    {
        $project    = Project::findOrFail($id);
        $technology = $project->technologies()->wherePivot('id', $pivotID)->first();

        return view('impact-tracker.additionals.edit')->with(compact('project', 'technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectTechnologyRequest $request, $id, $pivotID)
    {
        $project  = Project::findOrFail($id);
        $project->technologies()->updateExistingPivot($pivotID, $request->only([
            'technology_id',
            'distribution_target_id',
            'per_unit',
            'distribution_unit',
            'total_reach',
            'year'
          ])
        );

        return redirect()->route('impact-tracker.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $pivotID)
    {
        $project  = Project::findOrFail($id);
        $project->technologies()->wherePivot('id', $pivotID)->delete();

        return redirect()->route('impact-tracker.show', ['id' => $id]);
    }
}
