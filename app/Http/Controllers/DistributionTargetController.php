<?php

namespace App\Http\Controllers;

use App\Models\DistributionTarget;
use App\Http\Requests\DistributionTargetRequest;

class DistributionTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributions = DistributionTarget::latest()->paginate(15);

        return view('manage.distribution-target.index')->with(compact('distributions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.distribution-target.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistributionTargetRequest $request)
    {
        $distribution = DistributionTarget::create($request->all());

        return redirect()->route('distribution-target.index');
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
        $data = DistributionTarget::find($id);
        return view('manage.distribution-target.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DistributionTargetRequest $request, $id)
    {
        $data = DistributionTarget::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('distribution-target.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DistributionTarget::find($id)->delete();

        return redirect()->route('distribution-target.index');
    }
}
