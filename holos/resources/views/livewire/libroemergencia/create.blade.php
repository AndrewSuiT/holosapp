<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
            <form method="POST" action="{{ route('libroemergencias.store') }}" class="max-w-sm mx-auto">
                @csrf
                

                <div class="mb-5">
                    <label for="DNI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI</label>
                    <input type='number' name="DNI" id="DNI"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="FICHAFAM" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">FICHA
                        FAM</label>
                    <input type='date' name="FICHAFAM" id="FICHAFAM"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="NHCL"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NHCL</label>
                    <input type='text' name="NHCL" id="NHCL"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>
                <div class="mb-5">
                    <label for="CODSIS"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CODSIS</label>
                    <input type='text' name="CODSIS" id="CODSIS"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="PLAN"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PLAN</label>
                    <input type='text' name="PLAN" id="PLAN"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="SERV"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SERV</label>
                    <input type='text' name="SERV" id="SERV"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>
                <div class="mb-5">
                    <label for="EMERGENCIA"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EMERGENCIA</label>
                    <input type='text' name="EMERGENCIA" id="EMERGENCIA"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>
                <div class="mb-5">
                    <label for="APELLIDOSYNOMBRES"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">APELLIDOSYNOMBRES</label>
                    <input type='text' name="APELLIDOSYNOMBRES" id="APELLIDOSYNOMBRES"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>
                <div class="mb-5">
                    <label for="NCR"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NCR</label>
                    <input type='text' name="NCR" id="NCR"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="EDAD"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EDAD</label>
                    <input type='number' name="EDAD" id="EDAD"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="SEXO"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SEXO</label>
                    <input type='text' name="SEXO" id="SEXO"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="DIRECCIÓN"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DIRECCIÓN</label>
                    <input type='text' name="DIRECCIÓN" id="DIRECCIÓN"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="DIAGNOSTICO"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DIAGNOSTICO</label>
                    <input type='text' name="DIAGNOSTICO" id="DIAGNOSTICO"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="PDR"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PDR</label>
                    <input type='text' name="PDR" id="PDR"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="TARTAMIENTO"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TRATAMIENTO</label>
                    <input type='text' name="TRATAMIENTO" id="TRATAMIENTO"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="INYECT"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">INYECT</label>
                    <input type='text' name="INYECT" id="INYECT"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="CURAC"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CURAC</label>
                    <input type='text' name="CURAC" id="CURAC"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <div class="mb-5">
                    <label for="RESPONSABLE"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RESPONSABLE</label>
                    <input type='text' name="RESPONSABLE" id="RESPONSABLE"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>
                <div class="mb-5">
                    <label for="OBSERV"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">OBSERV</label>
                    <input type='text' name="OBSERV" id="OBSERV"
                        class="bg-gray-600 border-blue-800 text-gray-900 dark:text-white rounded-md"
                        style="width:400px">
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-2 rounded-md px-5 py-1.5 font-medium">Guardar</button>
                <a href="{{ route('libroemergencias.index') }}"
                    class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-2 rounded-md px-5 py-2 font-medium">Cancelar</a>
            </form>
        </div>
    </div>
</div>
