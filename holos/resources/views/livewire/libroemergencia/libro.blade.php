<x-content-body :title='$librodeemergencia'>
    <x-slot name="buttons">
        <button class="btn btn-relief-primary" wire:click='muestraModal'>Registrar</button>
    </x-slot>

    <!--<button class="btn btn-relief-primary" wire:click="generarPDF">Descargar PDF</button>-->

    <div class="app-content">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
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
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>DNI</th>
                                    <th>FICHAFAM</th>
                                    <th>NHCL</th>
                                    <th>CODSIS</th>
                                    <th>PLAN</th>
                                    <th>SERV</th>
                                    <th>EMERGENCIA</th>
                                    <th>APELLIDOSYNOMBRES</th>
                                    <th>NCR</th>
                                    <th>EDAD</th>
                                    <th>SEXO</th>
                                    <th>DIRECCION</th>
                                    <th>DIAGNOSTICO</th>
                                    <th>PDR</th>
                                    <th>TRATAMIENTO</th>
                                    <th>INYECT</th>
                                    <th>CURAC</th>
                                    <th>RESPONSABLE</th>
                                    <th>OBSERV</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                @foreach ($libroemergencia as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->DNI }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->FICHAFAM)->format('d-m-Y H:i') }}</td>
                                        <td>{{ $item->NHCL }}</td>
                                        <td>{{ $item->CODSIS }}</td>
                                        <td>{{ $item->PLAN }}</td>
                                        <td>{{ $item->SERV }}</td>
                                        <td>{{ $item->EMERGENCIA}}</td>
                                        <td>{{ $item->APELLIDOSYNOMBRES }}</td>
                                        <td>{{ $item->NCR }}</td>
                                        <td>{{ $item->EDAD }}</td>
                                        <td>{{ $item->SEXO }}</td>
                                        <td>{{ $item->DIRECCIÓN }}</td>
                                        <td>{{ $item->diagnostico->descripcion_CIE }}</td>
                                        <td>{{ $item->PDR }}</td>
                                        <td>{{ $item->TRATAMIENTO }}</td>
                                        <td>{{ $item->INYECT }}</td>
                                        <td>{{ $item->CURAC }}</td>
                                        <td>{{ $item->RESPONSABLE }}</td>
                                        <td>{{ $item->OBSERV }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-icon btn-flat-success waves-effect" title="Editar"
                                                    wire:click='muestraModal({{ $item->id }})'>
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
                        {{ $libroemergencia->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-modal :modalTitulo="$tituloModal" tipo="modal-xl">
        <div class="row">
            <div class="col-sm-4">
                <x-divider text="." />
                <x-form-input type="number" label='DNI:' model="emergencia.DNI" wire:model='emergencia.DNI' />
                <x-form-input type="datetime-local" label='FICHAFAM:' model="emergencia.FICHAFAM" wire:model='emergencia.FICHAFAM' />
                <x-form-input label='NHCL:' model="emergencia.NHCL" wire:model='emergencia.NHCL' />
                <x-form-input label='CODSIS:' model="emergencia.CODSIS" wire:model='emergencia.CODSIS' />
                <x-form-select :datas="['PARTICULAR' => 'PARTICULAR', 'SIS' => 'SIS']" label='PLAN:' model="emergencia.PLAN" wire:model='emergencia.PLAN' />
                <x-form-select :datas="['MEDICINA' => 'MEDICINA', 'GINECOLOGÍA' => 'GINECOLOGÍA', 'PEDIATRÍA' => 'PEDIATRÍA']" label='SERV:' model="emergencia.SERV" wire:model='emergencia.SERV' />
            </div>
            <div class="col-sm-4">
                <x-divider text="." />
                <x-form-input label='APELLIDOS Y NOMBRES:' model="emergencia.APELLIDOSYNOMBRES" wire:model='emergencia.APELLIDOSYNOMBRES' />
                <x-form-select :datas="['N' => 'N', 'C' => 'C', 'R' => 'R']" label='NCR: ' model="emergencia.NCR" wire:model='emergencia.NCR' />
                <x-form-input type="number" label='EDAD:' model="emergencia.EDAD" wire:model='emergencia.EDAD' />
                <x-form-select :datas="['F' => 'Femenino', 'M' => 'Masculino']" label='SEXO:' model="emergencia.SEXO" wire:model='emergencia.SEXO' />
                <x-form-input label='DIRECCIÓN:' model="emergencia.DIRECCIÓN" wire:model='emergencia.DIRECCIÓN' />
                <x-form-select :datas="$cie_10" label='DIAGNOSTICO: ' model="emergencia.diagnosticoId" wire:model='emergencia.diagnosticoId'/>
                <div class="text-nowrap p-tb-0">
                    <label style="font-size: 0.86rem; margin-top: 8px;" for="inlineCheckbox1">EMERGENCIA: </label>                  
                    <input class="form-check-input" style="margin-left: 20%; margin-top: 3px; width: 20px; height: 20px;" type="checkbox" id="emergencia.EMERGENCIA" wire:model.live="emergencia.EMERGENCIA">                   
                </div>
            </div>
            <div class="col-sm-4">
                <x-divider text="." />
                <x-form-select :datas="['P' => 'P', 'D' => 'D', 'R' => 'R']" label='PDR:' model="emergencia.PDR" wire:model='emergencia.PDR' />
                <x-form-input label='TRATAMIENTO:' model="emergencia.TRATAMIENTO" wire:model='emergencia.TRATAMIENTO' />
                <x-form-input label='INYECT:' model="emergencia.INYECT" wire:model='emergencia.INYECT' />
                <x-form-input label='CURAC:' model="emergencia.CURAC" wire:model='emergencia.CURAC' />
                <x-form-input label='RESPONSABLE:' model="emergencia.RESPONSABLE" wire:model='emergencia.RESPONSABLE' />
                <div>
                    <x-form-input label='OBSERV:' model="emergencia.OBSERV" wire:model='emergencia.OBSERV' />
                </div>
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
