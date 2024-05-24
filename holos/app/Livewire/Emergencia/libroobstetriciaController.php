<?php

namespace App\Livewire\Emergencia;

use App\Models\libroobstetricia;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class libroobstetriciaController extends Component
{
    public $tituloObstetricia;
    public $obstetrico;
    public $tituloModal, $obstetrica;
    public $FECHASELECT;
    public $startDate;
    public $endDate;
    public $search, $search2;

    public function mount(): void{
        $this->tituloObstetricia = "Libro de Atencion de Partos";
        $this->FECHASELECT = '';
        $this->search = '';
        $this->search2 = '';
        $this->reseteaDatos();
    }
    function reseteaDatos() : void {
        $this->obstetrico = new libroobstetricia();
        
    }
    function inicializaDatos($id = "") : void {
        if(empty($id)){
            $this->tituloModal = "Registrar";
            $this->reseteaDatos();
            $this->obstetrica->fechahora_parto = now()->format('Y-m-d H:i');
        }else{
            $this->tituloModal = "Editar";
            $this->reseteaDatos();
            $this->obstetrica = libroobstetricia::find($id);
        }
    }
    function rules() : array {
        return [
            'obstetrica.n_hc' => 'required',
            'obstetrica.apellidosynombres' => 'required',
            'obstetrica.edad' => 'required',
            'obstetrica.g' => 'required',
            'obstetrica.p' => 'required',
            'obstetrica.a' => 'required',
            'obstetrica.hijos_vivos' => 'required',
            'obstetrica.hijos_fallec' => 'required',
            'obstetrica.edad_gestacion' => 'required',
            'obstetrica.n_control' => 'required',
            'obstetrica.domicilio' => 'required',
            'obstetrica.fechahora_parto' => 'required',
            'obstetrica.tipo_parto' => 'required',
            'obstetrica.duracion_parto1' => 'required',
            'obstetrica.duracion_parto2' => 'required',
            'obstetrica.duración_parto3' => 'required',
            'obstetrica.episotonia' => 'required',
            'obstetrica.sexo' => 'required',
            'obstetrica.peso_rn' => 'required',
            'obstetrica.apgar1' => 'required',
            'obstetrica.apgar5' => 'required',
            'obstetrica.talla' => 'required',
            'obstetrica.p_cefalico' => 'required',
            'obstetrica.p_toraxico' => 'required',
            'obstetrica.p_abdominal' => 'required',
            'obstetrica.h_cl_rn' => 'required',
            'obstetrica.medico_encargado' => 'required',
            'obstetrica.observaciones' => 'required',

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

    #[Layout('layouts.app2')] 
    public function render()
    {        
        $query = libroobstetricia::query();
        if ($this->startDate && $this->endDate) {
        $query->whereBetween('fechahora_parto', [$this->startDate, $this->endDate]);
        }

        $libroobstetrico = $query->where('n_hc', 'like', '%' . $this->search . '%')
            ->orderBy('id')
            ->paginate(15);
        
        return view('livewire.libroemergencia.obstetricia', compact('libroobstetrico'));
    }
}