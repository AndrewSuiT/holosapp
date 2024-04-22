<?php

namespace App\Http\Controllers;

use App\Models\libroemergencia;
use Illuminate\Http\Request;

class libroemergenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libroemergencia = libroemergencia::all();
        return view('libroemergencia.index', compact('libroemergencia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libroemergencia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'DNI'=> 'required|integer|min:1',
            'FICHAFAM' => 'required|date',
            'NHCL' => 'required|string|min:1|max:100',
            'CODSIS' => 'required|string|min:1|max:100',
            'PLAN' => 'required|string|min:1|max:100',
            'SERV' => 'required|string|min:1|max:100',
            'EMERGENCIA' => 'required|string|min:1|max:100',
            'APELLIDOSYNOMBRES' => 'required|string|min:1|max:100',
            'NCR' => 'required|string|min:1|max:100',
            'EDAD' => 'required|integer|min:1',
            'SEXO' => 'required|string|min:1|max:100',
            'DIRECCIÓN' => 'required|string|min:1|max:100',
            'DIAGNOSTICO' => 'required|string|min:1|max:100',
            'PDR' => 'required|string|min:1|max:100',
            'TRATAMIENTO' => 'required|string|min:1|max:100',
            'INYECT' => 'required|string|min:1|max:100',
            'CURAC' => 'required|string|min:1|max:100',
            'RESPONSABLE' => 'required|string|min:1|max:100',
            'OBSERV' => 'required|string|min:1|max:100'

        ]);
        libroemergencia::create($request->all());

        return redirect()->route('libroemergencias.index');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
