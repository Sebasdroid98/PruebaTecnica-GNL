<p class="dark:text-white">Clientes</p>
<div class="flex justify-end">
    <x-button-link href="{{ route('seleccionar.ganador') }}" class="ms-4">
        {{ __('Iniciar próximo sorteo') }}
    </x-button-link>
    <x-button-link href="{{ route('exportar.registros') }}" class="ms-4">
        {{ __('Descargar todos los registros') }}
    </x-button-link>
</div>
<div>
    <table class="min-w-full w-full border border-gray-300 dark:border-gray-900 dark:text-white rounded-lg mt-3">
        <thead>
            <tr class="bg-gray-200 dark:bg-gray-700">
                <th class="px-4 py-2 border dark:border-gray-700">Identificación</th>
                <th class="px-4 py-2 border dark:border-gray-700">Nombres</th>
                <th class="px-4 py-2 border dark:border-gray-700">Apellidos</th>
                <th class="px-4 py-2 border dark:border-gray-700">Celular</th>
                <th class="px-4 py-2 border dark:border-gray-700">Correo</th>
                <th class="px-4 py-2 border dark:border-gray-700">Habeas data</th>
                <th class="px-4 py-2 border dark:border-gray-700">Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $cliente->identificacion }}</td>
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $cliente->nombres }}</td>
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $cliente->apellidos }}</td>
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $cliente->celular }}</td>
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $cliente->correo }}</td>
                    <td class="px-4 py-2 border dark:border-gray-700">
                        @if ($cliente->habeas_data)
                            <i class="fa-solid fa-circle-check"></i>&nbsp;Aceptado
                        @else
                            <i class="fa-solid fa-user-slash"></i>&nbsp;No aceptado
                        @endif
                    </td>
                    <td class="px-4 py-2 border dark:border-gray-700">{{ $cliente->municipio->nombre .' - '. $cliente->municipio->departamento->nombre}}</td>
                </tr>
            @empty
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border dark:border-gray-700 text-center" colspan="7">No hay datos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>