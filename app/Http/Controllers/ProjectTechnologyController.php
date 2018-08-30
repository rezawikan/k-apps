<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectTechnology;
use Illuminate\Support\Facades\Cache;

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
    public function store(Request $request, $id)
    {
        $this->validate($request, [
          'project_id'          => 'required|exists:projects,id',
          'technology_id'       => 'required|exists:technologies,id',
          'distribution_target' => 'required|string',
          'distribution_unit'   => 'required|integer',
          'per_unit'            => 'required|integer',
          'total_reach'         => 'required|integer',
          'year'                => 'required|integer'
        ]);

        ProjectTechnology::create($request->all());

        Cache::flush();

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
    public function edit($id, $idTech)
    {
        $project    = Project::findOrFail($id);
        $technology = ProjectTechnology::findOrFail($idTech);

        return view('impact-tracker.additionals.edit')->with(compact('project', 'technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idTech)
    {
        $this->validate($request, [
          'project_id'          => 'required|exists:projects,id',
          'technology_id'       => 'required|exists:technologies,id',
          'distribution_target' => 'required|string',
          'distribution_unit'   => 'required|integer',
          'per_unit'            => 'required|integer',
          'total_reach'         => 'required|integer',
          'year'                => 'required|integer'
        ]);

        $technology = ProjectTechnology::findOrFail($idTech);
        $technology->update($request->all());

        Cache::flush();

        return redirect()->route('impact-tracker.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idTech)
    {
        $project = ProjectTechnology::find($idTech)->delete();

        Cache::flush();

        return redirect()->route('impact-tracker.show', ['id' => $id]);
    }
}
