<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $logs = Log::latest()->paginate(15);

        return view('log.index')->with(compact('logs'));
    }

}
