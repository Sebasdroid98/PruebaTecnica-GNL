<div>
    <p class="dark:text-white text-center">Ganadores</p>

    <table class="min-w-full w-full border border-gray-300 dark:border-gray-900 dark:text-white rounded-lg mt-3">
        <thead>
            <tr class="bg-gray-200 dark:bg-gray-700">
                <th class="px-4 py-2 border dark:border-gray-700" colspan="3">Cliente</th>
                <th class="px-4 py-2 border dark:border-gray-700" colspan="2">Premio</th>
            </tr>

            <tr class="bg-gray-200 dark:bg-gray-700">
                <th class="px-4 py-2 border dark:border-gray-700">Identificación</th>
                <th class="px-4 py-2 border dark:border-gray-700">Nombres</th>
                <th class="px-4 py-2 border dark:border-gray-700">Apellidos</th>
                <th class="px-4 py-2 border dark:border-gray-700">Nombre</th>
                <th class="px-4 py-2 border dark:border-gray-700">Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ganadores as $ganador)
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $ganador->cliente->identificacion }}</td>
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $ganador->cliente->nombres }}</td>
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $ganador->cliente->apellidos }}</td>
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $ganador->premio->nombre }}</td>
                    <td class="px-4 py-2 border dark:border-gray-700">
                        @if ($ganador->premio->estado)
                            <i class="fa-solid fa-circle-check"></i>&nbsp;Sorteado
                        @else
                            <i class="fa-solid fa-user-slash"></i>&nbsp;Por sortear
                        @endif
                    </td>
                </tr>
            @empty
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border dark:border-gray-700 text-center" colspan="6">No hay datos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>