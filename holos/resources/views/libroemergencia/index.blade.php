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
                                <a href="{{ route('libroemergencias.create') }}"
                                    class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 rounded-md px-4 py-2">Crear
                                    Registro</a>
                            </div>
                            <table>
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
