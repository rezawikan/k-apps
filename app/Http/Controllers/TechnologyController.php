<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\TechnologyType;
use App\Http\Requests\TechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $technologies = Technology::latest()->paginate(15);

        if ($request->only('q')) {
            $technologies = Technology::where('name','LIKE', '%'.$request->q.'%')->latest()->paginate(15);
        }

        return view('manage.technology.index')->with(compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $techtype = TechnologyType::select('id','name')->orderBy('name', 'asc')->get();
        return view('manage.technology.create')->with(compact('techtype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyRequest $request)
    {
        // dd($request->all());
        $technologies = Technology::create($request->all());

        return redirect()->route('technology.index');
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
    public function edit($id)
    {
        $techtype = TechnologyType::select('name','id')->orderBy('name', 'asc')->get()->toArray();
        $data = Technology::find($id);
        return view('manage.technology.edit')->with(compact('data','techtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TechnologyRequest $request, $id)
    {
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
        $delete = Technology::find($id)->delete();

        return redirect()->route('technology.index');
    }
}
