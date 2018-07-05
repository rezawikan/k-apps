<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DistributionTarget;
use Illuminate\Validation\Rule;

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
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => ['required','unique:distribution_targets,name']
      ]);

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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => ['required', Rule::unique('distribution_targets')->ignore($request->name, 'name')],
        ]);

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
