<x-content-body :title='$tituloObstetricia'>
    <x-slot name="buttons">
        <button class="btn btn-relief-primary" wire:click='muestraModal' style="padding: 1rem 2rem">Registrar</button>
    </x-slot>

    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-xl-2">
                            <label class="form-label" for="basicInput">Desde</label>
                            <input type="date" class="form-control form-control-sm" id="basicInput"
                                wire:model.lazy="startDate">
                        </div>
                        <div class="col-xl-2">
                            <label class="form-label" for="basicInput">Hasta</label>
                            <input type="date" class="form-control form-control-sm" id="basicInput2"
                                wire:model.lazy="endDate">
                        </div>
                        <div class="col-xl-2">
                            <label class="form-label" for="basicInput">Buscar DNI</label>
                            <input type="text" class="form-control form-control-sm" id="basicInput"
                                placeholder="Buscar..." wire:model.live.debounce.500ms="search">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="basicInput">Buscar Responsable</label>
                            <input type="text" class="form-control form-control-sm" id="basicInput"
                                placeholder="Buscar..." wire:model.live.debounce.500ms="search2">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="basicInput">Buscar Médico</label>
                            <input type="text" class="form-control form-control-sm" id="basicInput"
                                placeholder="Buscar..." wire:model.live.debounce.500ms="search3">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th rowspan="2">N° DE ORDEN</th>
                                <th rowspan="2">N° DE HC</th>
                                <th rowspan="2">APELLIDOS Y NOMBRES</th>
                                <th rowspan="2">EDAD</th>
                                <th rowspan="2">G</th>
                                <th rowspan="2">P</th>
                                <th rowspan="2">A</th>
                                <th rowspan="2">HIJOS VIVOS</th>
                                <th rowspan="2">HIJOS FALLEC.</th>
                                <th rowspan="2">EDAD GESTACIÓN</th>
                                <th rowspan="2">N° DE CONTROL</th>
                                <th rowspan="2">DOMICILIO</th>
                                <th rowspan="2">Fecha. PARTO</th>
                                <th rowspan="2">Hora. PARTO</th>
                                <th rowspan="2">TIPO DE PARTO</th>
                                <th colspan="3">Duración de Parto</th>
                                <th rowspan="2">EPISIOTONIA</th>
                                <th rowspan="2">SEXO</th>
                                <th rowspan="2">PESO R.N.</th>
                                <th colspan="2">APGAR</th>
                                <th rowspan="2">TALLA</th>
                                <th rowspan="2">P. CEFALICO</th>
                                <th rowspan="2">P. TORAXICO</th> 
                                <th rowspan="2">P. ABDOMINAL</th>
                                <th rowspan="2">H. CL. R.N.</th>
                                <th rowspan="2">RESP.</th>
                                <th rowspan="2">RESP. MEDICO</th> 
                                <th rowspan="2">OBSERVACIONES</th>
                                <th rowspan="2">ACCIONES</th>
                            </tr>
                            <tr>

                                <th>1°</th>
                                <th>2°</th> 
                                <th>3°</th>
                                <th>1°</th>
                                <th>5°</th>

                            </tr>
                        </thead>
                        <tbody class="table-light">
                            @foreach ($libroobstetrico as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->n_hc }}</td>
                                    <td>{{ $item->apellidosynombres}}</td>
                                    <td>{{ $item->edad }}</td>
                                    <td>{{ $item->g }}</td>
                                    <td>{{ $item->p }}</td>
                                    <td>{{ $item->a }}</td>
                                    <td>{{ $item->hijos_vivos }}</td>
                                    <td>{{ $item->hijos_fallec }}</td>
                                    <td>{{ $item->edad_gestacion }}</td>
                                    <td>{{ $item->n_control }}</td>
                                    <td>{{ $item->domicilio }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->fecha_parto)->format('d-m-Y')  }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->hora_parto)->format('H:i')  }}</td>
                                    <td>{{ $item->tipo_parto}}</td>
                                    <td>{{ $item->duracion_parto1 }}</td>
                                    <td>{{ $item->duracion_parto2 }}</td>
                                    <td>{{ $item->duracion_parto3 }}</td>
                                    <td>{{ $item->episiotonia }}</td>
                                    <td>{{ $item->sexo }}</td>
                                    <td>{{ $item->peso_rn }}</td>
                                    <td>{{ $item->apgar1 }}</td>
                                    <td>{{ $item->apgar5 }}</td>
                                    <td>{{ $item->talla }}</td>
                                    <td>{{ $item->p_cefalico }}</td>
                                    <td>{{ $item->p_toraxico }}</td>
                                    <td>{{ $item->p_abdominal }}</td>
                                    <td>{{ $item->h_cl_rn }}</td>
                                    <td>{{ $item->encargado }}</td>
                                    <td>{{ $item->medico_encargado }}</td>
                                    <td>{{ $item->observaciones }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-flat-success waves-effect"
                                                title="Editar" wire:click='muestraModal({{ $item->id }})'>
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            <button type="button" class="btn btn-icon btn-flat-danger waves-effect"
                                                title="Eliminar" onclick="confirmar({{ $item->id }})">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $libroobstetrico->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-modal :modalTitulo="$tituloModal" tipo="modal-xl">
        <div class="row">
            <div class="col-sm-4">
                <x-form-input type="number" label='N° HC:' model="obstetrica.n_hc" wire:model='obstetrica.n_hc' />
                <x-form-input label='APELLIDOS Y NOMBRES:' model="obstetrica.apellidosynombres" wire:model='obstetrica.apellidosynombres' />
                <x-form-input type='number' label='EDAD:' model="obstetrica.edad" wire:model='obstetrica.edad' />
                <x-form-input type='number' label='G :' model="obstetrica.g" wire:model='obstetrica.g' />
                <x-form-input type='number' label='P :' model="obstetrica.p" wire:model='obstetrica.p' />
                <x-form-input type='number' label='A :' model="obstetrica.a" wire:model='obstetrica.a' />
                <x-form-input type='number' label='HIJOS VIVOS:' model="obstetrica.hijos_vivos" wire:model='obstetrica.hijos_vivos' />
                <x-form-input type='number' label='HIJOS FALLEC:' model="obstetrica.hijos_fallec" wire:model='obstetrica.hijos_fallec' />
                <x-form-input label='EDAD GESTACION:' model="obstetrica.edad_gestacion" wire:model='obstetrica.edad_gestacion' />
                <x-form-input label='N° DE CONTROL:' model="obstetrica.n_control" wire:model='obstetrica.n_control' />
                <x-form-input label='DOMICILIO:' model="obstetrica.domicilio" wire:model='obstetrica.domicilio' />
            </div>
            <div class="col-sm-4">
                <x-form-input type="date" label='FECHA DE PARTO:' model="obstetrica.fecha_parto" wire:model='obstetrica.fecha_parto' />
                <x-form-input type="time" label='HORA DE PARTO:' model="obstetrica.hora_parto" wire:model='obstetrica.hora_parto' />
                <x-form-select :datas="['EUTÓCICO' => 'EUTÓCICO', 'DISTÓCICO' => 'DISTÓCICO']" label='TIPO DE PARTO:' model="obstetrica.tipo_parto" wire:model='obstetrica.tipo_parto' />
                <x-divider text="DURACION DE PARTO" />
                <x-form-input label='1° :' model="obstetrica.duracion_parto1" wire:model='obstetrica.duracion_parto1' />
                <x-form-input label='2° :' model="obstetrica.duracion_parto2" wire:model='obstetrica.duracion_parto2' />
                <x-form-input label='3° :' model="obstetrica.duracion_parto3" wire:model='obstetrica.duracion_parto3' />
                <x-divider text="APGAR" />
                <x-form-input label="1' :" model="obstetrica.apgar1" wire:model='obstetrica.apgar1' />
                <x-form-input label="5' :" model="obstetrica.apgar5" wire:model='obstetrica.apgar5' />
                
            </div>
            <div class="col-sm-4">

                <x-form-select :datas="['SI' => 'SI', 'NO' => 'NO']" label='EPISIOTONIA:' model="obstetrica.episiotonia" wire:model='obstetrica.episiotonia' />
                <x-form-select :datas="['M' => 'MASCULINO', 'F' => 'FEMENINO']" label='SEXO:' model="obstetrica.sexo" wire:model='obstetrica.sexo' />
                <x-form-input type='number' label='PESO R.N.:' model="obstetrica.peso_rn" wire:model='obstetrica.peso_rn' />
                <x-form-input type='number' label='TALLA:' model="obstetrica.talla" wire:model='obstetrica.talla' />
                <x-form-input type='number' label='P.CEFALICO :' model="obstetrica.p_cefalico" wire:model='obstetrica.p_cefalico' />
                <x-form-input type='number' label='P.TORAXICO :' model="obstetrica.p_toraxico" wire:model='obstetrica.p_toraxico' />
                <x-form-input type='number' label='P.ABDOMINAL :' model="obstetrica.p_abdominal" wire:model='obstetrica.p_abdominal' />
                <x-form-input label='H. CL. R.N:' model="obstetrica.h_cl_rn" wire:model='obstetrica.h_cl_rn' />
                <div>
                    <x-form-input list='obstetrica.encargado' label='RESPONSABLE: ' model="obstetrica.encargado"
                        wire:model='obstetrica.encargado' />
                    <datalist id='obstetrica.encargado'>
                        @foreach ($personal_ai as $ide => $descripcion)
                            <option value="{{ $descripcion }}" data-id="{{ $ide }}"></option>
                        @endforeach
                    </datalist>
                    @if ($mensajeError2)
                        <div class="alert alert-danger">{{ $mensajeError2 }}</div>
                    @endif
                </div>
                <div>
                    <x-form-input list='obstetrica.medico_encargado' label='RESPONSABLE MED: '
                        model='obstetrica.medico_encargado' wire:model='obstetrica.medico_encargado' />
                    <datalist id='obstetrica.medico_encargado'>
                        @foreach ($personal_ai as $ide => $descripcion)
                            <option value="{{ $descripcion }}" data-id="{{ $ide }}"></option>
                        @endforeach
                    </datalist>
                    @if ($mensajeError2)
                        <div class="alert alert-danger">{{ $mensajeError2 }}</div>
                    @endif
                </div>
                <x-form-input label='OBSERV:' model="obstetrica.observaciones" wire:model='obstetrica.observaciones' />

            </div>
        </div>
    </x-modal>

</x-content-body>


@push('scripts')
    <script>
        function confirmar(id = "") {
            Swal.fire({
                text: '¿Seguro que desea eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.eliminar(id);
                }
            });
        }
    </script>
@endpush
