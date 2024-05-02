<x-content-body :title="'registros'">

    <head>
        <!--<meta charset="utf-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>NHCL</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                    <tr>
                        <td>{{ utf8_encode($registro->DNI) }}</td>
                        <td>{{ utf8_encode($registro->NHCL) }}</td>
                        
                @endforeach
            </tbody>
        </table>
    </div>
</x-content-body>
