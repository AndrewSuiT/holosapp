<?php

namespace App\Livewire;

use App\Models\libroemergencia as libroemergencia;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


use function Laravel\Prompts\select;

class libroemergenciaController extends Component
{
    use WithPagination;
    public $librodeemergencia;
    public $emergencia;
    public $tituloModal;
    public $search;
    public $idFICHAFAM;
    public $FECHASELECT;

    function mount() : void {
        $this->librodeemergencia = 'Hospital Registro de Emergencia';
        $this->search = '';
        $this->FECHASELECT = '';
        $this->idFICHAFAM = libroemergencia::orderBy('FICHAFAM', 'asc')->pluck('FICHAFAM')->unique();
        $this->reseteaDatos();
    }

    function reseteaDatos() : void {
        $this->emergencia = new libroemergencia();
    }

    function inicializaDatos($id = "") : void {
        if(empty($id)){
            $this->tituloModal = "Registrar";
            $this->reseteaDatos();
        }else{
            $this->tituloModal = "Editar";
            $this->emergencia = libroemergencia::find($id);
        }
    }
    function rules() : array {
        return [
            'emergencia.DNI' => 'required',
            'emergencia.FICHAFAM' => 'required',
            'emergencia.NHCL' => 'required',
            'emergencia.CODSIS' => 'required',
            'emergencia.PLAN' => 'nullable',
            'emergencia.SERV' => 'nullable',
            'emergencia.EMERGENCIA' => 'nullable',
            'emergencia.APELLIDOSYNOMBRES' => 'required',
            'emergencia.NCR' => 'nullable',
            'emergencia.EDAD' => 'required',
            'emergencia.SEXO' => 'required',
            'emergencia.DIRECCIÓN' => 'required',
            'emergencia.DIAGNOSTICO' => 'required',
            'emergencia.PDR' => 'required',
            'emergencia.TRATAMIENTO' => 'required',
            'emergencia.INYECT' => 'required',
            'emergencia.CURAC' => 'required',
            'emergencia.RESPONSABLE' => 'required',
            'emergencia.OBSERV' => 'nullable'
        ];
    }
    function validationAttributes() : array {
        return [
            'emergencia.FICHAFAM' => 'fichafamid',
        ];
    }
    function muestraModal($id = "") : void {
        $this->inicializaDatos($id);
        $this->resetValidation();
        $this->dispatch('openModal');
    }
    function cierraModal(){
        $this->dispatch('closeModal');
    }

    function guardar() : void {
        $this->validate();
        DB::beginTransaction();

        try {
            if(!is_null($this->emergencia->id) && $this->emergencia->id != ""){
                $message = "Actualizado con exito";
            }else{
                $message = "Registrado con exito";
            }
            $this->emergencia->save();

            $resp["type"] = 'success';
            $resp["message"] = $message;

            DB::commit();
            
            $this->cierraModal();
        } catch (\Exception $e) {
            DB::rollback();
            $resp["type"] = 'error';
            $resp["message"] = 'No se pudo guardar los datos'. $e->getMessage();
        }
        $this->dispatch('alert', $resp);
    }
    function eliminar($id){
        DB::beginTransaction();

        try {
            $emergencia = libroemergencia::find($id);

            if(is_null($emergencia)){
                $resp["type"] = 'error';
                $resp["message"] = 'No encontrado';
            }else{
                $emergencia->delete();
                $resp["type"] = 'success';
                $resp["message"] = 'Eliminado con exito';
            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            $resp["type"] = 'error';
            $resp["message"] = 'No se pudo eliminar'. $e->getMessage();
        }
        $this->dispatch('alert', $resp);        
    }

    #[Layout('layouts.guest')] 
    public function render()
    {
        $libroemergencia = libroemergencia::where('DNI', 'like', '%'.$this->search.'%')

                            ->orderBy('id')
                            ->paginate(15);
        return view('livewire.libroemergencia.libro', compact('libroemergencia'));
    }
}
