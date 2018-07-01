<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FundingType;
use App\Rules\Titlecase;
use Illuminate\Validation\Rule;

class FundingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funding_type = FundingType::get();

        return view('manage.funding-type.index')->with(compact('funding_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.funding-type.create');
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
        'name' => ['required','unique:funding_types,name', new Titlecase]
      ]);

        $project = FundingType::create($request->all());

        return redirect()->route('funding-type.index');
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
        $data = FundingType::find($id);
        return view('manage.funding-type.edit')->with(compact('data'));
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
        'name' => ['required', Rule::unique('funding_types')->ignore($request->name, 'name'), new Titlecase],
      ]);

        $data = FundingType::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('funding-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = FundingType::find($id)->delete();

        return redirect()->route('funding-type.index');
    }
}
