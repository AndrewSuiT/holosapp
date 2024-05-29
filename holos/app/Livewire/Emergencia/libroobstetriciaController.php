<?php

namespace App\Livewire\Emergencia;

use App\Models\libroobstetricia;
use App\Models\pacientes;
use App\Models\personalcs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class libroobstetriciaController extends Component
{
    use WithPagination;
    public $tituloObstetricia;
    public $obstetrico;
    public $tituloModal, $obstetrica;
    public $FECHASELECT, $startDate, $endDate;
    public $personal_ai, $mensajeError, $mensajeError2;
    public $search, $search2, $search3;

    public function mount(): void{
        $this->tituloObstetricia = "Libro de Atencion de Partos";
        $this->FECHASELECT = '';
        $this->search = '';
        $this->search2 = '';
        $this->search3 = '';
        $this->personal_ai = personalcs::select(DB::raw("CONCAT(APELLIDOSCOMPLETOS, ', ', NOMBRESCOMPLETOS) AS codigo_personal"), 'APELLIDOSCOMPLETOS')
            ->orderBy('APELLIDOSCOMPLETOS', 'asc')
            ->pluck('codigo_personal', 'APELLIDOSCOMPLETOS');
        $this->reseteaDatos();
    }
    function reseteaDatos() : void {
        $this->obstetrica = new libroobstetricia();
        
    }
    function inicializaDatos($id = "") : void {
        if(empty($id)){
            $this->tituloModal = "Registrar";
            $this->reseteaDatos();
            $this->obstetrica->fecha_parto = now()->format('Y-m-d');
        }else{
            $this->tituloModal = "Editar";
            $this->reseteaDatos();
            $this->obstetrica = libroobstetricia::find($id);
        }
    }
    function rules() : array {
        return [
            'obstetrica.n_hc' => 'nullable',
            'obstetrica.apellidosynombres' => 'nullable',
            'obstetrica.edad' => 'nullable',
            'obstetrica.g' => 'nullable',
            'obstetrica.p' => 'nullable',
            'obstetrica.a' => 'nullable',
            'obstetrica.hijos_vivos' => 'nullable',
            'obstetrica.hijos_fallec' => 'nullable',
            'obstetrica.edad_gestacion' => 'nullable',
            'obstetrica.n_control' => 'nullable',
            'obstetrica.domicilio' => 'nullable',
            'obstetrica.fecha_parto' => 'nullable',
            'obstetrica.hora_parto' => 'nullable',
            'obstetrica.tipo_parto' => 'nullable',
            'obstetrica.duracion_parto1' => 'nullable',
            'obstetrica.duracion_parto2' => 'nullable',
            'obstetrica.duracion_parto3' => 'nullable',
            'obstetrica.episiotonia' => 'nullable',
            'obstetrica.sexo' => 'nullable',
            'obstetrica.peso_rn' => 'nullable',
            'obstetrica.apgar1' => 'nullable',
            'obstetrica.apgar5' => 'nullable',
            'obstetrica.talla' => 'nullable',
            'obstetrica.p_cefalico' => 'nullable',
            'obstetrica.p_toraxico' => 'nullable',
            'obstetrica.p_abdominal' => 'nullable',
            'obstetrica.h_cl_rn' => 'nullable',
            'obstetrica.encargado' => [
                'nullable',               
                function ($attribute, $value, $fail) {
                    $found = $this->personal_ai->contains($value);
                    if (!$found) {
                        $this->mensajeError = 'El responsable seleccionado no es válido.';
                        $fail('El responsable seleccionado no es válido.');
                    }
                },
            ],
            'obstetrica.medico_encargado' => [
                'nullable',               
                function ($attribute, $value, $fail) {
                    $found = $this->personal_ai->contains($value);
                    if (!$found) {
                        $this->mensajeError2 = 'El responsable seleccionado no es válido.';
                        $fail('El responsable seleccionado no es válido.');
                    }
                },
            ],
            'obstetrica.observaciones' => 'nullable',

        ];
    }
    public function buscarPorDNI()
    {
        // Buscar en la otra base de datos utilizando el DNI
        $informacion = pacientes::where('dni', $this->obstetrica->n_hc)->first();

        // Si se encuentra la información, actualizar los campos del formulario
        if ($informacion) {
            $this->obstetrica->apellidosynombres = $informacion->nombresapellidos;
            $this->obstetrica->domicilio = $informacion->dirrecion;
        }
        else {
            // Si el DNI no existe en la base de datos, borrar los campos
            $this->obstetrica->apellidosynombres = '';
            $this->obstetrica->domicilio = '';
        }
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
            $existingRecord = libroobstetricia::find($this->obstetrica->id);

            if(!is_null($this->obstetrica->id) && $this->obstetrica->id != ""){
                $existingRecord->update($this->obstetrica->toArray());
                $this->obstetrica->save();
                $message = "Actualizado con exito";
            }else{
                $lastRecord = libroobstetricia::latest()->first();
                $nextId = $lastRecord ? $lastRecord->id + 1 : 1;
                $this->obstetrica->id = $nextId;
                $this->obstetrica->save();
                $message = "Registrado con exito";
            }
            $this->obstetrica->save();

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
            $obstetrica = libroobstetricia::find($id);

            if(is_null($obstetrica)){
                $resp["type"] = 'error';
                $resp["message"] = 'No encontrado';
            }else{
                $obstetrica->delete();
                libroobstetricia::where('id', '>', $id)->update(['id' => DB::raw('id - 1')]);
                $resp["type"] = 'success';
                $resp["message"] = 'Eliminado con exito';
                $this->obstetrica = libroobstetricia::find($id);
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
        $query = libroobstetricia::query();

        if ($this->startDate && $this->endDate) {
        $query->whereBetween('fecha_parto', [$this->startDate, $this->endDate]);
        }

        $libroobstetrico = $query->where('n_hc', 'like', '%' . $this->search . '%')
            ->orderBy('id')
            ->paginate(15);
        $libroobstetrico = $query->where('encargado', 'like', '%' . $this->search2 . '%')
            ->orderBy('id')
            ->paginate(15);
        $libroobstetrico = $query->where('medico_encargado', 'like', '%' . $this->search3 . '%')
            ->orderBy('id')
            ->paginate(15);
        
        return view('livewire.libroemergencia.obstetricia', compact('libroobstetrico'));
    }
}