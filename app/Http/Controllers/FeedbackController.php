<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
      'name' => ['required','unique:funding_types,name']
    ]);

        $project = FundingType::create($request->all());

        return redirect()->route('funding-type.index');
    }
}
