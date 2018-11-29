<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\RolesTechnology;
use App\Http\Resources\Api\RolesTechnologyResource;

class RolesTechnologyController extends Controller
{
    public function index()
    {
      return RolesTechnologyResource::collection(RolesTechnology::all());
    }
}
