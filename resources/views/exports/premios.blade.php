<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($premios as $premio)
        <tr>
            <td>{{ $premio->codigo }}</td>
            <td>{{ $premio->nombre }}</td>
            <td>{{ $premio->cantidad }}</td>
            <td>{{ $premio->estado ? 'Sorteado' : 'Por sortear' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>