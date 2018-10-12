<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProjectExport implements FromView
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
        return view('exports.projects', [
            'projects' => Project::with(['technologies'])->filter($this->request)->orderBy('start_date', 'desc')->get()
        ]);
    }
}
