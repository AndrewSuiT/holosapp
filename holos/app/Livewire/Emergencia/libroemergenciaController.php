<?php

namespace App\Livewire\Emergencia;

use App\Models\cie10hai;
use App\Models\libroemergencia as libroemergencia;
use App\Models\personalcs;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class libroemergenciaController extends Component
{
    use WithPagination;
    public $librodeemergencia;
    public $emergencia;
    public $tituloModal;
    public $search, $search2, $search3;
    public $FECHASELECT;
    public $startDate;
    public $endDate;
    public $cie_10;
    public $personal_ai;
    public $mensajeError = '';
    public $mensajeError2 = '';


    function mount() : void {
        $this->librodeemergencia = 'Hospital Registro de Emergencia';
        $this->search = '';
        $this->search2 = '';
        $this->search3 = '';
        $this->FECHASELECT = '';  
        $this->cie_10 = Cie10Hai::select(DB::raw("CONCAT(CIE10_X, ' - ', descripcion_CIE) AS codigo_descripcion"), 'CIE10_X')
            ->orderBy('CIE10_X', 'asc')
            ->pluck('codigo_descripcion', 'CIE10_X');
        $this->personal_ai = personalcs::select(DB::raw("CONCAT(APELLIDOSCOMPLETOS, ', ', NOMBRESCOMPLETOS) AS codigo_personal"), 'APELLIDOSCOMPLETOS')
            ->orderBy('APELLIDOSCOMPLETOS', 'asc')
            ->pluck('codigo_personal', 'APELLIDOSCOMPLETOS');
        $this->reseteaDatos();
    }

    function reseteaDatos() : void {
        $this->emergencia = new libroemergencia();
        $this->emergencia->EMERGENCIA2 = false;
        
    }

    function inicializaDatos($id = "") : void {
        if(empty($id)){
            $this->tituloModal = "Registrar";
            $this->reseteaDatos();
            $this->emergencia->FICHAFAM = now()->format('Y-m-d H:i');
        }else{
            $this->tituloModal = "Editar";
            $this->reseteaDatos();
            $this->emergencia = libroemergencia::find($id);
            $this->emergencia->EMERGENCIA2 = $this->emergencia->EMERGENCIA2 === 'SI';
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
            'emergencia.EMERGENCIA2' => 'nullable',
            'emergencia.APELLIDOSYNOMBRES' => 'required',
            'emergencia.NCR' => 'nullable',
            'emergencia.EDAD' => 'required',
            'emergencia.SEXO' => 'required',
            'emergencia.DIRECCIÓN' => 'required',
            'emergencia.diagnosticoId' => [
                'nullable',             
                function ($attribute, $value, $fail) {
                    $found = $this->cie_10->contains($value);
                    if (!$found) {
                        $this->mensajeError = 'El diagnóstico seleccionado no es válido.';
                        $fail('El diagnóstico seleccionado no es válido.');
                    }
                },
            ],
            'emergencia.PDR' => 'required',
            'emergencia.TRATAMIENTO' => 'nullable',
            'emergencia.INYECT' => 'nullable',
            'emergencia.CURAC' => 'nullable',
            'emergencia.RESPONSABLE' => [
                'nullable',               
                function ($attribute, $value, $fail) {
                    $found = $this->personal_ai->contains($value);
                    if (!$found) {
                        $this->mensajeError2 = 'El responsable seleccionado no es válido.';
                        $fail('El responsable seleccionado no es válido.');
                    }
                },
            ],
            'emergencia.RESPONSABLE_MED' => [
                'nullable',               
                function ($attribute, $value, $fail) {
                    $found = $this->personal_ai->contains($value);
                    if (!$found) {
                        $this->mensajeError2 = 'El responsable seleccionado no es válido.';
                        $fail('El responsable seleccionado no es válido.');
                    }
                },
            ],
            'emergencia.OBSERV' => 'nullable'
        ];
    }


    function muestraModal($id = "") : void {
        $this->inicializaDatos($id);
        $this->resetValidation();
        $this->dispatch('openModal');
    }
    function cierraModal(){
        $this->mensajeError = '';
        $this->mensajeError2 = '';
        $this->dispatch('closeModal');
    }

    function guardar() : void {
        $this->mensajeError = '';
        $this->mensajeError2 = '';
        $this->validate();
        DB::beginTransaction();

        try {
            $existingRecord = libroemergencia::find($this->emergencia->id);
            $this->emergencia->EMERGENCIA2 = $this->emergencia->EMERGENCIA2 ? 'SI' : 'NO';

            if(!is_null($this->emergencia->id) && $this->emergencia->id != ""){
                $existingRecord->update($this->emergencia->toArray());
                $this->emergencia->save();
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
                libroemergencia::where('id', '>', $id)->update(['id' => DB::raw('id - 1')]);
                $resp["type"] = 'success';
                $resp["message"] = 'Eliminado con exito';
                $this->emergencia = libroemergencia::find($id);
            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            $resp["type"] = 'error';
            $resp["message"] = 'No se pudo eliminar'. $e->getMessage();
        }
        $this->dispatch('alert', $resp);        
    }
    function descargarXls() {
        
    }

    #[Layout('layouts.app2')] 
    public function render()
    {
        // funcion de filtro de rango de fechas
        $query = libroemergencia::query();

        if ($this->startDate && $this->endDate) {
        $query->whereBetween('FICHAFAM', [$this->startDate, $this->endDate]);
        }

        $libroemergencia = $query->where('DNI', 'like', '%' . $this->search . '%')
            ->orderBy('id')
            ->paginate(15);

        $libroemergencia = $query->where('RESPONSABLE', 'like', '%' . $this->search2 . '%')
            ->orderBy('id')
            ->paginate(15);
        $libroemergencia = $query->where('RESPONSABLE_MED', 'like', '%' . $this->search3 . '%')
            ->orderBy('id')
            ->paginate(15);
        return view('livewire.libroemergencia.libro', compact('libroemergencia'));
    }
}
