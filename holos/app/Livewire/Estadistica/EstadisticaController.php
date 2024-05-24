<?php

namespace App\Livewire\Estadistica;

use App\Models\estadistica;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EstadisticaController extends Component
{
    public $tituloPagina;

    public function mount(): void{
        $this->tituloPagina = "REPORTE";
    }

    public function render()
    {        
        return view('livewire.estadistica.reporte');
    }
}