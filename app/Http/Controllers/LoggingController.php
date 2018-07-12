<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logging;

class LoggingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $logs = Logging::latest()->paginate(15);

        return view('logging.index')->with(compact('logs'));
    }
}
