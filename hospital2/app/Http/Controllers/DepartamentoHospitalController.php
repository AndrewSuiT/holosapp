<?php

namespace App\Http\Controllers;

use App\Models\DepartamentoHospital;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class DepartamentoHospitalController extends Controller
{
    public function listado(): LengthAwarePaginator {
        $areas = DepartamentoHospital::orderBy('descripcion')->paginate(10);
        return $areas;
    }
    public function getById($id): DepartamentoHospital {
        return DepartamentoHospital::find($id);
    }
    public function guardar(DepartamentoHospital $departamento){
        $reglas = [
            'descripcion' => 'required'
        ];
        $validado = Validator::make($departamento->toArray(), $reglas);

        if($validado->fails()){
            return $validado->errors();
        }

        return $departamento->save();
    }
}
