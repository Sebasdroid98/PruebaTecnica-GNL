<table>
    <thead>
        <tr>
            <th colspan="5">Cliente</th>
            <th colspan="4">Premio</th>
        </tr>
        <tr>
            <th>Identificación</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ganadores as $ganador)
        <tr>
            <td>{{ $ganador->cliente->identificacion }}</td>
            <td>{{ $ganador->cliente->nombres }}</td>
            <td>{{ $ganador->cliente->apellidos }}</td>
            <td>{{ $ganador->cliente->celular }}</td>
            <td>{{ $ganador->cliente->correo }}</td>
            <td>{{ $ganador->premio->codigo }}</td>
            <td>{{ $ganador->premio->nombre }}</td>
            <td>{{ $ganador->premio->cantidad }}</td>
            <td>{{ $ganador->premio->estado ? 'Ganado' : 'No ganado' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>