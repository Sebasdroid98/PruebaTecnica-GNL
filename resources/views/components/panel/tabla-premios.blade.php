<div>
    <p class="dark:text-white">Premios</p>

    <div>
        <form method="POST" action="{{ route('registrar.premio') }}">
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
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="px-4 py-2 border dark:border-gray-700 text-center" colspan="4">No hay datos registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>