<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                        <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                            <div class="mb-4">
                                <section>
                                    <div class="my-4">
                                        <button wire:click="create">AÑADIR REGISTRO</button>
                                    </div>
                                    @if($isOpen)
                                    <div class="fixed inset-0 flex items-center justify-center z-50">
                                        <div class="absolute inset-0 bg-black opacity-50"></div>
                                        <div class="relative bg-gray-200 p-8 rounded shadow-lg w-1/2">
                                            
                                            <h2 class="text-2xl font-bold mb-4">Crear Registro</h2>
                                            <form>
                                                <!--<div class="mb-4">
                                                    <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                                                    <input type="text" id="title" class="w-full border border-gray-300 px-4 py-2 rounded">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="body" class="block text-gray-700 font-bold mb-2">Body:</label>
                                                    <textarea id="body" rows="4" class="w-full border border-gray-300 px-4 py-2 rounded"></textarea>
                                                </div>-->
                                                <div class="mb-5">
                                                    <label for="DNI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI</label>
                                                    <input type='number' name="DNI" id="DNI">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="FICHAFAM" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">FICHA
                                                        FAM</label>
                                                    <input type='date' name="FICHAFAM" id="FICHAFAM">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="NHCL"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NHCL</label>
                                                    <input type='text' name="NHCL" id="NHCL">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="CODSIS"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CODSIS</label>
                                                    <input type='text' name="CODSIS" id="CODSIS">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="PLAN"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PLAN</label>
                                                    <input type='text' name="PLAN" id="PLAN">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="SERV"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SERV</label>
                                                    <input type='text' name="SERV" id="SERV">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="EMERGENCIA"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EMERGENCIA</label>
                                                    <input type='text' name="EMERGENCIA" id="EMERGENCIA">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="APELLIDOSYNOMBRES"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">APELLIDOS Y NOMBRES</label>
                                                    <input type='text' name="APELLIDOSYNOMBRES" id="APELLIDOSYNOMBRES">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="NCR"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NCR</label>
                                                    <input type='text' name="NCR" id="NCR">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="EDAD"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EDAD</label>
                                                    <input type='number' name="EDAD" id="EDAD">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="SEXO"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SEXO</label>
                                                    <input type='text' name="SEXO" id="SEXO">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="DIRECCIÓN"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DIRECCIÓN</label>
                                                    <input type='text' name="DIRECCIÓN" id="DIRECCIÓN">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="DIAGNOSTICO"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DIAGNOSTICO</label>
                                                    <input type='text' name="DIAGNOSTICO" id="DIAGNOSTICO">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="PDR"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PDR</label>
                                                    <input type='text' name="PDR" id="PDR">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="TARTAMIENTO"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TRATAMIENTO</label>
                                                    <input type='text' name="TRATAMIENTO" id="TRATAMIENTO">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="INYECT"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">INYECT</label>
                                                    <input type='text' name="INYECT" id="INYECT">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="CURAC"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CURAC</label>
                                                    <input type='text' name="CURAC" id="CURAC">
                                                </div>
                                
                                                <div class="mb-5">
                                                    <label for="RESPONSABLE"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RESPONSABLE</label>
                                                    <input type='text' name="RESPONSABLE" id="RESPONSABLE">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="OBSERV"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">OBSERV</label>
                                                    <input type='text' name="OBSERV" id="OBSERV">
                                                </div>
                                                <div class="flex justify-end">
                 
                                                    <button type="submit">GUARDAR</button>
                                                    <button type="button" wire:click="closeModal">Cancelar</button>
                                                </div>
                                            </form>
                 
                                        </div>
                                    </div>
                                    @endif
                                </section>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">DNI</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">FICHAFAM</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">NHCL</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">CODSIS</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">PLAN</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">SERV</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">EMERGENCIA</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">APELLIDOSYNOMBRES</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">NCR</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">EDAD</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">SEXO</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">DIRECCION</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">DIAGNOSTICO</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">PDR</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">TRATAMIENTO</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">INYECT</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">CURAC</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">RESPONSABLE</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">OBSERV</th>
                                        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($libroemergencia as $libroemergencias)
                                        <tr>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->id }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->DNI }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->FICHAFAM }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->NHCL }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->CODSIS }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->PLAN }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->SERV }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->EMERGENCIA }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->APELLIDOSYNOMBRES }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->NCR }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->EDAD }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->SEXO }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->DIRECCIÓN }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->DIAGNOSTICO }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->PDR }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->TRATAMIENTO }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->INYECT }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->CURAC }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->RESPONSABLE }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->OBSERV }}</td>
                                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                {{ $libroemergencias->ACCIONES }}</td>
                                            <td class="border px-4 py-2 text-center">
                                                
                                                    <button type="button"
                                                        onclick="confirmDelete('{{ $libroemergencias->id }}')"
                                                        class="border -ml-px">Borrar</button>
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