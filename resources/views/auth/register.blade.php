<x-guest-layout>
    <div class="py-3">
        <!-- Enlaces -->
        @if (Route::has('login'))
            <div class="sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Inicio</a>

                    <a href="{{ route('login') }}" class=" ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar sesión</a>
                @endauth
            </div>
        @endif
        <div class="max-w-8xl mx-4 sm:px-6 lg:px-8">
            <div class="size-1/2 mx-auto">
                <x-card>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                
                        <p class="text-center mb-4 dark:text-white">Administradores</p>
                
                        <!-- Identificación -->
                        <div class="mt-4">
                            <x-input-label for="identificacion" :value="__('Identificación')" />
                            <x-text-input id="identificacion" class="block mt-1 w-full" type="text" name="identificacion" :value="old('identificacion')" required autofocus autocomplete="identificacion" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="15" />
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
                
                        <!-- Correo -->
                        <div class="mt-4">
                            <x-input-label for="correo" :value="__('Correo')" />
                            <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo')" required autocomplete="correo" maxlength="100" />
                            <x-input-error :messages="$errors->get('correo')" class="mt-2" />
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
                </x-card>
            </div>
        </div>
    </div>
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