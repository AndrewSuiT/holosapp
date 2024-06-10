<?php

namespace App\Livewire\cie10;

use App\Models\cie10hai;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Cie10Controller extends Component
{
    use WithPagination;

    public $tituloPagina;
    public $search,$cie10s;
    public $search1;

    function mount() : void {
        $this->tituloPagina = 'CIE-10';
        $this->search = '';
        $this->search1 = '';
        $this->reseteaDatos();
    }
    function reseteaDatos() : void {
        $this->cie10s = new cie10hai();
        //variable      modelo
    }

    #[Layout('layouts.guest')] 
    public function render()
    {        
        //variable del foreach  = modelo
        $query = cie10hai::query();
        $cie10x = $query->where('CIE10_X', 'like', '%'.$this->search1.'%')
                            ->orderBy('id')
                            ->paginate(20);
        $cie10x = $query->where('descripcion_CIE', 'like', '%'.$this->search.'%')
                            ->orderBy('id')
                            ->paginate(20);
        return view('livewire.cie10.cie10', compact('cie10x'));
        // carpeta. carpeta de la vista. vista                 nombre de la variable
    }
}