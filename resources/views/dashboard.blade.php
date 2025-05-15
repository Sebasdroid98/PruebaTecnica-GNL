<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Premios y Ganadores -->
            <div class="flex">
                <div class="size-1/2 p-2">
                    <x-card>
                        <p class="dark:text-white">Premios</p>
                        <div class="">
                            <form method="POST" action="{{ route('register.premio') }}">
                                @csrf
                                <div class="flex">
                                    <div class="size-1/4">
                                        <x-input-label for="codigo" :value="__('Código')" />
                                        <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" required autofocus autocomplete="codigo" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="15" />
                                        <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
                                    </div>
                                    <div class="size-1/4">
                                        <x-input-label for="nombre" :value="__('Nombre')" />
                                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" maxlength="45" />
                                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                                    </div>
                                    <div class="size-1/4">
                                        <x-input-label for="cantidad" :value="__('Cantidad')" />
                                        <x-text-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad" :value="old('cantidad')" required autofocus autocomplete="cantidad" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="15" />
                                        <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                                    </div>
                                    <div class="size-1/4">
                                        <p>&nbsp;</p>
                                        <x-primary-button class="ms-2">
                                            {{ __('Agregar') }}
                                        </x-primary-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="mt-4">
                        <div>
                            <table class="min-w-full w-full border border-gray-300 dark:border-gray-900 dark:text-white rounded-lg mt-3">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-700">
                                        <th class="px-4 py-2 border dark:border-gray-700">Codigo</th>
                                        <th class="px-4 py-2 border dark:border-gray-700">Nombre</th>
                                        <th class="px-4 py-2 border dark:border-gray-700">Cantidad</th>
                                        <th class="px-4 py-2 border dark:border-gray-700">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($premios as $premio)
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td class="px-4 py-2 border dark:border-gray-700">{{ $premio->codigo }}</td>
                                            <td class="px-4 py-2 border dark:border-gray-700">{{ $premio->nombre }}</td>
                                            <td class="px-4 py-2 border dark:border-gray-700">{{ $premio->cantidad }}</td>
                                            <td class="px-4 py-2 border dark:border-gray-700">
                                                @if ($premio->estado)
                                                    <i class="fa-solid fa-circle-check"></i>&nbsp;Sorteado
                                                @else
                                                    <i class="fa-solid fa-user-slash"></i>&nbsp;Por sortear
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </x-card>
                </div>

                <div class="size-1/2 p-2">
                    <x-card>
                        <p class="dark:text-white">Ganadores</p>
                        <table class="min-w-full w-full border border-gray-300 dark:border-gray-900 dark:text-white rounded-lg mt-3">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700">
                                    <th class="px-4 py-2 border dark:border-gray-700" colspan="3">Cliente</th>
                                    <th class="px-4 py-2 border dark:border-gray-700" colspan="3">Premio</th>
                                </tr>

                                <tr class="bg-gray-200 dark:bg-gray-700">
                                    <th class="px-4 py-2 border dark:border-gray-700">Identificación</th>
                                    <th class="px-4 py-2 border dark:border-gray-700">Nombres</th>
                                    <th class="px-4 py-2 border dark:border-gray-700">Apellidos</th>
                                    <th class="px-4 py-2 border dark:border-gray-700">Codigo</th>
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
                                        <td class="px-4 py-2 border dark:border-gray-700">{{ $ganador->premio->codigo }}</td>
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
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </x-card>
                </div>
            </div>

            <!-- Clientes -->
            <x-card class="mt-3">
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
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-card>
        
        </div>
    </div>
</x-app-layout>
