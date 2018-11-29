<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechnologyType;
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
        $datas = TechnologyType::with('distribution_targets')->whereHas('distribution_targets')->get()->toArray();
        $results = [];
        foreach ($datas as $values) {
            foreach ($values['distribution_targets'] as $key => $value) {
                $results[] = [
                'id' => $value['pivot']['id'],
                'type' => $values['name'],
                'target' => $value['name'],
                'multiplier' => $value['pivot']['multiplier'],
              ];
            }
        }
        // dd($results);
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
        $technology_type = TechnologyType::find($request->technology_type_id);
        $technology_type->distribution_targets()->attach($request->distribution_target_id, ['multiplier' => $request->multiplier]);

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
        $data = DB::table('technology_rules')->where('id', $id)->first();
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
        dd($request->all());
        $data = Technology::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('technology.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('technology_rules')->delete($id);

        return redirect()->route('technology-rules.index');
    }
}
