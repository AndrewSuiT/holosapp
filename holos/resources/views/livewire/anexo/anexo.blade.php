<x-content-body :title='$tituloPagina'>
<div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!--<div class="col-xl-4 col-md-6 col-12">-->
                    <!--<div class="row">-->
                        <div class="col-xl-2" >
                            <label class="form-label" for="basicInput">Buscar Nro Anexo</label>
                            <input type="text" class="form-control form-control-sm" style="margin-right: 1rem" id="basicInput1" placeholder="Buscar..." wire:model.live.debounce.500ms="search1">
                        </div>
                        <div class="col-md-3" >
                    <!--<div class="col-xl-4 col-md-6 col-12">-->
                            <label class="form-label" for="basicInput">Buscar Descripción Anexo</label>
                            <input type="text" class="form-control form-control-sm" id="basicInput" placeholder="Buscar..." wire:model.live.debounce.500ms="search">
                        </div>
                        <div class="col-6">
                        </div>
                    <!--</div>-->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nro. Anexo</th>
                                    <th>Descripción Anexo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anexos as $item)
                                    <tr>
                                        <td>{{ $item->nroAnexo }}</td>
                                        <td>{{ $item->descAnexo }}</td>
                                        <!--<td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-icon btn-flat-success waves-effect"
                                                    title="Editar" wire:click='muestraModal()'>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-flat-danger waves-effect"
                                                    title="Eliminar" onclick="confirmar()">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </td>-->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $anexos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-content-body>