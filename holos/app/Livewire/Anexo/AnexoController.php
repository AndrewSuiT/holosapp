<?php

namespace App\Livewire\Anexo;

use App\Models\anexo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class AnexoController extends Component
{
    use WithPagination;

    public $tituloPagina;
    public $search,$anexos2;
    public $search1;

    function mount() : void {
        $this->tituloPagina = 'ANEXOS';
        $this->search = '';
        $this->search1 = '';
        $this->reseteaDatos();
    }
    function reseteaDatos() : void {
        $this->anexos2 = new anexo();
        //variable      modelo
    }

    #[Layout('layouts.guest')] 
    public function render()
    {        
        //variable del foreach  = modelo
        $query = anexo::query();
        $anexos = $query->where('nroAnexo', 'like', '%'.$this->search1.'%')
                            ->orderBy('id')
                            ->paginate(10);
        $anexos = $query->where('descAnexo', 'like', '%'.$this->search.'%')
                            ->orderBy('id')
                            ->paginate(10);
        return view('livewire.anexo.anexo', compact('anexos'));
        // carpeta. carpeta de la vista. vista                 nombre de la variable
    }
}