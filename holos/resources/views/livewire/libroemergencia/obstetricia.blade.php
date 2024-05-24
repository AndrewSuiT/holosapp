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
                                <th rowspan="2">Fec.Hr. PARTO</th>
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
                                <th rowspan="2">RESPONSABLE</th> 
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
                                    <td>{{ \Carbon\Carbon::parse($item->fechahora_parto)->format('d-m-Y H:i')  }}</td>
                                    <td>{{ $item->tipo_parto}}</td>
                                    <td>{{ $item->duracion_parto1 }}</td>
                                    <td>{{ $item->duracion_parto2 }}</td>
                                    <td>{{ $item->duracion_parto3 }}</td>
                                    <td>{{ $item->episotonia }}</td>
                                    <td>{{ $item->sexo }}</td>
                                    <td>{{ $item->peso_rn }}</td>
                                    <td>{{ $item->apgar1 }}</td>
                                    <td>{{ $item->apgar5 }}</td>
                                    <td>{{ $item->talla }}</td>
                                    <td>{{ $item->p_cefalico }}</td>
                                    <td>{{ $item->p_toraxico }}</td>
                                    <td>{{ $item->p_abdominal }}</td>
                                    <td>{{ $item->h_cl_rn }}</td>
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
