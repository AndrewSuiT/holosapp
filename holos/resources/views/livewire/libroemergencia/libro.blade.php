<x-content-body :title='$librodeemergencia'>
    <x-slot name="buttons">
        <button class="btn btn-relief-primary" id="btn-xlsx" style='margin-right: 5rem ; background-color:#2c7900'>
            <i class="fa fa-download"></i>
            Descargar Libro
        </button>
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
                            <input type="text" class="form-control form-control-sm" style='padding: 0.271rem 1rem' id="basicInput"
                                placeholder="Buscar..." wire:model.live.debounce.500ms="search3">
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
                                <th>RES. MEDICO</th>
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
                                    <td>{{ $item->EMERGENCIA2 }}</td>
                                    <td>{{ $item->APELLIDOSYNOMBRES }}</td>
                                    <td>{{ $item->NCR }}</td>
                                    <td>{{ $item->EDAD }}</td>
                                    <td>{{ $item->SEXO }}</td>
                                    <td>{{ $item->DIRECCIÓN }}</td>
                                    <td>{{ $item->diagnosticoId }}</td>
                                    <td>{{ $item->PDR }}</td>
                                    <td>{{ $item->TRATAMIENTO }}</td>
                                    <td>{{ $item->INYECT }}</td>
                                    <td>{{ $item->CURAC }}</td>
                                    <td>{{ $item->RESPONSABLE }}</td>
                                    <td>{{ $item->RESPONSABLE_MED }}</td>
                                    <td>{{ $item->OBSERV }}</td>
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
                    {{ $libroemergencia->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-modal :modalTitulo="$tituloModal" tipo="modal-xl">
        <div class="row">
            <div class="col-sm-4">
                <x-divider text="." />
                <x-form-input type="number" label='DNI:' model="emergencia.DNI" wire:model='emergencia.DNI' wire:change="buscarPorDNI" />
                <x-form-input type="datetime-local" label='FICHAFAM:' model="emergencia.FICHAFAM"
                    wire:model='emergencia.FICHAFAM' />
                <x-form-input label='NHCL:' model="emergencia.NHCL" wire:model='emergencia.NHCL' />
                <x-form-input label='CODSIS:' model="emergencia.CODSIS" wire:model='emergencia.CODSIS' />
                <x-form-select :datas="['PARTICULAR' => 'PARTICULAR', 'SIS' => 'SIS']" label='PLAN:' model="emergencia.PLAN" wire:model='emergencia.PLAN' />
                <x-form-select :datas="['MEDICINA' => 'MEDICINA', 'GINECOLOGÍA' => 'GINECOLOGÍA', 'PEDIATRÍA' => 'PEDIATRÍA']" label='SERV:' model="emergencia.SERV" wire:model='emergencia.SERV' />
            </div>
            <div class="col-sm-4">
                <x-divider text="." />
                <x-form-input label='APELLIDOS Y NOMBRES:' model="emergencia.APELLIDOSYNOMBRES"  wire:model='emergencia.APELLIDOSYNOMBRES' readonly />
                <x-form-select :datas="['N' => 'N', 'C' => 'C', 'R' => 'R']" label='NCR: ' model="emergencia.NCR" wire:model='emergencia.NCR' />
                <x-form-input type="number" label='EDAD:' model="emergencia.EDAD" wire:model='emergencia.EDAD' />
                <x-form-select :datas="['F' => 'Femenino', 'M' => 'Masculino']" label='SEXO:' model="emergencia.SEXO" wire:model='emergencia.SEXO' />
                <x-form-input label='DIRECCIÓN:' model="emergencia.DIRECCIÓN" wire:model='emergencia.DIRECCIÓN' readonly />
                <div>
                    <x-form-input list='emergencia.diagnosticoId' label='DIAGNOSTICO: '
                        model="emergencia.diagnosticoId" wire:model='emergencia.diagnosticoId' />
                    <datalist id='emergencia.diagnosticoId'>
                        @foreach ($cie_10 as $ide => $descripcion)
                            <option value="{{ $descripcion }}" data-id="{{ $ide }}"></option>
                        @endforeach
                    </datalist>
                    @if ($mensajeError)
                        <div class="alert alert-danger">{{ $mensajeError }}</div>
                    @endif

                </div>
                <x-form-checkbox label='EMERGENCIA:' model="emergencia.EMERGENCIA2"
                    wire:model='emergencia.EMERGENCIA2' />
            </div>
            <div class="col-sm-4">
                <x-divider text="." />
                <x-form-select :datas="['P' => 'P', 'D' => 'D', 'R' => 'R']" label='PDR:' model="emergencia.PDR" wire:model='emergencia.PDR' />
                <x-form-input label='TRATAMIENTO:' model="emergencia.TRATAMIENTO"
                    wire:model='emergencia.TRATAMIENTO' />
                <x-form-input label='INYECT:' model="emergencia.INYECT" wire:model='emergencia.INYECT' />
                <x-form-input label='CURAC:' model="emergencia.CURAC" wire:model='emergencia.CURAC' />
                <div>
                    <x-form-input list='emergencia.RESPONSABLE' label='RESPONSABLE: ' model="emergencia.RESPONSABLE"
                        wire:model='emergencia.RESPONSABLE' />
                    <datalist id='emergencia.RESPONSABLE'>
                        @foreach ($personal_ai as $ide => $descripcion)
                            <option value="{{ $descripcion }}" data-id="{{ $ide }}"></option>
                        @endforeach
                    </datalist>
                    @if ($mensajeError2)
                        <div class="alert alert-danger">{{ $mensajeError2 }}</div>
                    @endif
                </div>
                <div>
                    <x-form-input list='emergencia.RESPONSABLE_MED' label='RESPONSABLE MED: '
                        model="emergencia.RESPONSABLE_MED" wire:model='emergencia.RESPONSABLE_MED' />
                    <datalist id='emergencia.RESPONSABLE_MED'>
                        @foreach ($personal_ai as $ide => $descripcion)
                            <option value="{{ $descripcion }}" data-id="{{ $ide }}"></option>
                        @endforeach
                    </datalist>
                    @if ($mensajeError2)
                        <div class="alert alert-danger">{{ $mensajeError2 }}</div>
                    @endif
                </div>
                <x-form-input label='OBSERV:' model="emergencia.OBSERV" wire:model='emergencia.OBSERV' />

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
    <script>
        $(document).ready(function(){
        $('#btn-xlsx').click(function(){
            let startDate = $('#basicInput').val();
            let endDate = $('#basicInput2').val();

            let ruta = @json(route('emergencia.formato-xlsx')) + `?startDate=${startDate}&endDate=${endDate}`;
            window.open(ruta, '_blank');
        })
    })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var formInputs = document.querySelectorAll('input, select, textarea');
    
            formInputs.forEach(function (input) {
                input.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter') {
                        var index = Array.prototype.indexOf.call(formInputs, input);
                        var nextIndex = index + 1;
    
                        if (nextIndex < formInputs.length) {
                            formInputs[nextIndex].focus();
                            event.preventDefault(); // Evitar el comportamiento por defecto del Enter (enviar formulario)
                        }
                    }
                });
            });
        });
    </script>
    
@endpush
        
