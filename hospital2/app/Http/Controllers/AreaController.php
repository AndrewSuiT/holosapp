<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function listado(): array {
        $areas = Area::orderBy('descripcion')->get()->toArray();
        return $areas;
    }
}
