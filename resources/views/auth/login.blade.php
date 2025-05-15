<x-guest-layout>
    <div class="py-3">
        <!-- Enlaces -->
        @if (Route::has('login'))
            <div class="sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inicio</a>    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registro admin</a>
                    @endif
                @endauth
            </div>
        @endif
        
        <div class="max-w-8xl mx-2 sm:px-6 lg:px-5">
            <div class="size-1/2 mx-auto">
                <x-card>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                
                        <p class="text-center mb-4 dark:text-white">Administradores</p>
                
                        <!-- Identificación -->
                        <div>
                            <x-input-label for="identificacion" :value="__('identificacion')" />
                            <x-text-input id="identificacion" class="block mt-1 w-full" type="text" name="identificacion" :value="old('identificacion')" required autofocus autocomplete="username" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                            <x-input-error :messages="$errors->get('identificacion')" class="mt-2" />
                        </div>
                
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Contraseña')" />
                
                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center justify-end mt-4">
                            {{-- @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif --}}
                
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
                
                            <x-primary-button class="ms-3">
                                {{ __('Iniciar sesión') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    </div>
</x-guest-layout>
