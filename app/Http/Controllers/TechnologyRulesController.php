<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechnologyType;
use App\Models\TechnologyRule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TechnologyRulesRequest;
use App\Http\Requests\TechnologyRulesEditRequest;

class TechnologyRulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = TechnologyRule::latest()->paginate(15);
        if ($request->only('q')) {
            $results = TechnologyRule::where('name', 'LIKE', '%'.$request->q.'%')->latest()->paginate(15);
        }

        return view('manage.technology-rules.index')->with(compact('results'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.technology-rules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyRulesRequest $request)
    {
        $technology_type = TechnologyRule::create($request->all());

        return redirect()->route('technology-rules.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TechnologyRule::where('id', $id)->first();
        return view('manage.technology-rules.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TechnologyRulesEditRequest $request, $id)
    {
        $data = TechnologyRule::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('technology-rules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TechnologyRule::find($id)->delete();

        return redirect()->route('technology-rules.index');
    }
}
