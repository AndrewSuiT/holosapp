<x-content-body :title='$librodeemergencia'>
    <x-slot name="buttons">
        <button class="btn btn-relief-primary" wire:click='muestraModal'>Registrar</button>
    </x-slot> 
    
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                            <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <div class="mb-4">                                       
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
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
                                        <tbody>
                                            @foreach ($libroemergencia as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->DNI }}</td>
                                                    <td>{{ $item->FICHAFAM }}</td>
                                                    <td>{{ $item->NHCL }}</td>
                                                    <td>{{ $item->CODSIS }}</td>
                                                    <td>{{ $item->PLAN }}</td>
                                                    <td>{{ $item->SERV }}</td>
                                                    <td>{{ $item->EMERGENCIA }}</td>
                                                    <td>{{ $item->APELLIDOSYNOMBRES }}</td>
                                                    <td>{{ $item->NCR }}</td>
                                                    <td>{{ $item->EDAD }}</td>
                                                    <td>{{ $item->SEXO }}</td>
                                                    <td>{{ $item->DIRECCIÓN }}</td>
                                                    <td>{{ $item->DIAGNOSTICO }}</td>
                                                    <td>{{ $item->PDR }}</td>
                                                    <td>{{ $item->TRATAMIENTO }}</td>
                                                    <td>{{ $item->INYECT }}</td>
                                                    <td>{{ $item->CURAC }}</td>
                                                    <td>{{ $item->RESPONSABLE }}</td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-modal :modalTitulo="$tituloModal">
        <x-form-input type="number" label='DNI:' model="emergencia.DNI" wire:model='emergencia.DNI' />
        <x-form-input type="date" label='FICHAFAM:' model="emergencia.FICHAFAM" wire:model='emergencia.FICHAFAM' />
        <x-form-input label='NHCL:' model="emergencia.NHCL" wire:model='emergencia.NHCL' />
        <x-form-input label='CODSIS:' model="emergencia.CODSIS" wire:model='emergencia.CODSIS' />
        <x-form-input label='PLAN:' model="emergencia.PLAN" wire:model='emergencia.PLAN' />
        <x-form-input label='SERV:' model="emergencia.SERV" wire:model='emergencia.SERV' />
        <x-form-input label='EMERGENCIA:' model="emergencia.EMERGENCIA" wire:model='emergencia.EMERGENCIA' />
        <x-form-input label='APELLIDOS Y NOMBRES:' model="emergencia.APELLIDOSYNOMBRES" wire:model='emergencia.APELLIDOSYNOMBRES' />
        <x-form-select :datas="['N'=> 'N', 'C' => 'C', 'R' =>'R']" label='NCR: ' model="emergencia.NCR" wire:model='emergencia.NCR'/>
        <x-form-input type="number" label='EDAD:' model="emergencia.EDAD" wire:model='emergencia.EDAD' />        
        <x-form-input label='SEXO:' model="emergencia.SEXO" wire:model='emergencia.SEXO' />
        <x-form-input label='DIRECCIÓN:' model="emergencia.DIRECCIÓN" wire:model='emergencia.DIRECCIÓN' />
        <x-form-input label='DIAGNOSTICO:' model="emergencia.DIAGNOSTICO" wire:model='emergencia.DIAGNOSTICO' />
        <x-form-input label='PDR:' model="emergencia.PDR" wire:model='emergencia.PDR' />
        <x-form-input label='TRATAMIENTO:' model="emergencia.TRATAMIENTO" wire:model='emergencia.TRATAMIENTO' />
        <x-form-input label='INYECT:' model="emergencia.INYECT" wire:model='emergencia.INYECT' />
        <x-form-input label='CURAC:' model="emergencia.CURAC" wire:model='emergencia.CURAC' />
        <x-form-input label='RESPONSABLE:' model="emergencia.RESPONSABLE" wire:model='emergencia.RESPONSABLE' />
        <x-form-input label='OBSERV:' model="emergencia.OBSERV" wire:model='emergencia.OBSERV' />
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
