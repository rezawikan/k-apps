<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DistributionTarget;
use App\Http\Resources\Api\DistributionTargetResource;

class DistributionTargetController extends Controller
{
    public function list()
    {
        return $technology = DistributionTargetResource::collection(DistributionTarget::all());
    }
}
