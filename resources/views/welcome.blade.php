<x-guest-layout>

    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar sesión admin</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registro admin</a>
                @endif
            @endauth
        </div>
    @endif
    
    <form method="POST" action="{{ route('register.cliente') }}">
        @csrf

        <p class="text-center mb-4 dark:text-white">Administradores</p>

        <!-- Identificación -->
        <div class="mt-4">
            <x-input-label for="identificacion" :value="__('Identificación')" />
            <x-text-input id="identificacion" class="block mt-1 w-full" type="text" name="identificacion" :value="old('identificacion')" required autofocus autocomplete="identificacion" maxlength="15" />
            <x-input-error :messages="$errors->get('identificacion')" class="mt-2" />
        </div>

        <!-- Nombres -->
        <div class="mt-4">
            <x-input-label for="nombres" :value="__('Nombres')" />
            <x-text-input id="nombres" class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')" required autofocus autocomplete="nombres" maxlength="45" />
            <x-input-error :messages="$errors->get('nombres')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div class="mt-4">
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" maxlength="45" />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- Celular -->
        <div class="mt-4">
            <x-input-label for="celular" :value="__('Celular')" />
            <x-text-input id="celular" class="block mt-1 w-full" type="phone" name="celular" :value="old('celular')" required autofocus autocomplete="celular" maxlength="15" />
            <x-input-error :messages="$errors->get('celular')" class="mt-2" />
        </div>

        <!-- Correo -->
        <div class="mt-4">
            <x-input-label for="correo" :value="__('Correo')" />
            <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo')" required autocomplete="correo" maxlength="100" />
            <x-input-error :messages="$errors->get('correo')" class="mt-2" />
        </div>

        <!-- Departamento -->
        <div class="mt-4">
            <x-input-label for="departamento" :value="__('Departamento')" />
            <x-select id="departamento" class="block mt-1 w-full" name="departamento" :value="old('departamento')" required>
                <option value="" disabled selected>Seleccione</option>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('departamento')" class="mt-2" />
        </div>

        <!-- Municipio -->
        <div class="mt-4">
            <x-input-label for="municipio_id" :value="__('Municipio')" />
            {{-- <x-select id="municipio" class="block mt-1 w-full" name="municipio" :value="old('municipio')" required /> --}}
            <x-text-input id="municipio_id" class="block mt-1 w-full" type="number" name="municipio_id" required autocomplete="municipio_id" />
            <x-input-error :messages="$errors->get('municipio_id')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Habeas data -->
        <div class="block mt-4">
            <label for="habeas_data" class="inline-flex items-center">
                <input id="habeas_data" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="habeas_data" value="1" required>
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Autorizo el tratamiento de mis datos de acuerdo con la
finalidad establecida en la política de protección de datos personales.') }} <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="#" target="_blank">{{ __('Haga clic aquí') }}</a></span>
            </label>
        </div>

        <!-- Ver errores -->
        @if ($errors->any())
            <div class="mt-4">
                <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Ya estoy registrado') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const departamentoSelect = document.getElementById('departamento');
        const municipioSelect = document.getElementById('municipio');

        departamentoSelect.addEventListener('change', function () {
            const departamentoId = this.value;

            fetch(`/municipios/${departamentoId}`)
                .then(response => response.json())
                .then(data => {
                    municipioSelect.innerHTML = '<option value="" disabled selected>Seleccione</option>';
                    data.forEach(municipio => {
                        municipioSelect.innerHTML += `<option value="${municipio.id}">${municipio.nombre}</option>`;
                    });
                });
        });
    });
</script> --}}