<?php

namespace App\Livewire;

use App\Models\cie10hai;
use App\Models\libroemergencia as libroemergencia;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class libroemergenciaController extends Component
{
    use WithPagination;
    public $librodeemergencia;
    public $emergencia;
    public $tituloModal;
    public $search;
    public $FECHASELECT;
    public $startDate;
    public $endDate;
    public $cie_10;
    public $diagnostico;
    public $filtrodiagnostico;
    public $busquedaDiagnostico;

    function mount() : void {
        $this->librodeemergencia = 'Hospital Registro de Emergencia';
        $this->search = '';
        $this->FECHASELECT = '';
        $this->cie_10 = select_values('cie10hais', 'CIE10_X', [], ['CIE10_X', 'asc']);
        $this->reseteaDatos();
    }

    function reseteaDatos() : void {
        $this->emergencia = new libroemergencia();
        $this->emergencia->EMERGENCIA = false;
        $this->diagnostico = new cie10hai();
    }

    function inicializaDatos($id = "") : void {
        if(empty($id)){
            $this->tituloModal = "Registrar";
            $this->reseteaDatos();
            $this->emergencia->FICHAFAM = now()->format('Y-m-d H:m');
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
            'emergencia.diagnosticoId' => 'nullable',
            'emergencia.PDR' => 'required',
            'emergencia.TRATAMIENTO' => 'nullable',
            'emergencia.INYECT' => 'nullable',
            'emergencia.CURAC' => 'nullable',
            'emergencia.RESPONSABLE' => 'required',
            'emergencia.OBSERV' => 'nullable'
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
            $existingRecord = libroemergencia::find($this->emergencia->id);
            $this->emergencia->EMERGENCIA = $this->emergencia->EMERGENCIA ? 'SI' : 'NO';

            if(!is_null($this->emergencia->id) && $this->emergencia->id != ""){
                $existingRecord->update($this->emergencia->toArray());
                $message = "Actualizado con exito";
            }else{
                $lastRecord = libroemergencia::latest()->first();
                $nextId = $lastRecord ? $lastRecord->id + 1 : 1;
                $this->emergencia->id = $nextId;
                $this->emergencia->save();
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
                libroemergencia::where('id', '>', $id)->decrement('id');
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

    public function buscarDiagnostico()
    {

    }

    #[Layout('layouts.guest')] 
    public function render()
    {
        // funcion de filtro de rango de fechas
        $query = libroemergencia::query();
        if ($this->startDate && $this->endDate) {
        $query->whereBetween('FICHAFAM', [$this->startDate, $this->endDate]);
        }
        $this->filtrodiagnostico = cie10hai::where('CIE10_X','like', '%'. $this->busquedaDiagnostico. '%')
            ->orWhere('descripcion_CIE', 'like', '%' . $this->busquedaDiagnostico. '%')
            ->get();

        $libroemergencia = $query->where('FICHAFAM', 'like', '%' . $this->search . '%')
            ->orderBy('id')
            ->paginate(15);

        return view('livewire.libroemergencia.libro', compact('libroemergencia'));
    }
}
