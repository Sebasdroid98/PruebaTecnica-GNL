<table>
    <thead>
        <tr>
            <th>Identificación</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Municipio</th>
            <th>Departamento</th>
            <th>Tratamiento de datos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->identificacion }}</td>
            <td>{{ $cliente->nombres }}</td>
            <td>{{ $cliente->apellidos }}</td>
            <td>{{ $cliente->celular }}</td>
            <td>{{ $cliente->correo }}</td>
            <td>{{ $cliente->municipio->nombre }}</td>
            <td>{{ $cliente->municipio->departamento->nombre }}</td>
            <td>{{ $cliente->habeas_data ? 'Aceptado': 'Rechazado' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>