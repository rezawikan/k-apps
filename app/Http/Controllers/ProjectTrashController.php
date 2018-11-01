<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectTrashController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::onlyTrashed()->with(['technologies'])->paginate(15);

        return view('project-trash.index')->with(compact('projects'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::withTrashed()->find($id);
        if ($project->trashed()) {
            $project->forceDelete();
            return redirect()->route('project-trash.index');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $project = Project::withTrashed()->find($id);
        if ($project->trashed()) {
            $project->restore();
            return redirect()->route('project-trash.index');
        }
    }
}
