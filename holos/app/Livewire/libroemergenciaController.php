<?php

namespace App\Livewire;
//namespace App\Http\Controllers;

use App\Models\libroemergencia;
//use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Layout;


class libroemergenciaController extends Component
{
    public $mensajes;

    public $isOpen = 0;
 
    public function create()
    {
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function store( $request)
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
    public function update($request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libroemergencia = libroemergencia::findOrFail($id);
        $libroemergencia->delete();
        return redirect()->route('libroemergencias.index');
    }

    #[Layout('layouts.guest')] 
    public function render()
    {
        $libroemergencia = libroemergencia::all();
        return view('livewire.libroemergencia.index', compact('libroemergencia'));
    }
}
