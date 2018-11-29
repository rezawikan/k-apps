<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Http\Resources\Api\TechnologyListResource;

class TechnologyListsController extends Controller
{
    public function list()
    {
      return $technology = TechnologyListResource::collection(Technology::all());
    }
}
